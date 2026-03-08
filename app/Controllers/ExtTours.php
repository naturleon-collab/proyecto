<?php

namespace App\Controllers;


use App\Models\GeneralModel;
use CodeIgniter\I18n\Time; 
use CodeIgniter\Files\File; 

class ExtTours extends BaseController
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
    
    function index()
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

            $result['tours'] = $this->generalModel->selectData(
                "*", 
                "tours t", 
                [], 
                [],
                ["destinos d"], 
                ["d.id_destino = t.destino_tour"]
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/tours/agregar',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    function AgregarTour(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'nombre_tour'               => $data['nombreTour'],
                'destino_tour'              => $data['destinoTour'],
                'email_reservaciones'       => $data['emailreservacionesTour'],
                'email_tarifas'             => $data['emailtarifasTour'],
                'nombre_contacto'           => $data['contactoTour'],
                'telefono_principal'        => $data['telefonoprincipalTour'],
                'telefono_adicional'        => $data['telefonoadicionalTour'],
                'ubicacion_texto'           => $data['ubicacionTour'],
                'descripcion_tour'          => $data['descripcionTour'],
                'razon_social_fiscal'       => $data['razonsocialfiscalTour'],
                'rfc_fiscal'                => $data['rfcfiscalTour'],
                'cp_fiscal'                 => $data['cp_fiscalTour'],
                'calle_num_fiscal'          => $data['callenumfiscalTour'],
                'colonia_fiscal'            => $data['colonia_fiscalTour'],
                'municipio_fiscal'          => $data['municipio_fiscalTour'],
                'estado_fiscal'             => $data['estado_fiscalTour'],
                'pais_fiscal'               => $data['paisfiscalTour'],
                'email_fiscal'              => $data['emailfiscalTour'],
                'clave_forma_pago'          => $data['formaPagoTour'],
                'clave_metodo_pago'         => $data['metodoPagoTour'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalTour'],
                'clave_uso_cfdi'            => $data['usoCFDITour'],
                'estado_registro'           => 1,
                'usuario_alta'              => $datosUsuario['id_usuario'], 
                'fecha_alta'                => date("Y-m-d H:i:s"),
            ];

            $fromtable = "tours";

            $idtour = $this->generalModel->insertDataReturn($Array, $fromtable);

            $msg = "Error"; 

            if ($idtour) {
                $nombreHotelLimpio = str_replace(' ', '', $data['nombreTour']);
                $path = "assets/tours/{$nombreHotelLimpio}/";

                if (!is_dir($path)) {
                    mkdir($path, 0775, TRUE);
                }

                $logo = $this->request->getFile('logotipoTour');

                if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                    
                    $newName = $logo->getRandomName();
                    $logo->move(ROOTPATH . 'public/' . $path, $newName);

                    $ArrayUpdate = [
                        'logotipo_tour' => $path . $newName,
                    ];
                    
                    
                    $this->generalModel->updateData(
                        $ArrayUpdate, 
                        "tours", 
                        ["id_tour"], 
                        [$idtour]
                    );
                }
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
            
            $id_tour = $sessionData['id'];

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
            
            
            $result["tour"] = $this->generalModel->selectData(
                "*", "tours t", ["t.id_tour"], [$id_tour], ["destinos d"], ["d.id_destino = t.destino_tour"]
            );
            
            $codigo_postal = $result['tour'][0]['cp_fiscal'] ?? null;
            
            $result["colonias"] = $this->generalModel->selectData(
                "*", "colonias", ["codigo_postal"], [$codigo_postal], [], []
            );
            
            $result["tours"] = $this->generalModel->selectData(
                "*", "tours t", [], [], ["destinos d"], ["d.id_destino = t.destino_tour"]
            );

            $result['destinosnacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Nacional"], [], []);

            $result['destinosinternacionales'] = $this->generalModel->selectData("*", "destinos", ["tipo_destino"], ["Internacional"], [], []);

            $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);

            $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);

            $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);

            $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);

            $result["cuentas"] = $this->generalModel->selectData(
                "*", "tours_cuentas", ["id_tour"], [$id_tour], [], []
            );
            
            $result["tarifas"] = $this->generalModel->selectData(
                "*", 
                "tours_tarifas", 
                ["id_tour", "fecha_tarifa >=", "fecha_tarifa <="], 
                [$id_tour, $fecha1, $fecha2], 
                [], 
                []
            );
            
            echo view('extranet/header',$user);
            echo view('extranet/tours/administrar', $result);
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
                "estado_registro" => $status,
            ];

            $fromtable = "tours";
            $arrWhere = ["id_tour"]; 
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
            
            $nombreLimpio = str_replace(' ', '', $data['nombreTour']);
            $path = "assets/tours/{$nombreLimpio}/";
            
            if (!is_dir($path)) {
                mkdir($path, 0775, TRUE);
            }

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            
            $Array = [
                'nombre_tour'               => $data['nombreTour'],
                'destino_tour'              => $data['destinoTour'],
                'email_reservaciones'       => $data['emailreservacionesTour'],
                'email_tarifas'             => $data['emailtarifasTour'],
                'nombre_contacto'           => $data['contactoTour'],
                'telefono_principal'        => $data['telefonoprincipalTour'],
                'telefono_adicional'        => $data['telefonoadicionalTour'],
                'ubicacion_texto'           => $data['ubicacionTour'],
                'descripcion_tour'          => $data['descripcionTour'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            
            $logo = $this->request->getFile('logotipo_tour');
            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                $newName = $logo->getRandomName();
                $logo->move(ROOTPATH . 'public/' . $path, $newName);
                $Array['logotipo_tour'] = $path . $newName; 
            }

            
            $result = $this->generalModel->updateData(
                $Array, 
                "tours", 
                ["id_tour"], 
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
                'razon_social_fiscal'       => $data['razonsocialfiscalTour'],
                'rfc_fiscal'                => $data['rfcfiscalTour'],
                'cp_fiscal'                 => $data['cp_fiscalTour2'],
                'calle_num_fiscal'          => $data['callenumfiscalTour'],
                'colonia_fiscal'            => $data['colonia_fiscalTour2'],
                'municipio_fiscal'          => $data['municipio_fiscalTour2'],
                'estado_fiscal'             => $data['estado_fiscalTour2'],
                'pais_fiscal'               => $data['paisfiscalTour'],
                'email_fiscal'              => $data['emailfiscalTour'],
                'clave_forma_pago'          => $data['formaPagoTour'],
                'clave_metodo_pago'         => $data['metodoPagoTour'], 
                'clave_regimen_fiscal'      => $data['regimenFiscalTour'],
                'clave_uso_cfdi'            => $data['usoCFDITour'],
                'usuario_mod'               => $datosUsuario['id_usuario'], 
                'fecha_mod'                 => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData(
                $Array, 
                "tours", 
                ["id_tour"], 
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
            $cuenta = $data['idCuentaTour'];
            $msg = "Error";
            $fromtable = "tours_cuentas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $commonParams = [
                'alias_cuenta'         => $data['aliasCuentaTour'],
                'nombre_cuenta'        => $data['nombreCuentaTour'],
                'institucion_cuenta'   => $data['institucionCuentaTour'],
                'tipo_cuenta'          => $data['tipoCuentaTour'],
                'numero_cuenta'        => $data['numCuentaTour'],
                'clabe_cuenta'         => $data['clabeCuentaTour'],
                'observaciones_cuenta' => $data['observacionesCuentaTour'],
                'estatus_cuenta'       => $data['statusCuentaTour']
            ];

            if ($cuenta == 0) {
                $insertData = [
                    'id_tour'      => $sessionData['id'],
                    'usuario_alta' => $datosUsuario['id_usuario'],
                    'fecha_alta'   => Time::now()->toDateTimeString()
                ];

                $insertArray = array_merge($commonParams, $insertData);
                $result = $this->generalModel->insertData($insertArray, $fromtable);

                if ($result) {
                    $msg = "Success";
                }
            } else {
                $updateData = [
                    'usuario_mod' => $datosUsuario['id_usuario'],
                    'fecha_mod'   => Time::now()->toDateTimeString()
                ];

                $updateArray = array_merge($commonParams, $updateData);
                $arrWhere = ["id_cuenta_tour"];
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

    function Tarifas(){
        $sessionData = $this->session->get("idupdate");

        if ($sessionData && $this->session->get('loggedInNaturleon')) {
            $data = $this->request->getPost();
            $msg = "Error";
            $fromtable = "tours_tarifas";

            $tour = $sessionData['id'];
            $dias = json_decode($data['diasCheckeados'], true);
            $fechainicio = $data['fechaInicioTarifaTour'];
            $fechafin = $data['fechaFinTarifaTour'];
            $adulto_neta = $data['tarifaAdulto_netaTour'];
            $adulto_markup = $data['tarifaAdulto_markupTour'];
            $adulto_publica = $data['tarifaAdulto_publicaTour'];
            $menor_neta = $data['tarifaMenor_netaTour'];
            $menor_markup = $data['tarifaMenor_markupTour'];
            $menor_publica = $data['tarifaMenor_publicaTour'];
            $infantil_neta = $data['tarifaInfantil_netaTour'];
            $infantil_markup = $data['tarifaInfantil_markupTour'];
            $infantil_publica = $data['tarifaInfantil_publicaTour'];
            $currentDateTime = Time::now()->toDateTimeString();

            $fechas = $this->createDateRange($fechainicio, $fechafin);
            $success_count = 0;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            foreach ($fechas as $fecha) {
                $dia_semana = date('l', strtotime($fecha));

                if (is_array($dias) && in_array($dia_semana, $dias)) {
                    
                    
                    $arrWhere = ["fecha_tarifa", "id_tour"];
                    $arrCond = [$fecha, $tour];

                    
                    $tarifa = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond);

                    $Array_common = [
                        'adulto_neta'                   => $adulto_neta,
                        'adulto_markup'                 => $adulto_markup,
                        'adulto_publica'                => $adulto_publica,
                        'menor_neta'                    => $menor_neta,
                        'menor_markup'                  => $menor_markup,
                        'menor_publica'                 => $menor_publica,
                        'infantil_neta'                 => $infantil_neta,
                        'infantil_markup'               => $infantil_markup,
                        'infantil_publica'              => $infantil_publica,
                        'usuario_mod'                   => $datosUsuario['id_usuario'],
                        'fecha_mod'                     => $currentDateTime,
                    ];

                    if ($tarifa) {
                        $result = $this->generalModel->updateData($Array_common, $fromtable, $arrWhere, $arrCond);
                    } else {
                        $Array_insert = array_merge($Array_common, [
                            'id_tour'               => $tour,
                            'fecha_tarifa'          => $fecha,
                            'estatus_tarifa'        => 1,
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