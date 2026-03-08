<?php

namespace App\Controllers;

use App\Models\GeneralModel;
use CodeIgniter\I18n\Time; 
use CodeIgniter\Files\File; 

class ExtHoteles extends BaseController
{
    
    protected $generalModel;

    
    protected $session;
    
    
    public function __construct()
    {
        $this->generalModel = new GeneralModel();
        $this->session = \Config\Services::session();
        helper(['url', 'form', 'filesystem']); 

        $user = $this->session->get('loggedInNaturleon');
        if (!$user || ($user['tipo_usuario'] !== 'admin' && $user['tipo_usuario'] !== 'hotel')) {
            $this->session->remove('loggedInNaturleon');
            $this->session->remove('idupdate');
            header('Location: ' . base_url());
            exit(); 
        }
        
    }

    public function index()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            
            $result['destinosnacionales'] = $this->generalModel->selectData(
                "*", 
                "destinos", 
                ["tipo_destino"], 
                ["Nacional"], 
                [], 
                []
            );

            
            $result['destinosinternacionales'] = $this->generalModel->selectData(
                "*", 
                "destinos", 
                ["tipo_destino"], 
                ["Internacional"], 
                [], 
                []
            );
            
            
            $result["regimen"] = $this->generalModel->selectData(
                "*", 
                "regimen_fiscal", 
                [], [], [], []
            );

            
            $result["cfdi"] = $this->generalModel->selectData(
                "*", 
                "uso_cfdi", 
                [], [], [], []
            );

            
            $result["formaspago"] = $this->generalModel->selectData(
                "*", 
                "formas_pago", 
                [], [], [], []
            );

            
            $result["metodospago"] = $this->generalModel->selectData(
                "*", 
                "metodos_pago", 
                [], [], [], []
            );

            
            $result["hoteles"] = $this->generalModel->selectData(
                "*", 
                "hoteles h", 
                [], 
                [], 
                ["destinos d"], 
                ["d.id_destino = h.destino_hotel"]
            );

