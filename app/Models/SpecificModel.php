<?php

namespace App\Models;

use CodeIgniter\Model;

class SpecificModel extends Model
{
    public function getDestinosAutocomplete($term)
    {
        return $this->db->table('destinos')
            ->select('id_destino as id, nombre_destino as label')
            ->like('nombre_destino', $term)
            ->where('status_destino', 1)
            ->limit(10)
            ->get()
            ->getResultArray();
    }
    
    public function getDisponibilidad($params)
    {
        $db = \Config\Database::connect();
        $date1 = new \DateTime($params['checkin']);
        $date2 = new \DateTime($params['checkout']);
        $noches = $date1->diff($date2)->days;
        
        $paxTotal = (int)$params['adultos'] + (int)$params['menores'];
        $paxPorHab = $paxTotal / (int)$params['habitaciones'];

        $builder = $db->table('hoteles h');
        $builder->select('h.*, hab.id_habitacion, hab.nombre_habitacion, hab.personas_maximas_habitacion, hab.adultos_maximos_habitacion,
        hab.menores_maximos_habitacion, hab.cama_sencilla_habitacion, hab.cama_doble_habitacion,
        hab.cama_queen_habitacion, hab.cama_king_habitacion, hab.resumen_habitacion,
        hab.descripcion_habitacion, hab.servicios_habitacion');
        $builder->join('hoteles_habitaciones hab', 'hab.id_hotel = h.id_hotel');
        
        // --- FILTRO BASE ---
        $builder->where('h.destino_hotel', $params['destino']);
        $builder->where('hab.personas_maximas_habitacion >=', $paxPorHab);
        $builder->where('h.status_hotel', 1);

        $resultados = $builder->get()->getResultArray();
        
        $hotelesAgrupados = [];
        $nombresPlanes = array_column($db->table('hoteles_tipos_planes')->get()->getResultArray(), 'nombre_tipo_plan', 'id_tipo_plan');
        $edadesArray = $this->prepararEdades($params['edades'] ?? '');

        // Procesar rangos de precio seleccionados si existen
        $filtrosPrecio = !empty($params['precios']) ? explode(',', $params['precios']) : [];
        // Procesar planes seleccionados si existen
        $filtrosPlanes = !empty($params['planes']) ? explode(',', $params['planes']) : [];

        foreach ($resultados as $item) {
            $id_hotel = $item['id_hotel'];
            $id_hab = $item['id_habitacion'];
            
            // Obtenemos las tarifas agrupadas por plan
            $tarifasPorPlan = $this->obtenerTarifasAgrupadas($id_hab, $params['checkin'], $params['checkout']);

            foreach ($tarifasPorPlan as $idPlan => $diasTarifa) {
                
                // 1. FILTRO OPCIONAL: Planes seleccionados
                if (!empty($filtrosPlanes) && !in_array($idPlan, $filtrosPlanes)) {
                    continue;
                }

                if (count($diasTarifa) < $noches) continue;
                if (!$this->validarInventario($id_hab, $idPlan, $params['checkin'], $params['checkout'], $noches)) continue;
                if ($this->tieneRestriccion($id_hotel, $id_hab, $idPlan, $params['checkin'], $params['checkout'], $noches)) continue;

                $conteoCategorias = $this->clasificarMenores($edadesArray, $item);
                
                // Cálculo del precio final considerando todo lo anterior
                $calculo = $this->calcularPrecioFinal($diasTarifa, $item, $params, $conteoCategorias, $idPlan);

                // 2. FILTRO OPCIONAL: Rango de Precios
                if (!empty($filtrosPrecio)) {
                    $pasaFiltroPrecio = false;
                    foreach ($filtrosPrecio as $rango) {
                        list($min, $max) = explode('-', $rango);
                        if ($calculo['total'] >= (float)$min && $calculo['total'] <= (float)$max) {
                            $pasaFiltroPrecio = true;
                            break;
                        }
                    }
                    if (!$pasaFiltroPrecio) continue; // Si no entra en ningún rango, saltamos esta habitación
                }

                // Si llegamos aquí, la habitación pasó todos los filtros
                if (!isset($hotelesAgrupados[$id_hotel])) {
                    $hotelesAgrupados[$id_hotel] = [
                        'info' => $item,
                        'imagenes' => $this->getImagenesHotel($id_hotel),
                        'habitaciones' => [] 
                    ];
                }

                $hotelesAgrupados[$id_hotel]['habitaciones'][] = [
                    'id_hab'         => $id_hab,
                    'nombre_hab'     => $item['nombre_habitacion'],
                    'id_plan'        => $idPlan,
                    'nombre_plan'    => $nombresPlanes[$idPlan] ?? "Plan $idPlan",
                    'tarifa_total'   => $calculo['total'],
                    'precio_tachado' => $calculo['precio_tachado'],
                    'subtotal'       => $calculo['subtotal'],
                    'iva'            => $calculo['iva'],
                    'ish'            => $calculo['ish'],
                    'promos'         => $calculo['leyendas'],
                    'imagenes_hab'   => $this->getImagenesHabitacion($id_hab),
                    'cama_sencilla_habitacion' => $item['cama_sencilla_habitacion'],
                    'cama_doble_habitacion'    => $item['cama_doble_habitacion'],
                    'cama_queen_habitacion'    => $item['cama_queen_habitacion'],
                    'cama_king_habitacion'     => $item['cama_king_habitacion'],
                    'resumen_habitacion'       => $item['resumen_habitacion'],
                    'descripcion_habitacion'   => $item['descripcion_habitacion'],
                    'servicios_habitacion'     => $item['servicios_habitacion'],
                    'max_adultos_habitacion'   => $item['adultos_maximos_habitacion'],
                    'max_menores_habitacion'   => $item['menores_maximos_habitacion']
                ];
            }
        }

        // Al final, eliminamos hoteles que se hayan quedado sin habitaciones por los filtros
        $hotelesAgrupados = array_filter($hotelesAgrupados, function($h) {
            return !empty($h['habitaciones']);
        });

        foreach ($hotelesAgrupados as &$h) {
            usort($h['habitaciones'], fn($a, $b) => $a['tarifa_total'] <=> $b['tarifa_total']);
        }

        return $hotelesAgrupados;
    }

    public function getResumenSeleccion($params) {
        $hoteles = $this->getDisponibilidad($params);

        // Buscamos el hotel específico en los resultados
        if (isset($hoteles[$params['id_hotel']])) {
            $hotelSeleccionado = $hoteles[$params['id_hotel']];

            // Ahora buscamos la habitación y el plan exacto dentro de ese hotel
            foreach ($hotelSeleccionado['habitaciones'] as $hab) {
                if ($hab['id_hab'] == $params['id_habitacion'] && $hab['id_plan'] == $params['id_plan']) {
                    return [
                        'hotel' => $hotelSeleccionado['info'],
                        'imagenes' => $hotelSeleccionado['imagenes'],
                        'seleccion' => $hab // Aquí ya viene tarifa_total, subtotal, etc.
                    ];
                }
            }
        }

        return null;
    }

    public function guardarReservacion($data) {
        $db = \Config\Database::connect();
        $db->transStart();

        $fecha_inicio = new \DateTime($data['llegada_reservacion']);
        $fecha_fin    = new \DateTime($data['salida_reservacion']);
        $intervalo    = new \DateInterval('P1D');
        $periodo      = new \DatePeriod($fecha_inicio, $intervalo, $fecha_fin);

        foreach ($periodo as $fecha) {
            $fechaStr = $fecha->format('Y-m-d');
            
            $inv = $db->table('hoteles_inventario')
                ->where('id_hotel_inventario', $data['hotel_reservacion'])
                ->where('id_habitacion_inventario', $data['habitacion_reservacion'])
                ->where('plan_inventario', $data['plan_reservacion'])
                ->where('fecha_inventario', $fechaStr)
                ->get()->getRow();

            if (!$inv || $inv->cantidad_inventario < $data['numero_habitaciones_reservacion']) {
                $db->transRollback();
                return ['status' => false, 'message' => "Sin disponibilidad para el día $fechaStr"];
            }
        }

        foreach ($periodo as $fecha) {
            $fechaStr = $fecha->format('Y-m-d');
            
            $db->table('hoteles_inventario')
                ->where('id_hotel_inventario', $data['hotel_reservacion'])
                ->where('id_habitacion_inventario', $data['habitacion_reservacion'])
                ->where('plan_inventario', $data['plan_reservacion'])
                ->where('fecha_inventario', $fechaStr)
                ->set('cantidad_inventario', 'cantidad_inventario - ' . (int)$data['numero_habitaciones_reservacion'], false)
                ->update();
        }

        $db->table('reservaciones')->insert($data);
        $idReserva = $db->insertID();

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return ['status' => false, 'message' => "Error al procesar la transacción"];
        }

        return ['status' => true, 'id' => $idReserva];
    }

