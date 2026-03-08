<?php

namespace App\Controllers;


use App\Models\GeneralModel;
use CodeIgniter\Files\File;

class Dashboard extends BaseController
{
    
    protected $generalModel;

    
    protected $session;
    
    
    public function __construct()
    {
        $this->generalModel = new GeneralModel();
        $this->session = \Config\Services::session();

        $user = $this->session->get('loggedInNaturleon');
        if (!$user || ($user['tipo_usuario'] !== 'admin' && $user['tipo_usuario'] !== 'hotel')) {
            $this->session->remove('loggedInNaturleon');
            $this->session->remove('idupdate');
            header('Location: ' . base_url());
            exit(); 
        }
    }

    

    public function LogOut()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }

    public function index()
    {
        if($this->session->get("loggedInNaturleon")){
            $datosUsuario = $this->session->get('loggedInNaturleon');
            $añoActual = date("Y");
            $mesActual = date("m");
            $rol = $datosUsuario['tipo_usuario'];

            $condiciones = [];
            $valorCondiciones = [];

            if($rol == 'hotel'){
                $condiciones[] = "reservaciones.hotel_reservacion"; 
                $valorCondiciones[] = $datosUsuario['entidad_usuario'];
            }

            $columnas = "reservaciones.*, 
                        agencias.nombre_agencia, 
                        hoteles.nombre_hotel, 
                        hoteles_habitaciones.nombre_habitacion, 
                        hoteles_tipos_planes.nombre_tipo_plan";
            
            $joins = ["agencias", "hoteles", "hoteles_habitaciones", "hoteles_tipos_planes"];
            $condsJoin = [
                "agencias.id_agencia = reservaciones.id_agencia_reservacion",
                "hoteles.id_hotel = reservaciones.hotel_reservacion",
                "hoteles_habitaciones.id_habitacion = reservaciones.habitacion_reservacion",
                "hoteles_tipos_planes.id_tipo_plan = reservaciones.plan_reservacion"
            ];

            $reservasData = $this->generalModel->selectData($columnas, "reservaciones", $condiciones, $valorCondiciones, $joins, $condsJoin);

            $stats = ['ingresos' => 0, 'noches' => 0, 'confirmadas' => 0, 'canceladas' => 0, 'total' => 0];
            $ingresosMensuales = array_fill(0, 12, 0);
            $ingresosPorAgencia = [];
            $listaReservas = [];

            if($reservasData){
                foreach($reservasData as $r){
                    $fechaReserva = strtotime($r['fecha_creacion_reservacion']);
                    $mesReserva = date("m", $fechaReserva);
                    $añoReserva = date("Y", $fechaReserva);
                    
                    if($añoReserva == $añoActual && $r['estado_reservacion'] == 1){
                        $mIndex = (int)$mesReserva - 1;
                        $ingresosMensuales[$mIndex] += (float)$r['total_reservacion'];

                        $agencia = !empty($r['nombre_agencia']) ? $r['nombre_agencia'] : 'Directo';
                        $ingresosPorAgencia[$agencia] = ($ingresosPorAgencia[$agencia] ?? 0) + (float)$r['total_reservacion'];

                        if($mesReserva == $mesActual){
                            $stats['ingresos'] += (float)$r['total_reservacion'];
                            $stats['confirmadas']++;
                            
                            $checkin = new \DateTime($r['llegada_reservacion']);
                            $checkout = new \DateTime($r['salida_reservacion']);
                            $noches = $checkin->diff($checkout)->days;
                            $stats['noches'] += ($noches > 0) ? $noches : 1;
                        }
                    }
                    if($mesReserva == $mesActual){
                        $stats['total']++;
                        if($r['estado_reservacion'] == 0) {
                            $stats['canceladas']++;
                        }
                        $listaReservas[] = $r;
                    }
                }
            }

            $tarifaPromedio = ($stats['noches'] > 0) ? ($stats['ingresos'] / $stats['noches']) : 0;
            $porcentajeCancelacion = ($stats['total'] > 0) ? ($stats['canceladas'] / $stats['total']) * 100 : 0;

            arsort($ingresosPorAgencia);
            $chartPieLabels = array_slice(array_keys($ingresosPorAgencia), 0, 5);
            $chartPieData   = array_slice(array_values($ingresosPorAgencia), 0, 5);

            $data = [
                'usuario' => $datosUsuario,
                'reservas' => $listaReservas,
                'stats' => [
                    'ingresos' => $stats['ingresos'],
                    'tarifa_promedio' => $tarifaPromedio,
                    'total_reservas' => $stats['confirmadas'],
                    'porcentaje_cancelacion' => number_format($porcentajeCancelacion, 2)
                ],
                'chartBarLabels' => ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                'chartBarData'   => $ingresosMensuales,
                'chartPieLabels' => $chartPieLabels,
                'chartPieData'   => $chartPieData
            ];

            return view('extranet/header', $data) . view('extranet/body', $data) . view('extranet/footer');
        }
    }
}