<?php

namespace App\Controllers;


use App\Models\GeneralModel;

class ExtNaturcharter extends BaseController
{
    
    protected $generalModel;

    
    protected $session;
    
    
    public function __construct()
    {
        
        $this->generalModel = new GeneralModel();

        
        $this->session = \Config\Services::session();

        $user = $this->session->get('loggedInNaturleon');
        if (!$user || $user['tipo_usuario'] !== 'admin') {
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

            $result["charters"] = $this->generalModel->selectData(
                "*", 
                "naturcharter", 
                [], [], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturcharter/agregar',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }
    
    public function Administrar(){
        $datosUsuario = $this->session->get('loggedInNaturleon');
        $sessionData = $this->session->get('idupdate');

        if($datosUsuario){
            
            $id_charter = $sessionData['id'];

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
            
            
            $result["charter"] = $this->generalModel->selectData(
                "*", "naturcharter", ["id_charter"], [$id_charter], [], []
            );
            
            $codigo_postal = $result['charter'][0]['cp_fiscal'] ?? null;
            
            $result["colonias"] = $this->generalModel->selectData(
                "*", "colonias", ["codigo_postal"], [$codigo_postal], [], []
            );
            
            $result["charters"] = $this->generalModel->selectData(
                "*", "naturcharter", [], [], [], []
            );

            // $result['destinosnacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Nacional"], [], []);

            // $result['destinosinternacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Internacional"], [], []);

            $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);

            $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);

            $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);

            $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);

            $result["cuentas"] = $this->generalModel->selectData(
                "*", "naturcharter_cuentas", ["id_charter"], [$id_charter], [], []
            );

            $result["salidas"] = $this->generalModel->selectData(
                "*", "naturcharter_salidas", ["estatus"], ["1"], [], []
            );
            
            $result["tarifas"] = $this->generalModel->selectData(
                "*", 
                "naturcharter_tarifas",
                ["id_charter", "fecha_tarifa >=", "fecha_tarifa <="], 
                [$id_charter, $fecha1, $fecha2], 
                [], 
                []
            );
            
            echo view('extranet/header',$user);
            echo view('extranet/naturcharter/administrar', $result);
            return view('extranet/footer');
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Abordaje(){
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["salidas"] = $this->generalModel->selectData(
                "*", "naturcharter_salidas", ["estatus"], ["1"], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturcharter/abordaje',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Reportes(){
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["salidas"] = $this->generalModel->selectData(
                "*", "naturcharter_salidas", ["estatus"], ["1"], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturcharter/reportes',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Pendientes(){
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["salidas"] = $this->generalModel->selectData(
                "*", "naturcharter_salidas", ["estatus"], ["1"], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturcharter/pendientes',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Agregar(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'nombre_charter'               => $data['nombrecharter'],
                'email_reservaciones'       => $data['emailreservacionescharter'],
                'email_tarifas'             => $data['emailtarifascharter'],
                'contacto_principal'           => $data['contactocharter'],
                'telefono_principal'        => $data['telefonoprincipalcharter'],
                'telefono_adicional'        => $data['telefonoadicionalcharter'],
                'razon_social_fiscal'       => $data['razonsocialfiscalcharter'],
                'rfc_fiscal'                => $data['rfcfiscalcharter'],
                'cp_fiscal'                 => $data['cp_fiscalcharter'],
                'calle_num_fiscal'          => $data['callenumfiscalcharter'],
                'colonia_fiscal'            => $data['colonia_fiscalcharter'],
                'municipio_fiscal'          => $data['municipio_fiscalcharter'],
                'estado_fiscal'             => $data['estado_fiscalcharter'],
                'pais_fiscal'               => $data['paisfiscalcharter'],
                'email_fiscal'              => $data['emailfiscalcharter'],
                'clave_forma_pago'          => $data['formaPagocharter'],
                'clave_metodo_pago'         => $data['metodoPagocharter'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalcharter'],
                'clave_uso_cfdi'            => $data['usoCFDIcharter'],
                'estatus'                   => 1,
                'usuario_alta'              => $datosUsuario['id_usuario'], 
                'fecha_alta'                => date("Y-m-d H:i:s"),
            ];

            $fromtable = "naturcharter";

            $id = $this->generalModel->insertDataReturn($Array, $fromtable);

            $msg = "Error"; 

            if ($id) {
                $msg = "Success";
            }
            
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function SaveID(){
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

    public function CambiarStatus(){
        $request = $this->request;
        
        if ($this->session->get('loggedInNaturleon')) {
            
            $id = $request->getPost('id');
            $status = $request->getPost('status');

            $array = [
                "estatus" => $status,
            ];

            $fromtable = "naturcharter";
            $arrWhere = ["id_charter"]; 
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

    public function DatosGenerales(){
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id = $sessionData['id'];
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            $Array = [
                'nombre_charter'            => $data['nombrecharter'],
                'email_reservaciones'       => $data['emailreservacionescharter'],
                'email_tarifas'             => $data['emailtarifascharter'],
                'contacto_principal'        => $data['contactocharter'],
                'telefono_principal'        => $data['telefonoprincipalcharter'],
                'telefono_adicional'        => $data['telefonoadicionalcharter'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "naturcharter", 
                ["id_charter"], 
                [$id]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
            
        } else {
            return redirect()->to(base_url());
        }
    }

    public function DatosFiscales(){
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id = $sessionData['id'];
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            $Array = [
                'razon_social_fiscal'       => $data['razonsocialfiscalcharter'],
                'rfc_fiscal'                => $data['rfcfiscalcharter'],
                'cp_fiscal'                 => $data['cp_fiscalcharter2'],
                'calle_num_fiscal'          => $data['callenumfiscalcharter'],
                'colonia_fiscal'            => $data['colonia_fiscalcharter2'],
                'municipio_fiscal'          => $data['municipio_fiscalcharter2'],
                'estado_fiscal'             => $data['estado_fiscalcharter2'],
                'pais_fiscal'               => $data['paisfiscalcharter'],
                'email_fiscal'              => $data['emailfiscalcharter'],
                'clave_forma_pago'          => $data['formaPagocharter'],
                'clave_metodo_pago'         => $data['metodoPagocharter'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalcharter'],
                'clave_uso_cfdi'            => $data['usoCFDIcharter'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "naturcharter", 
                ["id_charter"], 
                [$id]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
            
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Cuentas(){
        $sessionData = $this->session->get("idupdate");
        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $cuenta = $data['idCuentaCharter'];
            $msg = "Error";
            $fromtable = "naturcharter_cuentas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $commonParams = [
                'alias_cuenta'         => $data['aliasCuentaCharter'],
                'nombre_cuenta'        => $data['nombreCuentaCharter'],
                'institucion_cuenta'   => $data['institucionCuentaCharter'],
                'tipo_cuenta'          => $data['tipoCuentaCharter'],
                'numero_cuenta'        => $data['numCuentaCharter'],
                'clabe_cuenta'         => $data['clabeCuentaCharter'],
                'observaciones_cuenta' => $data['observacionesCuentaCharter'],
                'estatus_cuenta'       => $data['statusCuentaCharter']
            ];

            if ($cuenta == 0) {
                $insertData = [
                    'id_charter'      => $sessionData['id'],
                    'usuario_alta' => $datosUsuario['id_usuario'],
                    'fecha_alta'   => date("Y-m-d H:i:s")
                ];

                $insertArray = array_merge($commonParams, $insertData);
                $result = $this->generalModel->insertData($insertArray, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                $updateData = [
                    'usuario_mod' => $datosUsuario['id_usuario'],
                    'fecha_mod'   => date("Y-m-d H:i:s")
                ];

                $updateArray = array_merge($commonParams, $updateData);
                $arrWhere = ["id_cuenta"];
                $arrCond = [$cuenta];
                
                $result = $this->generalModel->updateData($updateArray, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function DataModificar(){
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

    public function Salidas(){
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

            $result['salidas'] = $this->generalModel->selectData(
                "nr.*, do.nombre_destino AS origen, df.nombre_destino AS destino",
                "naturcharter_salidas nr", 
                [], 
                [],
                ["destinos do","destinos df"],
                ["do.id_destino = nr.origen","df.id_destino = nr.destino"]
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturcharter/salidas',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function AdministrarSalidas(){
        $sessionData = $this->session->get("idupdate");
        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $salida = $data['idSalida'];
            $msg = "Error";
            $fromtable = "naturcharter_salidas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $commonParams = [
                'nombre'         => $data['nombreSalida'],
                'origen'   => $data['origenSalida'],
                'destino'          => $data['destinoSalida'],
                'estatus'       => $data['status']
            ];

            if ($salida == 0) {
                $insertData = [
                    'usuario_alta' => $datosUsuario['id_usuario'],
                    'fecha_alta'   => date("Y-m-d H:i:s")
                ];

                $insertArray = array_merge($commonParams, $insertData);
                $result = $this->generalModel->insertData($insertArray, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                $updateData = [
                    'usuario_mod' => $datosUsuario['id_usuario'],
                    'fecha_mod'   => date("Y-m-d H:i:s")
                ];

                $updateArray = array_merge($commonParams, $updateData);
                $arrWhere = ["id_salida"];
                $arrCond = [$salida];
                
                $result = $this->generalModel->updateData($updateArray, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Tarifas() {
        $sessionData = $this->session->get("idupdate");
        $datosUsuario = $this->session->get('loggedInNaturleon');

        if ($sessionData && $datosUsuario) {
            $data = $this->request->getPost();
            $fromtable = "naturcharter_tarifas";
            
            $charter = $sessionData['id'];
            $dias = json_decode($data['diasCheckeados'], true);
            $salida = $data['salidaTarifaCharter'];
            $fechainicio = $data['fechaInicioTarifaCharter'];
            $fechafin = $data['fechaFinTarifaCharter'];
            
            $currentDateTime = date("Y-m-d H:i:s");
            $success_count = 0;

            // 1. Campos de configuración que SIEMPRE se actualizan (permiten valor 0)
            $camposConfig = [
                'menor_desde'  => $data['menorDesdeCharter'],
                'adulto_desde' => $data['adultoDesdeCharter']
            ];

            // 2. Mapeo de campos de TARIFAS (solo se actualizan si > 0)
            $camposTarifas = [
                'asiento_adulto_neta'          => $data['tarifa_asiento_adulto_neta'],
                'asiento_adulto_markup'        => $data['tarifa_asiento_adulto_markup'],
                'asiento_adulto_publica'       => $data['tarifa_asiento_adulto_publica'],
                'asiento_menor_neta'           => $data['tarifa_asiento_menor_neta'],
                'asiento_menor_markup'         => $data['tarifa_asiento_menor_markup'],
                'asiento_menor_publica'        => $data['tarifa_asiento_menor_publica'],
                'natur_adulto_neta'            => $data['tarifa_natur_adulto_neta'],
                'natur_adulto_markup'          => $data['tarifa_natur_adulto_markup'],
                'natur_adulto_publica'         => $data['tarifa_natur_adulto_publica'],
                'natur_menor_neta'             => $data['tarifa_natur_menor_neta'],
                'natur_menor_markup'           => $data['tarifa_natur_menor_markup'],
                'natur_menor_publica'          => $data['tarifa_natur_menor_publica'],
                'premier_adulto_neta'          => $data['tarifa_premier_adulto_neta'],
                'premier_adulto_markup'        => $data['tarifa_premier_adulto_markup'],
                'premier_adulto_publica'       => $data['tarifa_premier_adulto_publica'],
                'premier_menor_neta'           => $data['tarifa_premier_menor_neta'],
                'premier_menor_markup'         => $data['tarifa_premier_menor_markup'],
                'premier_menor_publica'        => $data['tarifa_premier_menor_publica'],
                'natur_premier_adulto_neta'    => $data['tarifa_natur_premier_adulto_neta'],
                'natur_premier_adulto_markup'  => $data['tarifa_natur_premier_adulto_markup'],
                'natur_premier_adulto_publica' => $data['tarifa_natur_premier_adulto_publica'],
                'natur_premier_menor_neta'     => $data['tarifa_natur_premier_menor_neta'],
                'natur_premier_menor_markup'   => $data['tarifa_natur_premier_menor_markup'],
                'natur_premier_menor_publica'  => $data['tarifa_natur_premier_menor_publica'],
            ];

            // Filtrar tarifas: eliminar las que vienen vacías o en 0
            $tarifasFiltradas = array_filter($camposTarifas, function($valor) {
                return ($valor !== "0" && $valor !== 0 && $valor !== "" && $valor !== null);
            });

            $fechas = $this->createDateRange($fechainicio, $fechafin);

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    $arrWhere = ["fecha_tarifa", "id_charter", "id_salida"];
                    $arrCond = [$fecha, $charter, $salida];

                    $tarifaExistente = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    if ($tarifaExistente) {
                        // UPDATE: Combinamos configuración (siempre) + tarifas filtradas (solo si > 0)
                        $Array_update = array_merge($camposConfig, $tarifasFiltradas, [
                            'usuario_mod' => $datosUsuario['id_usuario'],
                            'fecha_mod'   => $currentDateTime
                        ]);
                        
                        $result = $this->generalModel->updateData($Array_update, $fromtable, $arrWhere, $arrCond);
                    } else {
                        // INSERT: Aquí sí usamos todo (camposConfig + camposTarifas completos)
                        $Array_insert = array_merge($camposConfig, $camposTarifas, [
                            'id_charter'   => $charter,
                            'id_salida'    => $salida,
                            'fecha_tarifa' => $fecha,
                            'usuario_alta' => $datosUsuario['id_usuario'],
                            'fecha_alta'   => $currentDateTime,
                            'estatus'      => 1
                        ]);
                        
                        $result = $this->generalModel->insertData($Array_insert, $fromtable);
                    }

                    if ($result) {
                        $success_count++;
                    }
                }
            }

            return $this->response->setBody($success_count > 0 ? "Success" : "Error");

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