<?php

namespace App\Controllers;

use App\Models\SpecificModel;
use App\Models\GeneralModel;
use DateTime;

class Booking extends BaseController
{
    
    protected $specificModel;

    protected $generalModel;

    protected $session;

    public function __construct()
    {
        $this->bookingModel = new SpecificModel();
        $this->generalModel = new GeneralModel();
        $this->session = \Config\Services::session();

        $user = $this->session->get('loggedInNaturleon');
        if (!$user || ($user['tipo_usuario'] !== 'admin' && $user['tipo_usuario'] !== 'agencia')) {
            $this->session->remove('loggedInNaturleon');
            $this->session->remove('idupdate');
            header('Location: ' . base_url());
            exit(); 
        }
    }

    public function index(){
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $output = view('bookingcenter/header',$user);
            $output .= view('bookingcenter/body');
            $output .= view('bookingcenter/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function getDestinos(){
        $term = $this->request->getVar('term');
        $data = $this->bookingModel->getDestinosAutocomplete($term);
        return $this->response->setJSON($data);
    }

    public function Search() {
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }

        $arrWhere = ["id_destino"];
        $arrCond = [$this->request->getGet('destino')];
        $arrJoin = [];
        $arrCondJoin = [];

        $dataDestino = $this->generalModel->selectData(
            "id_destino,nombre_destino", 
            "destinos", 
            $arrWhere, 
            $arrCond, 
            $arrJoin, 
            $arrCondJoin
        );

        $planes = $this->generalModel->selectData(
            "id_tipo_plan,nombre_tipo_plan", 
            "hoteles_tipos_planes", 
            [],
            [], 
            [], 
            []
        );

        $datosUsuario = $this->session->get('loggedInNaturleon');
        
        $searchData = [
            'destino'      => $this->request->getGet('destino'),
            'checkin'      => $this->request->getGet('checkin'),
            'checkout'     => $this->request->getGet('checkout'),
            'habitaciones' => $this->request->getGet('habitaciones'),
            'adultos'      => $this->request->getGet('adultos'),
            'menores'      => $this->request->getGet('menores'),
            'edades'       => $this->request->getGet('edades'),
            'planes'       => $this->request->getGet('planes'),
            'precios'      => $this->request->getGet('precios')
        ];

        $hotelesDisponibles = $this->bookingModel->getDisponibilidad($searchData);

        $data = [
            'dataDestino' => $dataDestino,
            'planes' => $planes,
            'usuario' => $datosUsuario,
            'hoteles' => $hotelesDisponibles,
            'params'  => $searchData
        ];

        $output = view('bookingcenter/header', $data);
        $output .= view('bookingcenter/busqueda', $data);
        $output .= view('bookingcenter/footer');

        return $output;
    }

    public function Checkout() {
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }

        $datosUsuario = $this->session->get('loggedInNaturleon');

        $searchData = [
            'id_hotel'     => $this->request->getGet('id_hotel'),
            'id_habitacion'=> $this->request->getGet('id_hab'),
            'id_plan'      => $this->request->getGet('id_plan'),
            'destino'      => $this->request->getGet('destino'),
            'checkin'      => $this->request->getGet('checkin'),
            'checkout'     => $this->request->getGet('checkout'),
            'habitaciones' => $this->request->getGet('habitaciones'),
            'adultos'      => $this->request->getGet('adultos'),
            'menores'      => $this->request->getGet('menores'),
            'edades'       => $this->request->getGet('edades')
        ];

        $resumen = $this->bookingModel->getResumenSeleccion($searchData);

        if (!$resumen) {
            return redirect()->back()->with('error', 'La habitación ya no está disponible.');
        }

        $data = [
            'usuario' => $datosUsuario,
            'resumen' => $resumen,
            'params'  => $searchData
        ];

        $output = view('bookingcenter/header', $data);
        $output .= view('bookingcenter/checkout', $data); // Pasamos $data a la vista
        $output .= view('bookingcenter/footer');