    private function calcularPrecioFinal($diasTarifa, $hotel, $params, $categorias, $idPlan)
    {
        $promo = $this->obtenerPromocionActiva($hotel['id_hotel'], $hotel['id_habitacion'], $idPlan, $params['checkin'], $params['checkout']);
        
        $subtotalNetoSinMarkup = 0;
        $ivaTotalNormal = 0;
        $ishTotalNormal = 0;
        
        $numAdultos = (int)$params['adultos'];
        $habitaciones = (int)$params['habitaciones']; 
        $markupFactor = (100 - (float)$hotel['markup_hotel']) / 100;

        // Columna de PAX para Todo Incluido (ID 3)
        $columnaPax = "pax" . min($numAdultos, 6) . "_tarifa";

        foreach ($diasTarifa as $dia) {
            $tarifaNoche = 0;

            if ($idPlan == 3) {
                $precioAdulto = (float)$dia[$columnaPax];
                $sumaAdultos = $precioAdulto * $numAdultos;

                $sumaMenores = ($categorias['infantes'] * (float)$dia['infante_tarifa']) +
                            ($categorias['menores']  * (float)$dia['menor_tarifa']) +
                            ($categorias['juniors']  * (float)$dia['junior_tarifa']) +
                            ($categorias['extras']   * (float)$dia['paxextra_tarifa']);

                $tarifaNoche = $sumaAdultos + $sumaMenores;
            } else {
                $tarifaBase = (float)$dia['base_tarifa'];
                $paxBase = 2;

                $costoAdultosExtra = 0;
                if ($numAdultos > $paxBase) {
                    $adultosExtra = $numAdultos - $paxBase;
                    $costoAdultosExtra = $adultosExtra * (float)$dia['paxextra_tarifa'];
                }

                $sumaMenoresPlanNormal = ($categorias['infantes'] * (float)$dia['infante_tarifa']) +
                                        ($categorias['menores'] * (float)$dia['menor_tarifa']) +
                                        ($categorias['juniors'] * (float)$dia['junior_tarifa']) +
                                        ($categorias['extras']   * (float)$dia['paxextra_tarifa']);

                $tarifaNoche = $tarifaBase + $costoAdultosExtra + $sumaMenoresPlanNormal;
            }

            $ventaNoche = $tarifaNoche / $markupFactor; 
            $subtotalNetoSinMarkup += $ventaNoche;

            $ivaPorc = (float)$dia['iva_tarifa'] / 100; 
            $ishPorc = (float)$dia['ish_tarifa'] / 100;

            $ivaTotalNormal += ($ventaNoche * $ivaPorc);
            $ishTotalNormal += ($ventaNoche * $ishPorc);
        }

        $precioTachado = ($subtotalNetoSinMarkup + $ivaTotalNormal + $ishTotalNormal) * $habitaciones;
        $subtotalConPromo = $subtotalNetoSinMarkup;
        $leyendas = [];

        if ($promo) {
            switch ($promo->tipo_promocion) {
                case 3: case 4: case 6:
                    $descuentoFactor = (float)$promo->valor_promocion / 100;
                    $subtotalConPromo = $subtotalNetoSinMarkup * (1 - $descuentoFactor);
                    $leyendas[] = "¡".$promo->valor_promocion."% de Descuento!";
                    break;
                case 5:
                    $numNoches = count($diasTarifa);
                    if ($numNoches > 1) {
                        $valorUnaNoche = $subtotalNetoSinMarkup / $numNoches;
                        $subtotalConPromo = $subtotalNetoSinMarkup - $valorUnaNoche;
                        $leyendas[] = "¡Noche Gratis!";
                    }
                    break;
                case 1:
                    if ($idPlan == 3 && $categorias['menores'] > 0) {
                        $costoUnMenor = array_sum(array_column($diasTarifa, 'menor_tarifa')) / $markupFactor;
                        $subtotalConPromo = $subtotalNetoSinMarkup - $costoUnMenor;
                        $leyendas[] = "¡Menores Gratis!";
                    }
                    break;
            }
        }

        $nuevoIva = $subtotalConPromo * $ivaPorc; 
        $nuevoIsh = $subtotalConPromo * $ishPorc;
        $tarifaTotalFinal = ($subtotalConPromo + $nuevoIva + $nuevoIsh) * $habitaciones;

        return [
            'total'          => round($tarifaTotalFinal, 2),
            'precio_tachado' => round($precioTachado, 2),
            'subtotal'       => round($subtotalConPromo * $habitaciones, 2),
            'iva'            => round($nuevoIva * $habitaciones, 2),
            'ish'            => round($nuevoIsh * $habitaciones, 2),
            'leyendas'       => $leyendas
        ];
    }

