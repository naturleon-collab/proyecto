<?php

namespace App\Controllers;


use App\Models\GeneralModel;

class ExtNaturflight extends BaseController
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

            $result['flights'] = $this->generalModel->selectData(
                "*", 
                "naturflight", 
                [], 
                [],
                [], 
                []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturflight/agregar',$result);
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
                'nombre_comercial'               => $data['nombreNaturFlight'],
                'email_reservaciones'       => $data['emailreservacionesNaturFlight'],
                'email_tarifas'             => $data['emailtarifasNaturFlight'],
                'nombre_contacto'           => $data['contactoNaturFlight'],
                'telefono_principal'        => $data['telefonoprincipalNaturFlight'],
                'telefono_adicional'        => $data['telefonoadicionalNaturFlight'],
                'razon_social'       => $data['razonsocialfiscalNaturFlight'],
                'rfc'                => $data['rfcfiscalNaturFlight'],
                'codigo_postal'                 => $data['cp_fiscalNaturFlight'],
                'calle_numero'          => $data['callenumfiscalNaturFlight'],
                'colonia'            => $data['colonia_fiscalNaturFlight'],
                'municipio'          => $data['municipio_fiscalNaturFlight'],
                'estado_fiscal'             => $data['estado_fiscalNaturFlight'],
                'pais_fiscal'               => $data['paisfiscalNaturFlight'],
                'email_fiscal'              => $data['emailfiscalNaturFlight'],
                'clave_forma_pago'          => $data['formaPagoNaturFlight'],
                'clave_metodo_pago'         => $data['metodoPagoNaturFlight'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalNaturFlight'],
                'clave_uso_cfdi'            => $data['usoCFDINaturFlight'],
                'estatus_naturflight'           => 1,
                'usuario_alta'              => $datosUsuario['id_usuario'], 
                'fecha_alta'                => date("Y-m-d H:i:s"),
            ];

            $fromtable = "naturflight";

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

    function SaveID(){
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

    function Administrar(){
        $datosUsuario = $this->session->get('loggedInNaturleon');
        $sessionData = $this->session->get('idupdate');

        if($datosUsuario){
            
            $id_naturflight = $sessionData['id'];

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
            
            
            $result["flight"] = $this->generalModel->selectData(
                "*", "naturflight", ["id_naturflight"], [$id_naturflight], [], []
            );
            
            $codigo_postal = $result['flight'][0]['codigo_postal'] ?? null;
            
            $result["colonias"] = $this->generalModel->selectData(
                "*", "colonias", ["codigo_postal"], [$codigo_postal], [], []
            );
            
            $result["flights"] = $this->generalModel->selectData(
                "*", "naturflight", [], [], [], []
            );

            $result['destinosnacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Nacional"], [], []);

            $result['destinosinternacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Internacional"], [], []);

            $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);

            $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);

            $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);

            $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);

            $result["cuentas"] = $this->generalModel->selectData(
                "*", "naturflight_cuentas", ["id_naturflight"], [$id_naturflight], [], []
            );
            
            $result["tarifas"] = $this->generalModel->selectData(
                "*", 
                "naturflight_tarifas", 
                ["id_naturflight", "fecha_tarifa >=", "fecha_tarifa <="], 
                [$id_naturflight, $fecha1, $fecha2], 
                [], 
                []
            );

            $result['rutas'] = $this->generalModel->selectData(
                "id_ruta, nombre_ruta",
                "naturflight_rutas", 
                ["estatus"], 
                ["1"],
                [],
                []
            );
            
            echo view('extranet/header',$user);
            echo view('extranet/naturflight/administrar', $result);
            return view('extranet/footer');
        } else {
            return redirect()->to(base_url());
        }
    }

    function CambiarStatus(){
        $request = $this->request;
        
        if ($this->session->get('loggedInNaturleon')) {
            
            $id = $request->getPost('id');
            $status = $request->getPost('status');

            $array = [
                "estatus_naturflight" => $status,
            ];

            $fromtable = "naturflight";
            $arrWhere = ["id_naturflight"]; 
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
    
    function DatosGenerales(){
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id = $sessionData['id'];
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            $Array = [
                'nombre_comercial'               => $data['nombreNaturFlight'],
                'email_reservaciones'       => $data['emailreservacionesNaturFlight'],
                'email_tarifas'             => $data['emailtarifasNaturFlight'],
                'nombre_contacto'           => $data['contactoNaturFlight'],
                'telefono_principal'        => $data['telefonoprincipalNaturFlight'],
                'telefono_adicional'        => $data['telefonoadicionalNaturFlight'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "naturflight", 
                ["id_naturflight"], 
                [$id]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
            
        } else {
            return redirect()->to(base_url());
        }
    }

    function DatosFiscales(){
        $sessionData = $this->session->get('idupdate');

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $id = $sessionData['id'];
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            $Array = [
                'razon_social'       => $data['razonsocialfiscalNaturFlight'],
                'rfc'                => $data['rfcfiscalNaturFlight'],
                'codigo_postal'                 => $data['cp_fiscalNaturFlight2'],
                'calle_numero'          => $data['callenumfiscalNaturFlight'],
                'colonia'            => $data['colonia_fiscalNaturFlight2'],
                'municipio'          => $data['municipio_fiscalNaturFlight2'],
                'estado_fiscal'             => $data['estado_fiscalNaturFlight2'],
                'pais_fiscal'               => $data['paisfiscalNaturFlight'],
                'email_fiscal'              => $data['emailfiscalNaturFlight'],
                'clave_forma_pago'          => $data['formaPagoNaturFlight'],
                'clave_metodo_pago'         => $data['metodoPagoNaturFlight'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalNaturFlight'],
                'clave_uso_cfdi'            => $data['usoCFDINaturFlight'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "naturflight", 
                ["id_naturflight"], 
                [$id]
            );

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
            
        } else {
            return redirect()->to(base_url());
        }
    }

    function Cuentas(){
        $sessionData = $this->session->get("idupdate");
        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $cuenta = $data['idCuentaNaturFlight'];
            $msg = "Error";
            $fromtable = "naturflight_cuentas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $commonParams = [
                'alias_cuenta'         => $data['aliasCuentaNaturFlight'],
                'nombre_cuenta'        => $data['nombreCuentaNaturFlight'],
                'institucion_cuenta'   => $data['institucionCuentaNaturFlight'],
                'tipo_cuenta'          => $data['tipoCuentaNaturFlight'],
                'numero_cuenta'        => $data['numCuentaNaturFlight'],
                'clabe_cuenta'         => $data['clabeCuentaNaturFlight'],
                'observaciones_cuenta' => $data['observacionesCuentaNaturFlight'],
                'estatus_cuenta'       => $data['statusCuentaNaturFlight']
            ];

            if ($cuenta == 0) {
                $insertData = [
                    'id_naturflight'      => $sessionData['id'],
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

    function DataModificar(){
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

    function Rutas(){
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

            $result['aerolineas'] = $this->generalModel->selectData(
                "*", 
                "aerolineas", 
                [], 
                [], 
                [], 
                []
            );

            $result['rutas'] = $this->generalModel->selectData(
                "nr.*, a.nombre_aerolinea, do.nombre_destino AS origen, df.nombre_destino AS destino",
                "naturflight_rutas nr", 
                [], 
                [],
                ["aerolineas a","destinos do","destinos df"],
                ["a.id_aerolinea = nr.id_aerolinea","do.id_destino = nr.id_destino_origen","df.id_destino = nr.id_destino_final"]
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/naturflight/rutas',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    function AdministrarRutas(){
        if ($this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $ruta = $data['idRuta'];
            $msg = "Error";
            $fromtable = "naturflight_rutas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $commonParams = [
                'nombre_ruta'         => $data['nombreRuta'],
                'id_aerolinea'        => $data['aerolineaRuta'],
                'id_destino_origen'   => $data['origenRuta'],
                'id_destino_final'          => $data['destinoRuta'],
                'frecuencia_lunes'        => $data['lunes'],
                'frecuencia_martes'         => $data['martes'],
                'frecuencia_miercoles' => $data['miercoles'],
                'frecuencia_jueves' => $data['jueves'],
                'frecuencia_viernes' => $data['viernes'],
                'frecuencia_sabado' => $data['sabado'],
                'frecuencia_domingo' => $data['domingo'],
                'estatus'       => $data['status']
            ];

            if ($ruta == 0) {
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
                $arrWhere = ["id_ruta"];
                $arrCond = [$ruta];
                
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

    function Tarifas(){
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $msg = "Error";
            $fromtable = "naturflight_tarifas";

            $naturflight = $sessionData['id'];
            $dias = json_decode($data['diasCheckeados'], true);
            $ruta = $data['rutaTarifaNaturFlight'];
            $fechainicio = $data['fechaInicioTarifaNaturFlight'];
            $fechafin = $data['fechaFinTarifaNaturFlight'];
            $adulto_neta = $data['tarifaAdulto_netaNaturFlight'];
            $adulto_markup = $data['tarifaAdulto_markupNaturFlight'];
            $adulto_publica = $data['tarifaAdulto_publicaNaturFlight'];
            $menor_neta = $data['tarifaMenor_netaNaturFlight'];
            $menor_markup = $data['tarifaMenor_markupNaturFlight'];
            $menor_publica = $data['tarifaMenor_publicaNaturFlight'];
            $currentDateTime = date("Y-m-d H:i:s");

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    
                    $arrWhere = ["fecha_tarifa", "id_naturflight",'id_ruta'];
                    $arrCond = [$fecha, $naturflight, $ruta];

                    
                    $tarifa = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    $Array_common = [
                        'adulto_neta'                   => $adulto_neta,
                        'adulto_markup'                 => $adulto_markup,
                        'adulto_publica'                => $adulto_publica,
                        'menor_neta'                    => $menor_neta,
                        'menor_markup'                  => $menor_markup,
                        'menor_publica'                 => $menor_publica,
                        'usuario_mod'                   => $datosUsuario['id_usuario'],
                        'fecha_mod'                     => $currentDateTime,
                    ];

                    if ($tarifa) {
                        $result = $this->generalModel->updateData($Array_common, $fromtable, $arrWhere, $arrCond);
                    } else {
                        $Array_insert = array_merge($Array_common, [
                            'id_naturflight'        => $naturflight,
                            'id_ruta'               => $ruta,
                            'fecha_tarifa'          => $fecha,
                            'usuario_alta'          => $datosUsuario['id_usuario'],
                            'fecha_alta'            => $currentDateTime,
                            'estatus'               => 1,
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