            echo view('extranet/header',$user);
            echo view('extranet/hoteles/agregar', $result);
            return view('extranet/footer');
            
        }else{
            return redirect()->to(base_url());
        }
    }
    
    public function AgregarHotel()
    {
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'nombre_hotel'              => $data['nombrehotel'],
                'destino_hotel'             => $data['destinohotel'],
                'markup_hotel'              => $data['markuphotel'],
                'iva_hotel'                 => $data['ivahotel'],
                'ish_hotel'                 => $data['ishhotel'],
                'infante_desde_hotel'       => $data['infanteDesdeHotel'],
                'infante_hasta_hotel'       => $data['infanteHastaHotel'],
                'menor_desde_hotel'         => $data['menorDesdeHotel'],
                'menor_hasta_hotel'         => $data['menorHastaHotel'],
                'junior_desde_hotel'        => $data['juniorDesdeHotel'],
                'junior_hasta_hotel'        => $data['juniorHastaHotel'],
                'email_reservaciones_hotel' => $data['emailreservacioneshotel'],
                'email_tarifas_hotel'       => $data['emailtarifashotel'],
                'categoria_hotel'           => $data['categoria'],
                'contacto_hotel'            => $data['contactohotel'],
                'telefono_principal_hotel'  => $data['telefonoprincipalhotel'],
                'telefono_adicional_hotel'  => $data['telefonoadicionalhotel'],
                'ubicacion_hotel'           => $data['ubicacionhotel'],
                'descripcion_hotel'         => $data['descripcionhotel'],
                'opt_expo_hotel'            => $data['expo'] ?? 0, 
                'opt_mbp_hotel'             => $data['mbp'] ?? 0,
                'opt_naturcharter_hotel'    => $data['naturcharter'] ?? 0,
                'opt_solobus_hotel'         => $data['solobus'] ?? 0,
                'opt_traslado_hotel'        => $data['traslado'] ?? 0,
                'razon_social_hotel'        => $data['razonsocialfiscalhotel'],
                'rfc_hotel'                 => $data['rfcfiscalhotel'],
                'callenum_hotel'            => $data['callenumfiscalhotel'],
                'colonia_hotel'             => $data['colonia_fiscalhotel'],
                'pais_hotel'                => $data['paisfiscalhotel'],
                'estado_hotel'              => $data['estado_fiscalhotel'],
                'municipio_hotel'           => $data['municipio_fiscalhotel'],
                'codigo_postal_hotel'       => $data['cp_fiscalhotel'],
                'email_hotel'               => $data['emailfiscalhotel'],
                'forma_pago_hotel'          => $data['formaPagoHotel'],
                'metodo_pago_hotel'         => $data['metodoPagoHotel'],
                'regimen_fiscal_hotel'      => $data['regimenFiscalHotel'],
                'uso_cfdi_hotel'            => $data['usoCFDIHotel'],
                'status_hotel'              => 1,
                'usuario_alta_hotel'        => $datosUsuario['id_usuario'], 
                'fechahora_alta_hotel'      => date("Y-m-d H:i:s"),
            ];

            $fromtable = "hoteles";

            $idhotel = $this->generalModel->insertDataReturn($Array, $fromtable);

            $msg = "Error"; 

            if ($idhotel) {
                $nombreHotelLimpio = str_replace(' ', '', $data['nombrehotel']);
                $path = "assets/hoteles/{$nombreHotelLimpio}/";

                if (!is_dir($path)) {
                    mkdir($path, 0775, TRUE);
                }

                $logo = $this->request->getFile('logotipohotel');

                if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                    
                    $newName = $logo->getRandomName();
                    $logo->move(ROOTPATH . 'public/' . $path, $newName);

                    $ArrayUpdate = [
                        'logotipo_hotel' => $path . $newName,
                    ];
                    
                    
                    $this->generalModel->updateData(
                        $ArrayUpdate, 
                        "hoteles", 
                        ["id_hotel"], 
                        [$idhotel]
                    );
                }
                $msg = "Success";
            }
            
            
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function SaveID()
    {
        if($this->session->get('loggedInNaturleon')){
            $id = $this->request->getPost('id');
            
            $array = ['id' => $id];

            $this->session->set('idupdate', $array);

            if ($this->session->get('idupdate')) {
                $msg = "Success";
            } else {
                $msg = "Error";
            }
            
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }
    
    public function Administrar()
    {
        $datosUsuario = $this->session->get('loggedInNaturleon');
        $sessionData = $this->session->get('idupdate');

        if($datosUsuario){

            if($sessionData){
                $id_hotel = $sessionData['id'];
            }else{
                $id_hotel = $datosUsuario['entidad_usuario'];
                $array = ['id' => $id_hotel];
                $this->session->set('idupdate', $array);
            }

            $result = [];

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result['datosUsuario'] = $datosUsuario;
            
            
            $fecha1 = $this->request->getGet('fechainicial');
            $fecha2 = $this->request->getGet('fechafinal');
            $result['fecha1'] = $fecha1;
            $result['fecha2'] = $fecha2;
            
            
            $result['dates'] = $this->createDateRange($fecha1, $fecha2);
            
            
            $result["hotel"] = $this->generalModel->selectData(
                "*", "hoteles h", ["h.id_hotel"], [$id_hotel], ["destinos d"], ["d.id_destino = h.destino_hotel"]
            );
            
            $codigo_postal = $result['hotel'][0]['codigo_postal_hotel'] ?? null;
            
            
            $result["colonias"] = $this->generalModel->selectData(
                "*", "colonias", ["codigo_postal"], [$codigo_postal], [], []
            );
            
            
            $result["hoteles"] = $this->generalModel->selectData(
                "*", "hoteles h", [], [], ["destinos d"], ["d.id_destino = h.destino_hotel"]
            );

            
            $result['destinosnacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Nacional"], [], []);
            $result['destinosinternacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Internacional"], [], []);
            $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);
            $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);
            $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);
            $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);
            
            
            $result["usuarios"] = $this->generalModel->selectData(
                "*", "usuarios", ["id_entidad", "tipo_acceso"], [$id_hotel, "hotel"], [], []
            );

            
            $result["cuentas"] = $this->generalModel->selectData(
                "*", "hoteles_cuentas", ["id_hotel"], [$id_hotel], [], []
            );

            
            $result["habitaciones"] = $this->generalModel->selectData(
                "*", "hoteles_habitaciones", ["id_hotel"], [$id_hotel], [], []
            );
            
            
            $result["inventario"] = $this->generalModel->selectData(
                "*", 
                "hoteles_inventario hi", 
                ["hi.id_hotel_inventario", "hi.fecha_inventario >=", "hi.fecha_inventario <="], 
                [$id_hotel, $fecha1, $fecha2], 
                ["hoteles_tipos_planes htp"], 
                ["htp.id_tipo_plan = hi.plan_inventario"]
            );

            
            $result["planes"] = $this->generalModel->selectData("*", "hoteles_tipos_planes", [], [], [], []);
            
            
            $result["tarifas"] = $this->generalModel->selectData(
                "*", 
                "hoteles_tarifas ht", 
                ["ht.id_hotel_tarifa", "ht.fecha_tarifa >=", "ht.fecha_tarifa <="], 
                [$id_hotel, $fecha1, $fecha2], 
                ["hoteles_tipos_planes htp"], 
                ["htp.id_tipo_plan = ht.plan_tarifa"]
            );
            
            
            $result["tipospromociones"] = $this->generalModel->selectData("*", "hoteles_tipos_promociones", [], [], [], []);

            
            $result["promociones"] = $this->generalModel->selectData(
                "*", 
                "hoteles_promociones hp", 
                ["hp.hotel_promocion"], 
                [$id_hotel], 
                ["hoteles_tipos_planes htp", "hoteles_tipos_promociones htpro"], 
                ["htp.id_tipo_plan = hp.plan_promocion", "htpro.id_tipo_promocion = hp.tipo_promocion"]
            );

            
            $result["tiposrestricciones"] = $this->generalModel->selectData("*", "hoteles_tipos_restricciones", [], [], [], []);

            
            $result["restricciones"] = $this->generalModel->selectData(
                "*", 
                "hoteles_restricciones hr", 
                ["hr.hotel_restriccion", "hr.fecha_restriccion >=", "hr.fecha_restriccion <="], 
                [$id_hotel, $fecha1, $fecha2], 
                ["hoteles_tipos_planes htp", "hoteles_tipos_restricciones htr"], 
                ["htp.id_tipo_plan = hr.plan_restriccion", "htr.id_tipo_restriccion = hr.tipo_restriccion"]
            );

            
            $result["imageneshotel"] = $this->generalModel->selectData(
                "*", "hoteles_imagenes", ["id_hotel"], [$id_hotel], [], []
            );

            
            $result["fotosMbp"] = $this->generalModel->selectData(
                "*", "mbp_fotos", ["id_hotel_mbp"], [$id_hotel], [], []
            );

            
            $result["videosMbp"] = $this->generalModel->selectData(
                "*", "mbp_videos", ["id_hotel_mbp"], [$id_hotel], [], []
            );

            
            $paquetes = $this->generalModel->selectData(
                "*", "mbp_paquetes", ["id_hotel_mbp"], [$id_hotel], [], []
            );

            $paquetes_agrupados = [];
            if (is_array($paquetes)) {
                
                usort($paquetes, function($a, $b) {
                    return $b['status_paquete_mbp'] <=> $a['status_paquete_mbp'];
                });

                foreach ($paquetes as $paquete) {
                    $nombre = $paquete['nombre_paquete_mbp'];
                    if (!isset($paquetes_agrupados[$nombre])) {
                        $paquetes_agrupados[$nombre] = [];
                    }
                    $paquetes_agrupados[$nombre][] = $paquete;
                }
            }
            $result['paquetesMbp'] = $paquetes_agrupados;

            
            echo view('extranet/header',$user);
            echo view('extranet/hoteles/administrar', $result);
            return view('extranet/footer');
        } else {
            return redirect()->to(base_url());
        }
    }
    
    public function DatosGenerales()
    {
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id_hotel = $sessionData['id'];
            $data = $this->request->getPost();
            
            $nombreHotelLimpio = str_replace(' ', '', $data['nombrehotel']);
            $path = "assets/hoteles/{$nombreHotelLimpio}/";
            
            if (!is_dir($path)) {
                mkdir($path, 0775, TRUE);
            }

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            
            $Array = [
                'nombre_hotel'              => $data['nombrehotel'],
                'destino_hotel'             => $data['destinohotel'],
                'markup_hotel'              => $data['markuphotel'],
                'iva_hotel'                 => $data['ivahotel'],
                'ish_hotel'                 => $data['ishhotel'],
                'infante_desde_hotel'       => $data['infanteDesdeHotel'],
                'infante_hasta_hotel'       => $data['infanteHastaHotel'],
                'menor_desde_hotel'         => $data['menorDesdeHotel'],
                'menor_hasta_hotel'         => $data['menorHastaHotel'],
                'junior_desde_hotel'        => $data['juniorDesdeHotel'],
                'junior_hasta_hotel'        => $data['juniorHastaHotel'],
                'email_reservaciones_hotel' => $data['emailreservacioneshotel'],
                'email_tarifas_hotel'       => $data['emailtarifashotel'],
                'categoria_hotel'           => $data['categoria'],
                'contacto_hotel'            => $data['contactohotel'],
                'telefono_principal_hotel'  => $data['telefonoprincipalhotel'],
                'telefono_adicional_hotel'  => $data['telefonoadicionalhotel'],
                'ubicacion_hotel'           => $data['ubicacionhotel'],
                'descripcion_hotel'         => $data['descripcionhotel'],
                'opt_expo_hotel'            => $data['expo'] ?? 0,
                'opt_mbp_hotel'             => $data['mbp'] ?? 0,
                'opt_naturcharter_hotel'    => $data['naturcharter'] ?? 0,
                'opt_solobus_hotel'         => $data['solobus'] ?? 0,
                'opt_traslado_hotel'        => $data['traslado'] ?? 0,
                'usuario_modificacion_hotel' => $datosUsuario['id_usuario'], 
                'fechahora_modificacion_hotel' => date("Y-m-d H:i:s"),
            ];

            
            $logo = $this->request->getFile('logotipo_hotel');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                $newName = $logo->getRandomName();
                $logo->move(ROOTPATH . 'public/' . $path, $newName);
                $Array['logotipo_hotel'] = $path . $newName; 
            }

            
            $result = $this->generalModel->updateData(
                $Array, 
                "hoteles", 
                ["id_hotel"], 
                [$id_hotel]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
            
        } else {
            return redirect()->to(base_url());
        }
    }
    
    public function DatosFiscales()
    {
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id_hotel = $sessionData['id'];
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'razon_social_hotel'        => $data['razonsocialfiscalhotel'],
                'rfc_hotel'                 => $data['rfcfiscalhotel'],
                'callenum_hotel'            => $data['callenumfiscalhotel'],
                'colonia_hotel'             => $data['colonia_fiscalhotel2'],
                'pais_hotel'                => $data['paisfiscalhotel'],
                'estado_hotel'              => $data['estado_fiscalhotel2'],
                'municipio_hotel'           => $data['municipio_fiscalhotel2'],
                'codigo_postal_hotel'       => $data['cp_fiscalhotel2'],
                'email_hotel'               => $data['emailfiscalhotel'],
                'forma_pago_hotel'          => $data['formaPagoHotel'],
                'metodo_pago_hotel'         => $data['metodoPagoHotel'],
                'regimen_fiscal_hotel'      => $data['regimenFiscalHotel'],
                'uso_cfdi_hotel'            => $data['usoCFDIHotel'],
                'usuario_modificacion_hotel' => $datosUsuario['id_usuario'], 
                'fechahora_modificacion_hotel' => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "hoteles", 
                ["id_hotel"], 
                [$id_hotel]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }
    
    public function DataModificar()
    {
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();
            
            $arrWhere = [$data['namefield']];
            $arrCond = [$data['id']];
            
            $result = $this->generalModel->selectData(
                "*", 
                $data['db'], 
                $arrWhere, 
                $arrCond, 
                [], 
                []
            );

            $response = [];
            if (!empty($result)) {
                $response = ["msg" => "Success", $data['nameresult'] => $result];
            } else {
                $response = ["msg" => "Error"];
            }
            
            
            return $this->response->setJSON($response);
        }else{
            return redirect()->to(base_url());
        }
    }
    
    public function DataModificar2()
    {
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $arrWhere = [$data['namefield']];
            $arrCond = [$data['id']];
            
            $result = $this->generalModel->selectData(
                "*", 
                $data['db'], 
                $arrWhere, 
                $arrCond, 
                [], 
                []
            );

            $response = [];
            if (!empty($result)) {
                $response = ["msg" => "Success", $data['nameresult'] => $result];
            } else {
                $response = ["msg" => "Error"];
            }
            
            return $this->response->setJSON($response);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Usuarios(){
        $sessionData = $this->session->get('idupdate');
        $datosUsuario = $this->session->get('loggedInNaturleon');

        if ($sessionData && $datosUsuario) {
            $request = $this->request;
            
            $idUsuario = (int)$request->getPost('idUsuario');
            $login = $request->getPost('loginUsuario');
            $pwd = $request->getPost('passwordUsuario');

            $fiscalData = [
                'alias_usuario'  => $request->getPost('aliasUsuario'),
                'nombre_usuario' => $request->getPost('nombreUsuario'),
                'email_usuario'  => $request->getPost('emailUsuario'),
                'movil_usuario'  => $request->getPost('movilUsuario'),
                'login_usuario'  => $login,
                'status_usuario' => $request->getPost('statusUsuario'),
            ];

            $fromtable = "usuarios";

            if ($idUsuario === 0) {
                // --- INSERCIÓN ---
                $Array = array_merge($fiscalData, [
                    'id_entidad'    => $sessionData['id'],
                    'tipo_acceso'   => "hotel",
                    'pwd_usuario'   => password_hash($pwd, PASSWORD_DEFAULT),
                    'usuario_alta'  => $datosUsuario['id_usuario'],
                    'fecha_alta'    => date("Y-m-d H:i:s"),
                ]);

                $result = $this->generalModel->insertData($Array, $fromtable);
            } else {
                // --- ACTUALIZACIÓN ---
                $Array = array_merge($fiscalData, [
                    'usuario_mod'   => $datosUsuario['id_usuario'],
                    'fecha_mod' => date("Y-m-d H:i:s"),
                ]);

                if (!empty($pwd)) {
                    $Array['pwd_usuario'] = password_hash($pwd, PASSWORD_DEFAULT);
                }

                $result = $this->generalModel->updateData($Array, $fromtable, ["id_usuario"], [$idUsuario]);
            }
            
            return $this->response->setBody($result ? "Success" : "Error");

        } else {
            return redirect()->to(base_url());
        }
    }

    public function Cuentas()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $cuenta = $request->getPost('idCuenta');
            $msg = "Error";
            $fromtable = "hoteles_cuentas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($cuenta == 0) {
                
                $Array = [
                    'id_hotel'                      => $sessionData['id'],
                    'alias_cuenta'                  => $request->getPost('aliasCuenta'),
                    'nombre_cuenta'                 => $request->getPost('nombreCuenta'),
                    'institucion_cuenta'            => $request->getPost('institucionCuenta'),
                    'tipo_cuenta'                   => $request->getPost('tipoCuenta'),
                    'num_cuenta'                    => $request->getPost('numCuenta'),
                    'clabe_cuenta'                  => $request->getPost('clabeCuenta'),
                    'observaciones_cuenta'          => $request->getPost('observacionesCuenta'),
                    'status_cuenta'                 => $request->getPost('statusCuenta'),
                    'usuario_alta_cuenta'           => $datosUsuario['id_usuario'],
                    'fechahora_alta_cuenta'         => Time::now()->toDateTimeString(),
                ];

                $result = $this->generalModel->insertData($Array, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                
                $Array = [
                    'alias_cuenta'                  => $request->getPost('aliasCuenta'),
                    'nombre_cuenta'                 => $request->getPost('nombreCuenta'),
                    'institucion_cuenta'            => $request->getPost('institucionCuenta'),
                    'tipo_cuenta'                   => $request->getPost('tipoCuenta'),
                    'num_cuenta'                    => $request->getPost('numCuenta'),
                    'clabe_cuenta'                  => $request->getPost('clabeCuenta'),
                    'observaciones_cuenta'          => $request->getPost('observacionesCuenta'),
                    'status_cuenta'                 => $request->getPost('statusCuenta'),
                    'usuario_modificacion_cuenta'   => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_cuenta' => Time::now()->toDateTimeString(),
                ];

                $arrWhere = ["id_cuenta"];
                $arrCond = [$cuenta];
                
                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Habitaciones()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $habitacion = $request->getPost('idHabitacion');
            $msg = "Error";
            $fromtable = "hoteles_habitaciones";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'nombre_habitacion'             => $request->getPost('nombreHabitacion'),
                'tipo_habitacion'               => $request->getPost('tipoHabitacion'),
                'cama_sencilla_habitacion'      => $request->getPost('sencillaHabitacion'),
                'cama_doble_habitacion'         => $request->getPost('dobleHabitacion'),
                'cama_queen_habitacion'         => $request->getPost('queenHabitacion'),
                'cama_king_habitacion'          => $request->getPost('kingHabitacion'),
                'adultos_minimos_habitacion'    => $request->getPost('adultosMinimosHabitacion'),
                'adultos_maximos_habitacion'    => $request->getPost('adultosMaximosHabitacion'),
                'menores_maximos_habitacion'    => $request->getPost('menoresMaximosHabitacion'),
                'personas_maximas_habitacion'   => $request->getPost('personasMaximasHabitacion'),
                'resumen_habitacion'            => $request->getPost('resumenHabitacion'),
                'descripcion_habitacion'        => $request->getPost('descripcionHabitacion'),
                'servicios_habitacion'          => $request->getPost('serviciosHabitacion'),
                'status_habitacion'             => $request->getPost('statusHabitacion'),
            ];

            if ($habitacion == 0) {
                
                $Array['id_hotel'] = $sessionData['id'];
                $Array['usuario_alta_habitacion'] = $datosUsuario['id_usuario'];
                $Array['fechahora_alta_habitacion'] = Time::now()->toDateTimeString();
                $Array['usuario_modificacion_habitacion'] = $datosUsuario['id_usuario'];
                $Array['fechahora_modificacion_habitacion'] = Time::now()->toDateTimeString();

                $result = $this->generalModel->insertData($Array, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                
                $Array['usuario_modificacion_habitacion'] = $datosUsuario['id_usuario'];
                $Array['fechahora_modificacion_habitacion'] = Time::now()->toDateTimeString();

                $arrWhere = ["id_habitacion"];
                $arrCond = [$habitacion];
                
                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function ImagenesHabitaciones()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $msg = "Error";
            $fromtable = "hoteles_habitaciones_imagenes";
            $idHabitacionImagen = $request->getPost('idHabitacionImagen');
            $nombreImagenHabitacion = $request->getPost('nombreImagenHabitacion');

            
            $columnselect = "h.*, d.nombre_destino";
            $fromtable_hotel = "hoteles h";
            $arrWhere = ["h.id_hotel"];
            $arrCond = [$sessionData['id']];
            $arrJoin = ["destinos d"];
            $arrCondJoin = ["d.id_destino = h.destino_hotel"];

            $hotel = $this->generalModel->selectData($columnselect, $fromtable_hotel, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

            if (empty($hotel)) {
                return $this->response->setBody("Error: Hotel no encontrado.");
            }

            $nombrehotel = str_replace(' ', '', $hotel[0]->nombre_hotel ?? '');
            $nombrehabitacion = str_replace(' ', '', $request->getPost('nombreHabitacionImagen') ?? '');

            $path_public_relative = "assets/hoteles/" . $nombrehotel . "/" . $nombrehabitacion . "/";
            $path_absolute = ROOTPATH . 'public/' . $path_public_relative;

            
            if (!is_dir($path_absolute)) {
                if (!mkdir($path_absolute, 0775, true)) {
                    return $this->response->setBody("Error: No se pudo crear el directorio de subida.");
                }
            }

            
            $uploaded_files = [];
            $files = $request->getFiles();

            if (!empty($files['imagenesHabitacion'])) {
                foreach ($files['imagenesHabitacion'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        if ($file->move($path_absolute, $newName)) {
                            
                            $uploaded_files[] = $path_public_relative . $newName; 
                        } else {
                            return $this->response->setBody("Error al subir archivo: " . $file->getErrorString());
                        }
                    } else if ($file->getError() !== 4) {
                        return $this->response->setBody("Error al validar archivo: " . $file->getErrorString());
                    }
                }
            }

            
            if (!empty($uploaded_files)) {
                $success_count = 0;
                $currentDateTime = Time::now()->toDateTimeString();

                $datosUsuario = $this->session->get('loggedInNaturleon');

                foreach ($uploaded_files as $file_path) {
                    $Array = [
                        'id_habitacion'                             => $idHabitacionImagen,
                        'nombre_imagen_habitacion'                  => $nombreImagenHabitacion,
                        'archivo_imagen_habitacion'                 => $file_path,
                        'usuario_modificacion_imagen_habitacion'    => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_imagen_habitacion'  => $currentDateTime,
                    ];

                    if ($this->generalModel->insertData($Array, $fromtable)) {
                        $success_count++;
                    }
                }
                $msg = ($success_count > 0) ? "Success" : "Error";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Inventario()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $msg = "Error";
            $fromtable = "hoteles_inventario";

            $hotel = $sessionData['id'];
            $dias = json_decode($request->getPost('diasCheckeados'), true);
            $habitacion = $request->getPost('habitacionInventario');
            $plan = $request->getPost('planInventario');
            $fechainicio = $request->getPost('fechaInicioInventario');
            $fechafin = $request->getPost('fechaFinInventario');
            $cantidad = $request->getPost('cantidadInventario');
            $currentDateTime = Time::now()->toDateTimeString();

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    
                    $arrWhere = ["fecha_inventario", "id_hotel_inventario", "id_habitacion_inventario", "plan_inventario"];
                    $arrCond = [$fecha, $hotel, $habitacion, $plan];

                    
                    $inventario = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    if ($inventario) {
                        
                        $Array = [
                            'cantidad_inventario'               => $cantidad,
                            'usuario_modificacion_inventario'   => $datosUsuario['id_usuario'],
                            'fechahora_modificacion_inventario' => $currentDateTime,
                        ];

                        $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
                    } else {
                        
                        $Array = [
                            'id_hotel_inventario'               => $hotel,
                            'id_habitacion_inventario'          => $habitacion,
                            'fecha_inventario'                  => $fecha,
                            'cantidad_inventario'               => $cantidad,
                            'plan_inventario'                   => $plan,
                            'status_inventario'                 => 1,
                            'usuario_modificacion_inventario'   => $datosUsuario['id_usuario'], 
                            'fechahora_modificacion_inventario' => $currentDateTime,
                        ];

                        $result = $this->generalModel->insertData($Array, $fromtable);
                    }

                    if ($result) {
                        $success_count++;
                    }
                }
            }

            if ($success_count > 0) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function AbrirCerrarFechasInventario()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $msg = "Error";
            $fromtable = "hoteles_inventario";

            $hotel = $sessionData['id'];
            $dias = json_decode($request->getPost('diasSeleccionados'), true);
            $habitacion = $request->getPost('habitacion');
            $plan = $request->getPost('plan');
            $fechainicio = $request->getPost('fechainicio');
            $fechafin = $request->getPost('fechafin');
            $status = $request->getPost('status');
            $currentDateTime = Time::now()->toDateTimeString();

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    $Array = [
                        'status_inventario'                 => $status,
                        'usuario_modificacion_inventario'   => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_inventario' => $currentDateTime,
                    ];

                    $arrWhere = ["fecha_inventario", "id_hotel_inventario", "id_habitacion_inventario", "plan_inventario"];
                    $arrCond = [$fecha, $hotel, $habitacion, $plan];

                    $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
                    
                    if ($result) {
                        $success_count++;
                    }
                }
            }

            if ($success_count > 0) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Tarifas()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $msg = "Error";
            $fromtable = "hoteles_tarifas";

            $hotel = $sessionData['id'];
            $dias = json_decode($request->getPost('diasCheckeados'), true);
            $habitacion = $request->getPost('habitacionTarifa');
            $plan = $request->getPost('planTarifa');
            $fechainicio = $request->getPost('fechaInicioTarifa');
            $fechafin = $request->getPost('fechaFinTarifa');
            $ivaTarifa = $request->getPost('ivaTarifa');
            $ishTarifa = $request->getPost('ishTarifa');
            $tarifaDoble = $request->getPost('tarifaDoble');
            $tarifaPersonaAdicional = $request->getPost('tarifaPersonaAdicional');
            $tarifaInfante = $request->getPost('tarifaInfante');
            $tarifaMenor = $request->getPost('tarifaMenor');
            $tarifaJunior = $request->getPost('tarifaJunior');
            $tarifaPax1 = $request->getPost('tarifaPax1');
            $tarifaPax2 = $request->getPost('tarifaPax2');
            $tarifaPax3 = $request->getPost('tarifaPax3');
            $tarifaPax4 = $request->getPost('tarifaPax4');
            $tarifaPax5 = $request->getPost('tarifaPax5');
            $tarifaPax6 = $request->getPost('tarifaPax6');
            $currentDateTime = Time::now()->toDateTimeString();

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    
                    $arrWhere = ["fecha_tarifa", "id_hotel_tarifa", "id_habitacion_tarifa", "plan_tarifa"];
                    $arrCond = [$fecha, $hotel, $habitacion, $plan];

                    
                    $tarifa = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    $Array_common = [
                        'iva_tarifa'                    => $ivaTarifa,
                        'ish_tarifa'                    => $ishTarifa,
                        'base_tarifa'                   => $tarifaDoble,
                        'pax1_tarifa'                   => $tarifaPax1,
                        'pax2_tarifa'                   => $tarifaPax2,
                        'pax3_tarifa'                   => $tarifaPax3,
                        'pax4_tarifa'                   => $tarifaPax4,
                        'pax5_tarifa'                   => $tarifaPax5,
                        'pax6_tarifa'                   => $tarifaPax6,
                        'paxextra_tarifa'               => $tarifaPersonaAdicional,
                        'infante_tarifa'                => $tarifaInfante,
                        'junior_tarifa'                 => $tarifaJunior,
                        'menor_tarifa'                  => $tarifaMenor,
                        'usuario_modificacion_tarifa'   => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_tarifa' => $currentDateTime,
                    ];

                    if ($tarifa) {
                        
                        $result = $this->generalModel->updateData($Array_common, $fromtable, $arrWhere, $arrCond);
                    } else {
                        
                        $Array_insert = array_merge($Array_common, [
                            'id_hotel_tarifa'       => $hotel,
                            'id_habitacion_tarifa'  => $habitacion,
                            'plan_tarifa'           => $plan,
                            'fecha_tarifa'          => $fecha,
                            'status_tarifa'         => 1,
                        ]);
                        $result = $this->generalModel->insertData($Array_insert, $fromtable);
                    }

                    if ($result) {
                        $success_count++;
                    }
                }
            }

            if ($success_count > 0) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Promociones()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $promocion = $request->getPost('idPromocion');
            $msg = "Error";
            $fromtable = "hoteles_promociones";
            $currentDateTime = Time::now()->toDateTimeString();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'nombre_promocion'                  => $request->getPost('nombrePromocion'),
                'tipo_promocion'                    => $request->getPost('tipoPromocion'),
                'plan_promocion'                    => $request->getPost('planPromocion'),
                'habitacion_promocion'              => $request->getPost('habitacionPromocion'),
                'fechainicio_booking_promocion'     => $request->getPost('fechaInicioBookingWindow'),
                'fechafin_booking_promocion'        => $request->getPost('fechaFinBookingWindow'),
                'fechainicio_travel_promocion'      => $request->getPost('fechaInicioTravelWindow'),
                'fechafin_travel_promocion'         => $request->getPost('fechaFinTravelWindow'),
                'valor_promocion'                   => $request->getPost('valorPromocion'),
                'periodo_promocion'                 => $request->getPost('periodoPromocion'),
                'usuario_modificacion_promocion'    => $datosUsuario['id_usuario'],
                'fechahora_modificacion_promocion'  => $currentDateTime,
            ];

            if ($promocion == 0) {
                
                $Array['hotel_promocion'] = $sessionData['id'];
                $Array['status_promocion'] = 1;

                $result = $this->generalModel->insertData($Array, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                
                $arrWhere = ["id_promocion"];
                $arrCond = [$promocion];

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Restricciones()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $msg = "Error";
            $fromtable = "hoteles_restricciones";

            $hotel = $sessionData['id'];
            $dias = json_decode($request->getPost('diasCheckeados'), true);
            $habitacion = $request->getPost('habitacionRestriccion');
            $plan = $request->getPost('planRestriccion');
            $tipo = $request->getPost('tipoRestriccion');
            $cantidadDias = $request->getPost('diasRestriccion');
            $fechainicio = $request->getPost('fechaInicioRestriccion');
            $fechafin = $request->getPost('fechaFinRestriccion');
            $currentDateTime = Time::now()->toDateTimeString();

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    
                    $arrWhere = ["fecha_restriccion", "hotel_restriccion", "habitacion_restriccion", "plan_restriccion"];
                    $arrCond = [$fecha, $hotel, $habitacion, $plan];

                    
                    $restriccion = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    $Array_common = [
                        'dias_restriccion'                  => $cantidadDias,
                        'usuario_modificacion_restriccion'  => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_restriccion'=> $currentDateTime,
                    ];

                    if ($restriccion) {
                        
                        $result = $this->generalModel->updateData($Array_common, $fromtable, $arrWhere, $arrCond);
                    } else {
                        
                        $Array_insert = array_merge($Array_common, [
                            'hotel_restriccion'         => $hotel,
                            'habitacion_restriccion'    => $habitacion,
                            'plan_restriccion'          => $plan,
                            'tipo_restriccion'          => $tipo,
                            'fecha_restriccion'         => $fecha,
                            'fecha_inicio_restriccion'  => $fechainicio,
                            'fecha_fin_restriccion'     => $fechafin,
                            'status_restriccion'        => 1,
                        ]);

                        $result = $this->generalModel->insertData($Array_insert, $fromtable);
                    }

                    if ($result) {
                        $success_count++;
                    }
                }
            }

            if ($success_count > 0) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function ImagenesHotel()
    {
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $request = $this->request;
            $fromtable = "hoteles_imagenes";
            
            $idHotel = $sessionData['id'];
            $nombreImagenHotel = $request->getPost('nombreImagenHotel');

            $hotel = $this->generalModel->selectData("*", "hoteles", ["id_hotel"], [$idHotel], [], []);

            if (empty($hotel)) {
                return $this->response->setBody("Error: El hotel con ID $idHotel no existe en la base de datos.");
            }

            $nombrehotel = str_replace(' ', '', $hotel[0]['nombre_hotel'] ?? 'SinNombre');
            $path_public_relative = "assets/hoteles/" . $nombrehotel . "/";
            $path_absolute = ROOTPATH . 'public/' . $path_public_relative;

            if (!is_dir($path_absolute)) {
                mkdir($path_absolute, 0775, true);
            }

            $files = $request->getFiles();

            // Si esta lista está vacía, el JS no está enviando el campo correcto
            if (empty($files['archivosImagenesHotel'])) {
                return $this->response->setBody("Error: No se recibió el campo 'archivosImagenesHotel'.");
            }

            $uploaded_files = [];
            foreach ($files['archivosImagenesHotel'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    if ($file->move($path_absolute, $newName)) {
                        $uploaded_files[] = $path_public_relative . $newName; 
                    }
                } else {
                    // Si el archivo no es válido, nos dirá por qué (ej. tamaño, formato)
                    return $this->response->setBody("Error en archivo: " . $file->getErrorString());
                }
            }

            if (!empty($uploaded_files)) {
                $success_count = 0;
                $currentDateTime = date("Y-m-d H:i:s");
                $datosUsuario = $this->session->get('loggedInNaturleon');

                foreach ($uploaded_files as $file_path) {
                    $Array = [
                        'id_hotel'                            => $idHotel,
                        'nombre_hotel_imagen'                 => $nombreImagenHotel,
                        'archivo_hotel_imagen'                => $file_path,
                        'status_hotel_imagen'                 => 1,
                        'usuario_modificacion_hotel_imagen'   => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_hotel_imagen' => $currentDateTime,
                    ];

                    // Si insertData falla, devolverá false
                    if ($this->generalModel->insertData($Array, $fromtable)) {
                        $success_count++;
                    } else {
                        return $this->response->setBody("Error: No se pudo insertar en la tabla '$fromtable'. Verifica los nombres de las columnas.");
                    }
                }
                
                return $this->response->setBody($success_count > 0 ? "Success" : "Error: No se procesaron inserciones.");
            }
            
            return $this->response->setBody("Error: La lista de archivos subidos quedó vacía.");
        } else {
            return $this->response->setBody("Error: Sesión no válida o expirada.");
        }
    }

    public function DestinoMBP()
    {
        if($this->session->get('loggedInNaturleon')){
            $request = $this->request;
            $msg = "Error";

            $nombrehotel = str_replace(' ', '', $request->getPost('nombrehotel'));
            $path = 'assets/hoteles/' . $nombrehotel . '/mbp/';
            $uploadPath = ROOTPATH . 'public/' . $path;

            
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, TRUE);
            }

            
            $file = $request->getFile('imagenDestinoMbp');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                
                if ($file->move($uploadPath, $fileName)) {
                    $Array = [
                        'imagen_mbp_destino' => $path . $fileName,
                    ];
                    
                    $fromtable = "destinos";
                    $arrWhere = ["id_destino"]; 
                    $arrCond = [$request->getPost('destinoMbp')];

                    
                    $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
                    
                    if ($result) {
                        $msg = "Success";
                    }
                } else {
                    $msg = "Error: " . $file->getErrorString();
                }
            } else {
                $msg = "Error: Archivo no válido o no subido.";
            }

            echo $msg;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function HotelMBP()
    {
        $request = $this->request;
        
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $dataHotel = $this->session->get('idupdate');
            $msg = "Error";

            $nombrehotel = str_replace(' ', '', $request->getPost('nombrehotel'));
            $path = 'assets/hoteles/' . $nombrehotel . '/mbp/';
            $uploadPath = ROOTPATH . 'public/' . $path;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, TRUE);
            }

            $file = $request->getFile('imagenHotelMbp');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();

                if ($file->move($uploadPath, $fileName)) {
                    $Array = [
                        'imagen_mbp_hotel' => $path . $fileName,
                    ];
                    
                    $fromtable = "hoteles";
                    $arrWhere = ["id_hotel"]; 
                    $arrCond = [$dataHotel['id']];

                    $result = $this->generalModel->Update($Array, $fromtable, $arrWhere, $arrCond);
                    
                    if ($result) {
                        $msg = "Success";
                    }
                } else {
                    $msg = "Error: " . $file->getErrorString();
                }
            } else {
                $msg = "Error: Archivo no válido o no subido.";
            }

            echo $msg;
        } else {
            return redirect()->to(base_url());
        }
    }

    public function FotosMBP()
    {
        $request = $this->request;

        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $dataHotel = $this->session->get('idupdate');
            $msg = "Error";

            $nombrehotel = str_replace(' ', '', $request->getPost('nombrehotel'));
            $path = 'assets/hoteles/' . $nombrehotel . '/mbp/';
            $uploadPath = ROOTPATH . 'public/' . $path;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, TRUE);
            }

            $uploaded_files = [];
            $files = $request->getFiles();

            if (isset($files['fotosMbp'])) {
                $imageFiles = $files['fotosMbp'];

                foreach ($imageFiles as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $fileName = $file->getRandomName();
                        if ($file->move($uploadPath, $fileName)) {
                            $uploaded_files[] = $path . $fileName;
                        } else {
                            echo $file->getErrorString();
                            return;
                        }
                    }
                }
            }

            if (!empty($uploaded_files)) {
                $currentDateTime = Time::now()->toDateTimeString();

                $datosUsuario = $this->session->get('loggedInNaturleon');

                foreach ($uploaded_files as $file_path) {
                    $Array = [
                        'id_hotel_mbp' => $dataHotel['id'],
                        'foto_mbp' => $file_path,
                        'status_foto_mbp' => 1,
                        'usuario_modificacion_foto_mbp' => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_foto_mbp' => $currentDateTime,
                    ];

                    $fromtable = "mbp_fotos";
                    $result = $this->generalModel->insertData($Array, $fromtable);

                    if ($result) {
                        $msg = "Success";
                    } else {
                        $msg = "Error";
                    }
                }
            }
            
            echo $msg;

        } else {
            return redirect()->to(base_url());
        }
    }

    public function VideosMBP()
    {
        $request = $this->request;
        
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $dataHotel = $this->session->get('idupdate');
            $msg = "Error";

            $nombrehotel = str_replace(' ', '', $request->getPost('nombrehotel'));
            $path = 'assets/hoteles/' . $nombrehotel . '/mbp/';
            $uploadPath = ROOTPATH . 'public/' . $path;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, TRUE);
            }

            $file = $request->getFile('videosMbp');

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();

                if ($file->move($uploadPath, $fileName)) {
                    $currentDateTime = Time::now()->toDateTimeString();

                    $datosUsuario = $this->session->get('loggedInNaturleon');

                    $Array = [
                        'id_hotel_mbp' => $dataHotel['id'],
                        'video_mbp' => $path . $fileName,
                        'status_video_mbp' => 1,
                        'usuario_modificacion_video_mbp' => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_video_mbp' => $currentDateTime,
                    ];
                    
                    $fromtable = "mbp_videos";
                    $result = $this->generalModel->insertData($Array, $fromtable);
                    
                    if ($result) {
                        $msg = "Success";
                    }
                } else {
                    $msg = "Error: " . $file->getErrorString();
                }
            } else {
                $msg = "Error: Archivo no válido o no subido.";
            }

            echo $msg;
        } else {
            return redirect()->to(base_url());
        }
    }

    public function CambiarStatusImagenesHabitaciones()
    {
        if($this->session->get('loggedInNaturleon')){
            $request = $this->request;

            $array = [
                'status_imagen_habitacion' => $request->getPost('status'),
            ];

            $fromtable = "hoteles_habitaciones_imagenes";
            $arrWhere = ["id_imagen_habitacion"]; 
            $arrCond = [$request->getPost('id')];
                
            $result = $this->generalModel->updateData($array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                echo "Success";
            } else {
                echo "Error";
            }
        }else{
            return redirect()->to(base_url());
        }
    }

    public function PaquetesMBP()
    {
        $request = $this->request;

        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $dataHotel = $this->session->get('idupdate');
            $msg = "Error";

            $nombrehotel = str_replace(' ', '', $request->getPost('nombrehotel'));
            $path = 'assets/hoteles/' . $nombrehotel . '/mbp/';
            $uploadPath = ROOTPATH . 'public/' . $path;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, TRUE);
            }

            $uploaded_files = [];
            $files = $request->getFiles();

            if (isset($files['paquetesMbp'])) {
                $imageFiles = $files['paquetesMbp'];

                foreach ($imageFiles as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $fileName = $file->getRandomName();
                        if ($file->move($uploadPath, $fileName)) {
                            $uploaded_files[] = $path . $fileName;
                        } else {
                            echo $file->getErrorString();
                            return;
                        }
                    }
                }
            }

            if (!empty($uploaded_files)) {
                $currentDateTime = Time::now()->toDateTimeString();

                $datosUsuario = $this->session->get('loggedInNaturleon');

                foreach ($uploaded_files as $file_path) {
                    $Array = [
                        'id_hotel_mbp' => $dataHotel['id'],
                        'nombre_paquete_mbp' => strtoupper($request->getPost('nombrePaquete')),
                        'imagen_paquete_mbp' => $file_path,
                        'status_paquete_mbp' => 1,
                        'usuario_modificacion_paquete_mbp' => $datosUsuario['id_usuario'],
                        'fechahora_modificacion_paquete_mbp' => $currentDateTime,
                    ];

                    $fromtable = "mbp_paquetes";
                    $result = $this->generalModel->insertData($Array, $fromtable);

                    if ($result) {
                        $msg = "Success";
                    } else {
                        $msg = "Error";
                    }
                }
            }
            
            echo $msg;

        } else {
            return redirect()->to(base_url());
        }
    }

    public function CambiarStatus()
    {
        $request = $this->request;
        
        if ($this->session->get('loggedInNaturleon')) {
            
            $id = $request->getPost('id');
            $status = $request->getPost('status');
            $idCol = $request->getPost('idcol');
            $statusCol = $request->getPost('statuscol');
            $bd = $request->getPost('bd');

            $mapeoBd = [
                'h' => 'hoteles', 'hhi' => 'hoteles_habitaciones_imagenes', 'hp' => 'hoteles_promociones',
                'hi' => 'hoteles_imagenes', 'mf' => 'mbp_fotos', 'mv' => 'mbp_videos', 'mp' => 'mbp_paquetes',
            ];
            $mapeoStatus = [
                'sh' => 'status_hotel', 'sih' => 'status_imagen_habitacion', 'sp' => 'status_promocion',
                'shi' => 'status_hotel_imagen', 'sfm' => 'status_foto_mbp', 'svm' => 'status_video_mbp', 'spm' => 'status_paquete_mbp',
            ];
            $mapeoId = [
                'ih' => 'id_hotel', 'iih' => 'id_imagen_habitacion', 'ip' => 'id_promocion',
                'ihi' => 'id_hotel_imagen', 'ifm' => 'id_foto_mbp', 'ivm' => 'id_video_mbp', 'ipm' => 'id_paquete_mbp',
            ];

            $columna_id = $mapeoId[$idCol] ?? "";
            $columna_status = $mapeoStatus[$statusCol] ?? "";
            $nombre_bd = $mapeoBd[$bd] ?? "";

            if (empty($columna_id) || empty($columna_status) || empty($nombre_bd)) {
                echo "Error: Parámetros de actualización no válidos.";
                return;
            }

            $array = [
                $columna_status => $status,
            ];

            $fromtable = $nombre_bd;
            $arrWhere = [$columna_id]; 
            $arrCond = [$id]; 
                
            $result = $this->generalModel->updateData($array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                echo "Success";
            } else {
                echo "Error";
            }

        } else {
            return redirect()->to(base_url());
        }
    }

    private function createDateRange($start_date, $end_date, $format = 'Y-m-d')
    {
        $dates = [];
        $start = new \DateTime($start_date);
        $end = new \DateTime($end_date);
        $end->modify('+1 day'); 

        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($start, $interval, $end);

        foreach($daterange as $date){
            $dates[] = $date->format($format);
        }

        return $dates;
    }
}