    private function aplicarPromociones($id_hotel, $id_hab, $id_plan, $params, $costoNeto)
    {
        $db = \Config\Database::connect();
        $hoy = date('Y-m-d');

        $promo = $db->table('hoteles_promociones')
            ->where('hotel_promocion', $id_hotel)
            ->where('plan_promocion', $id_plan) // Filtro por plan
            ->groupStart()
                ->where('habitacion_promocion', $id_hab)
                ->orWhere('habitacion_promocion', 0)
            ->groupEnd()
            ->where('status_promocion', 1)
            ->where('fechainicio_booking_promocion <=', $hoy)
            ->where('fechafin_booking_promocion >=', $hoy)
            ->where('fechainicio_travel_promocion <=', $params['checkin'])
            ->where('fechafin_travel_promocion >=', $params['checkout'])
            ->get()->getRow();

        if ($promo && $promo->valor_promocion > 0) {
            $descuento = $costoNeto * ($promo->valor_promocion / 100);
            $costoNeto -= $descuento;
        }
        return $costoNeto;
    }

    private function obtenerPromocionActiva($id_hotel, $id_hab, $id_plan, $checkin, $checkout)
    {
        $db = \Config\Database::connect();
        $hoy = date('Y-m-d'); 

        $builder = $db->table('hoteles_promociones');
        $builder->where('hotel_promocion', $id_hotel);
        $builder->where('habitacion_promocion', $id_hab);
        $builder->where('plan_promocion', $id_plan);
        $builder->where('status_promocion', 1);

        // Validación de Booking (Cuándo reserva)
        $builder->where('fechainicio_booking_promocion <=', $hoy);
        $builder->where('fechafin_booking_promocion >=', $hoy);

        // Validación de Travel (Cuándo viaja)
        // Usamos groupStart para asegurar que la estancia completa esté dentro del rango
        $builder->groupStart()
            ->where('fechainicio_travel_promocion <=', $checkin)
            ->where('fechafin_travel_promocion >=', $checkout)
        ->groupEnd();

        return $builder->get()->getRow();
    }