        return $output;
    }

    public function Confirmar(){
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }

        $searchData = [
            'id_hotel'     => $this->request->getPost('id_hotel'),
            'id_habitacion'=> $this->request->getPost('id_hab'),
            'id_plan'      => $this->request->getPost('id_plan'),
            'destino'      => $this->request->getPost('destino'),
            'checkin'      => $this->request->getPost('checkin'),
            'checkout'     => $this->request->getPost('checkout'),
            'habitaciones' => $this->request->getPost('habitaciones'),
            'adultos'      => $this->request->getPost('adultos'),
            'menores'      => $this->request->getPost('menores'),
            'edades'       => $this->request->getPost('edades')
        ];

        $resumen = $this->bookingModel->getResumenSeleccion($searchData);

        if (!$resumen) {
            return redirect()->to(base_url())->with('error', 'Error al validar los montos finales.');
        }

        $dataReservacion = [
            'id_usuario_reservacion'     => $this->request->getPost('id_usuario'),
            'id_agencia_reservacion'     => $this->request->getPost('id_agencia'),
            'folio_reservacion'          => 'RESERV' . strtoupper(substr(uniqid(), 7)),
            'hotel_reservacion'          => $searchData['id_hotel'],
            'habitacion_reservacion'     => $searchData['id_habitacion'],
            'plan_reservacion'           => $searchData['id_plan'],
            'llegada_reservacion'        => $searchData['checkin'],
            'salida_reservacion'         => $searchData['checkout'],
            'numero_habitaciones_reservacion' => $searchData['habitaciones'],
            'adultos_reservacion'        => $searchData['adultos'],
            'menores_reservacion'        => $searchData['menores'],
            'edades_reservacion'         => $searchData['edades'],
            'nombre_cliente_reservacion' => $this->request->getPost('nombre_cliente'),
            'apellidos_cliente_reservacion' => $this->request->getPost('apellido_cliente'),
            'email_cliente_reservacion'  => $this->request->getPost('email_cliente'),
            'telefono_cliente_reservacion' => $this->request->getPost('telefono_cliente'),
            'cp_cliente_reservacion'     => $this->request->getPost('codigopostal_cliente'),
            'subtotal_reservacion'       => $resumen['seleccion']['subtotal'],
            'iva_reservacion'            => $resumen['seleccion']['iva'],
            'ish_reservacion'            => $resumen['seleccion']['ish'],
            'total_reservacion'          => $resumen['seleccion']['tarifa_total'],
            'estado_reservacion'         => 1,
            'fecha_creacion_reservacion' => date('Y-m-d H:i:s')
        ];

        $resultado = $this->bookingModel->guardarReservacion($dataReservacion);

        if ($resultado['status']) {
            $this->enviarCorreoConfirmacion($dataReservacion['folio_reservacion']);
            return redirect()->to(base_url('Booking/Confirmacion/' . $dataReservacion['folio_reservacion']));
        } else {
            // Si no hay inventario, mandamos al usuario atrás con un mensaje
            return redirect()->back()->withInput()->with('error', $resultado['message']);
        }

    }

    public function Confirmacion($folio){
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }
        
        $db = \Config\Database::connect();
        $reservacion = $db->table('reservaciones r')
            ->select('r.*, h.nombre_hotel, h.ubicacion_hotel, hab.nombre_habitacion, p.nombre_tipo_plan')
            ->join('hoteles h', 'h.id_hotel = r.hotel_reservacion')
            ->join('hoteles_habitaciones hab', 'hab.id_habitacion = r.habitacion_reservacion')
            ->join('hoteles_tipos_planes p', 'p.id_tipo_plan = r.plan_reservacion')
            ->where('r.folio_reservacion', $folio)
            ->get()->getRowArray();

        if (!$reservacion) {
            return redirect()->to(base_url())->with('error', 'Reservación no encontrada.');
        }

        // Corregido: Uso de \DateTime y variable $reservacion consistente
        $llegada = new \DateTime($reservacion['llegada_reservacion']);
        $salida  = new \DateTime($reservacion['salida_reservacion']);
        $reservacion['noches'] = $llegada->diff($salida)->days;

        $data = [
            'res'     => $reservacion,
            'usuario' => $this->session->get('loggedInNaturleon')
        ];

        $output = view('bookingcenter/header', $data);
        $output .= view('bookingcenter/confirmacion', $data);
        $output .= view('bookingcenter/footer');

        return $output;
    }

    private function enviarCorreoConfirmacion($folio) {
        $email = \Config\Services::email();

        $db = \Config\Database::connect();
        $res = $db->table('reservaciones r')
            ->select('r.*, h.nombre_hotel, h.ubicacion_hotel, hab.nombre_habitacion, p.nombre_tipo_plan')
            ->join('hoteles h', 'h.id_hotel = r.hotel_reservacion')
            ->join('hoteles_habitaciones hab', 'hab.id_habitacion = r.habitacion_reservacion')
            ->join('hoteles_tipos_planes p', 'p.id_tipo_plan = r.plan_reservacion')
            ->where('folio_reservacion', $folio)
            ->get()->getRowArray();

        if (!$res) return false;

        // Calculamos noches para que aparezcan en el correo
        $llegada = new \DateTime($res['llegada_reservacion']);
        $salida  = new \DateTime($res['salida_reservacion']);
        $res['noches'] = $llegada->diff($salida)->days;

        $email->setTo($res['email_cliente_reservacion']);
        $email->setFrom('naturleon@neotecprojects.com', 'Naturleón Notificaciones');
        $email->setSubject('Confirmación de Reservación - Folio: ' . $folio);
        
        $cuerpo = view('emails/confirmacion_reserva', ['res' => $res]);

        $email->setMessage($cuerpo);
        return $email->send();
    }

    public function Reservaciones() {
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }

        $datosUsuario = $this->session->get('loggedInNaturleon');
        $id_agencia = $datosUsuario['entidad_usuario']; // Extraemos el ID de la agencia

        $agencia = $this->generalModel->selectData(
            "nombre_agencia", 
            "agencias", 
            ["id_agencia"],
            [$id_agencia], 
            [], 
            []
        );

        $db = \Config\Database::connect();
        
        // Consultamos las reservaciones con joins para traer nombres de hotel y planes
        $reservaciones = $db->table('reservaciones r')
            ->select('r.*, h.nombre_hotel, hab.nombre_habitacion, p.nombre_tipo_plan, d.nombre_destino')
            ->join('hoteles h', 'h.id_hotel = r.hotel_reservacion')
            ->join('hoteles_habitaciones hab', 'hab.id_habitacion = r.habitacion_reservacion')
            ->join('hoteles_tipos_planes p', 'p.id_tipo_plan = r.plan_reservacion')
            ->join('destinos d', 'd.id_destino = h.destino_hotel')
            ->where('r.id_agencia_reservacion', $id_agencia)
            ->orderBy('r.fecha_creacion_reservacion', 'DESC')
            ->get()->getResultArray();

        $data = [
            'usuario'       => $datosUsuario,
            'reservaciones' => $reservaciones,
            'total'         => count($reservaciones),
            'agencia'       => $agencia[0]['nombre_agencia']
        ];

        $output = view('bookingcenter/header', $data);
        $output .= view('bookingcenter/reservaciones', $data);
        $output .= view('bookingcenter/footer');

        return $output;
    }

    public function Agencia() {
        if (!$this->session->get("loggedInNaturleon")) {
            return redirect()->to(base_url());
        }

        $datosUsuario = $this->session->get('loggedInNaturleon');

        $idAgencia = $datosUsuario['entidad_usuario']; 

        $result = [];
        $result['usuario'] = $datosUsuario;

        $result['plazas'] = $this->generalModel->selectData("*", "cms_plazas", [], [], [], []);
        $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);
        $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);
        $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);
        $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);

        $agenciaData = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$idAgencia], [], []);
        $result['agencia'] = !empty($agenciaData) ? $agenciaData[0] : null;

        if ($result['agencia']) {
            $columnas = ["id_entidad", "tipo_acceso IN ('agencia', 'admin')"];
            $valores  = [$idAgencia, null];

            $result['usuarios'] = $this->generalModel->selectData(
                "*", 
                "usuarios", 
                $columnas, 
                $valores, 
                [], 
                []
            );
            $result['cuentas'] = $this->generalModel->selectData("*", "agencias_cuentas", ["id_agencia"], [$idAgencia], [], []);
            $result['fiscales'] = $this->generalModel->selectData("*", "agencias_datos_fiscales", ["id_agencia"], [$idAgencia], [], []);
            $result['documentos'] = $this->generalModel->selectData("*", "agencias_documentos", ["id_agencia"], [$idAgencia], [], []);
            $result['configuracion'] = $this->generalModel->selectData("*", "agencias_configuracion", ["id_agencia"], [$idAgencia], [], []);

            $cpAgencia = $result['agencia']['codigopostal_agencia'];
            $result["colonias"] = [];
            if ($cpAgencia) {
                $result["colonias"] = $this->generalModel->selectData("*", "colonias", ["codigo_postal"], [$cpAgencia], [], []);
            }
        }

        $output = view('bookingcenter/header', $result);
        $output .= view('bookingcenter/agencia', $result);
        $output .= view('bookingcenter/footer');

        return $output;
    }
}