    private function validarInventario($id_hab, $id_plan, $checkin, $checkout, $noches) {
        $db = \Config\Database::connect();
        
        $count = $db->table('hoteles_inventario')
            ->where('id_habitacion_inventario', $id_hab)
            ->where('plan_inventario', $id_plan) // Filtro por plan obligatorio
            ->where('fecha_inventario >=', $checkin)
            ->where('fecha_inventario <', $checkout)
            ->where('cantidad_inventario >', 0)
            ->where('status_inventario', 1)
            ->countAllResults();

        return ($count >= $noches);
    }

    private function obtenerTarifasAgrupadas($id_hab, $checkin, $checkout)
    {
        $db = \Config\Database::connect();
        $tarifasRaw = $db->table('hoteles_tarifas')
            ->where('id_habitacion_tarifa', $id_hab)
            ->where('fecha_tarifa >=', $checkin)
            ->where('fecha_tarifa <', $checkout)
            ->get()->getResultArray();

        $agrupado = [];
        foreach ($tarifasRaw as $t) {
            $agrupado[$t['plan_tarifa']][] = $t;
        }
        return $agrupado;
    }

    private function tieneRestriccion($id_hotel, $id_hab, $idPlan, $checkin, $checkout, $noches)
    {
        $db = \Config\Database::connect();
        $hoy = date('Y-m-d');
        $diasAntelacion = (new \DateTime($hoy))->diff(new \DateTime($checkin))->days;

        $restricciones = $db->table('hoteles_restricciones')
            ->where('hotel_restriccion', $id_hotel)
            ->where('plan_restriccion', $idPlan)
            ->groupStart()
                ->where('habitacion_restriccion', $id_hab)
                ->orWhere('habitacion_restriccion', 0)
            ->groupEnd()
            ->where('status_restriccion', 1)
            ->get()->getResultArray();

        foreach ($restricciones as $res) {
            // Validar si la fecha de entrada cae en el rango de la restricción
            $enRango = ($checkin >= $res['fecha_inicio_restriccion'] && $checkin <= $res['fecha_fin_restriccion']);
            if (!$enRango) continue;

            switch ($res['tipo_restriccion']) {
                case 1: // Estancia Mínima
                    if ($noches < $res['dias_restriccion']) return true;
                    break;
                case 2: // Cut Off (Antelación)
                    if ($diasAntelacion < $res['dias_restriccion']) return true;
                    break;
                case 3: // Close to Arrival (CTA) - No se puede entrar este día
                    if ($checkin == $res['fecha_especifica_restriccion']) return true;
                    break;
                case 4: // Close to Departure (CTD) - No se puede salir este día
                    if ($checkout == $res['fecha_especifica_restriccion']) return true;
                    break;
            }
        }
        return false;
    }

    private function clasificarMenores($edades, $hotel)
    {
        $conteo = ['infantes' => 0, 'menores' => 0, 'juniors' => 0, 'extras' => 0];
        foreach ($edades as $edad) {
            if ($edad >= $hotel['infante_desde_hotel'] && $edad <= $hotel['infante_hasta_hotel']) {
                $conteo['infantes']++;
            } elseif ($edad >= $hotel['menor_desde_hotel'] && $edad <= $hotel['menor_hasta_hotel']) {
                $conteo['menores']++;
            } elseif ($edad >= $hotel['junior_desde_hotel'] && $edad <= $hotel['junior_hasta_hotel']) {
                $conteo['juniors']++;
            }else{
                $conteo['extras']++;
            }
        }
        return $conteo;
    }

    private function prepararEdades($edadesStr)
    {
        if (is_array($edadesStr)) return $edadesStr;
        return !empty($edadesStr) ? explode(',', $edadesStr) : [];
    }

    private function getImagenesHotel($id_hotel)
    {
        $db = \Config\Database::connect();
        return $db->table('hoteles_imagenes')
                ->where('id_hotel', $id_hotel)
                ->where('status_hotel_imagen', 1)
                ->orderBy('id_hotel', 'ASC')
                ->get()->getResultArray();
    }

    private function getImagenesHabitacion($id_hab)
    {
        $db = \Config\Database::connect();
        return $db->table('hoteles_habitaciones_imagenes')
                ->where('id_habitacion', $id_hab)
                ->where('status_imagen_habitacion', 1)
                ->orderBy('id_imagen_habitacion', 'ASC')
                ->get()->getResultArray();
    }
}