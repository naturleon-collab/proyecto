<?php

namespace App\Controllers;

use App\Models\GeneralModel;
use CodeIgniter\Files\File;

class ExtAgencias extends BaseController
{
    
    protected $generalModel;

    
    protected $session;
    
    
    public function __construct()
    {
        
        $this->generalModel = new GeneralModel();

        
        $this->session = \Config\Services::session();
        
        helper(['url', 'filesystem']); 

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

            
            $result['estados'] = $this->generalModel->selectData("*", "estados", [], [], [], []);
            
            
            $result['agencias'] = $this->generalModel->selectData("*", "agencias", [], [], [], []);

            
            $result['plazas'] = $this->generalModel->selectData("*", "cms_plazas", [], [], [], []);
            
            
            $output = view('extranet/header',$user);
            $output .= view('extranet/agencias/agregar', $result);
            $output .= view('extranet/footer');
            
            return $output;
            
        }else{
            return redirect()->to(base_url());
        }
    }

    public function AgregarAgencia()
    {
        if($this->session->get("loggedInNaturleon")){
            $nombreAgencia = $this->request->getPost('nombreagencia');
            
            $Array = [
                'alias_agencia'                 => $this->request->getPost('aliasagencia'),
                'nombre_agencia'                => $nombreAgencia,
                'plaza_agencia'                 => $this->request->getPost('plazaagencia'),
                'registro_agencia'              => $this->request->getPost('regturismoagencia'),
                'pais_agencia'                  => $this->request->getPost('paisagencia'),
                'estado_agencia'                => $this->request->getPost('estado_agencia'),
                'municipio_agencia'             => $this->request->getPost('municipio_agencia'),
                'codigopostal_agencia'          => $this->request->getPost('cp_agencia'),
                'callenum_agencia'              => $this->request->getPost('calleagencia'),
                'colonia_agencia'               => $this->request->getPost('colonia_agencia'),
                'telefono1_agencia'             => $this->request->getPost('telefonoprincipalagencia'),
                'telefono2_agencia'             => $this->request->getPost('telefonoadicionalagencia'),
                'movil1_agencia'                => $this->request->getPost('movil1agencia'),
                'movil2_agencia'                => $this->request->getPost('movil2agencia'),
                'website_agencia'               => $this->request->getPost('websiteagencia'),      
                'observaciones_agencia'         => $this->request->getPost('observaciones'),
                'usuario_alta_agencia'          => 1, 
                'fechahora_alta_agencia'        => date("Y-m-d H:i:s"),
                'usuario_aprobacion_agencia'    => 1,
                'fechahora_aprobacion_agencia'  => date("Y-m-d H:i:s"),
            ];

            $fromtable = "agencias";
            
            
            $idagencia = $this->generalModel->insertDataReturn($Array, $fromtable);

            if ($idagencia) {
                
                
                $path = FCPATH . "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/";
                
                
                if (!is_dir($path)) {
                    mkdir($path, 0775, true);
                }

                
                $file = $this->request->getFile('logotipo');

                if ($file && $file->isValid() && !$file->hasMoved()) {
                    
                    $newName = $file->getRandomName();
                    $file->move($path, $newName);
                    
                    
                    $ArrayUpdate = [
                        'logotipo_agencia' => "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/" . $newName,
                    ];
                    
                    $arrWhere = ["id_agencia"];
                    $arrCond = [$idagencia];

                    $this->generalModel->updateData($ArrayUpdate, $fromtable, $arrWhere, $arrCond);
                }

                $msg = "Success";
            } else {
                $msg = "Error";
            }
            
            
            return $this->response->setBody($msg);

        } else {
            return redirect()->to(base_url());
        }
    }
    
    public function Status()
    {
        if ($this->session->get("loggedInNaturleon")) {

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'status_agencia' => $this->request->getPost('status'),
                'usuario_modificacion_agencia'  => $datosUsuario['id_usuario'],
                'fechahora_modificacion_agencia'=> date("Y-m-d H:i:s"),
            ];

            $fromtable = "agencias";

            $arrWhere = ["id_agencia"];
            $arrCond = [$this->request->getPost('id')];
            
            $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            $msg = $result ? "Success" : "Error";
            
            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function SaveID()
    {
        if ($this->session->get("loggedInNaturleon")) {
            $array = [
                'id' => $this->request->getPost('id'),
            ];

            $this->session->set('idupdate', $array);

            $msg = $this->session->get("idupdate") ? "Success" : "Error";
            
            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function Administrar()
    {
        
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $dataAgencia = $this->session->get('idupdate');
            $idAgencia = $dataAgencia['id'];
            $result = [];
            
            
            $result['plazas'] = $this->generalModel->selectData("*", "cms_plazas", [], [], [], []);
            
            
            $result['agencias'] = $this->generalModel->selectData("*", "agencias", [], [], [], []);

            
            $result['agencia'] = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$idAgencia], [], []);
            
            
            $result['usuarios'] = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$idAgencia,"agencia"], [], []);
            $result['cuentas'] = $this->generalModel->selectData("*", "agencias_cuentas", ["id_agencia"], [$idAgencia], [], []);
            $result['fiscales'] = $this->generalModel->selectData("*", "agencias_datos_fiscales", ["id_agencia"], [$idAgencia], [], []);
            $result['documentos'] = $this->generalModel->selectData("*", "agencias_documentos", ["id_agencia"], [$idAgencia], [], []);
            $result['configuracion'] = $this->generalModel->selectData("*", "agencias_configuracion", ["id_agencia"], [$idAgencia], [], []);

            
            $result["regimen"] = $this->generalModel->selectData("*", "regimen_fiscal", [], [], [], []);
            $result["cfdi"] = $this->generalModel->selectData("*", "uso_cfdi", [], [], [], []);
            $result["formaspago"] = $this->generalModel->selectData("*", "formas_pago", [], [], [], []);
            $result["metodospago"] = $this->generalModel->selectData("*", "metodos_pago", [], [], [], []);
            
            
            $cpAgencia = !empty($result['agencia']) && isset($result['agencia'][0]['codigopostal_agencia']) ? $result['agencia'][0]['codigopostal_agencia'] : null;
            $result["colonias"] = [];
            if ($cpAgencia) {
                $result["colonias"] = $this->generalModel->selectData("*", "colonias", ["codigo_postal"], [$cpAgencia], [], []);
            }

            
            $output = view('extranet/header',$user);
            $output .= view('extranet/agencias/administrar', $result);
            $output .= view('extranet/footer');
            
            return $output;
        } else {
            return redirect()->to(base_url());
        }
    }

    public function ModificarAgencia()
    { 
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $dataAgencia = $this->session->get('idupdate');
            $idAgencia = $dataAgencia['id'];
            $nombreAgencia = $this->request->getPost('nombreagencia');

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            
            $path = FCPATH . "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/";
            
            if (!is_dir($path)) {
                mkdir($path, 0775, true);
            }

            
            $file = $this->request->getFile('logotipo');
            $logotipoPath = null;
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $logotipoPath = "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/" . $newName;
            }

            
            $Array = [
                'alias_agencia'                     => $this->request->getPost('aliasagencia'),
                'nombre_agencia'                    => $nombreAgencia,
                'registro_agencia'                  => $this->request->getPost('regturismoagencia'),
                'codigopostal_agencia'              => $this->request->getPost('cp_agencia2'),
                'callenum_agencia'                  => $this->request->getPost('calleagencia'),
                'colonia_agencia'                   => $this->request->getPost('colonia_agencia2'),
                'municipio_agencia'                 => $this->request->getPost('municipio_agencia2'),
                'estado_agencia'                    => $this->request->getPost('estado_agencia2'),
                'telefono1_agencia'                 => $this->request->getPost('telefonoprincipalagencia'),
                'telefono2_agencia'                 => $this->request->getPost('telefonoadicionalagencia'),
                'movil1_agencia'                    => $this->request->getPost('movil1agencia'),
                'movil2_agencia'                    => $this->request->getPost('movil2agencia'),
                'website_agencia'                   => $this->request->getPost('websiteagencia'),      
                'observaciones_agencia'             => $this->request->getPost('observaciones'),
                'status_agencia'                    => 1,
                
                'usuario_modificacion_agencia'      => $datosUsuario['id_usuario'], 
                'fechahora_modificacion_agencia'    => date("Y-m-d H:i:s"),
            ];

            
            if ($logotipoPath) {
                $Array['logotipo_agencia'] = $logotipoPath;
            }
            
            $fromtable = "agencias";
            $arrWhere = ["id_agencia"];
            $arrCond = [$idAgencia];

            $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            $msg = $result ? "Success" : "Error";
            
            return $this->response->setBody($msg);

        } else {
            return redirect()->to(base_url());
        }
    }

    public function DataModificar()
    {
        if($this->session->get('loggedInNaturleon')){
            $db = $this->request->getPost("db");
            $nameField = $this->request->getPost("namefield");
            $id = $this->request->getPost('id');
            $nameResult = $this->request->getPost("nameresult");

            
            $resultData = $this->generalModel->selectData("*", $db, [$nameField], [$id], [], []);
            
            if (!empty($resultData)) {
                $array["msg"] = "Success";
                $array[$nameResult] = $resultData; 

                
                if ($db == "agencias_datos_fiscales") {
                    
                    $cpFiscal = $resultData[0]['cp_fiscal'] ?? $resultData[0]->cp_fiscal ?? null; 
                    
                    if($cpFiscal){
                        $array["colonias"] = $this->generalModel->selectData("*", "colonias", ["codigo_postal"], [$cpFiscal], [], []);;
                    } else {
                        $array["colonias"] = "ErrorCP";
                    }
                }
            }else{
                $array = ["msg" => "Error"];
            }
            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Usuarios()
    {
        if (!$this->session->get('loggedInNaturleon') || !$this->session->get('idupdate')) {
            return redirect()->to(base_url());
        }

        $datosSesion = $this->session->get('loggedInNaturleon');
        $agenciaActiva = $this->session->get('idupdate');
        
        $idUsuario = $this->request->getPost('idUsuario');
        $password = $this->request->getPost('passwordUsuario');
        $fromtable = "usuarios";

        $data = [
            'alias_usuario'  => $this->request->getPost('aliasUsuario'),
            'nombre_usuario' => $this->request->getPost('nombreUsuario'),
            'email_usuario'  => $this->request->getPost('emailUsuario'),
            'movil_usuario'  => $this->request->getPost('movilUsuario'),
            'login_usuario'  => $this->request->getPost('loginUsuario'),
            'cumple_usuario' => $this->request->getPost('cumpleUsuario'),
            'status_usuario' => $this->request->getPost('statusAgencia'),
        ];

        if ($idUsuario == 0) {
            // --- NUEVO USUARIO ---
            $data['id_entidad']    = $agenciaActiva['id'];
            $data['tipo_acceso']   = 'agencia';
            $data['pwd_usuario']   = password_hash($password, PASSWORD_DEFAULT);
            $data['usuario_alta']  = $datosSesion['id_usuario'];
            $data['fecha_alta']    = date("Y-m-d H:i:s");

            $result = $this->generalModel->insertData($data, $fromtable);

        } else {
            // --- MODIFICAR USUARIO ---
            $data['usuario_mod']   = $datosSesion['id_usuario'];
            $data['fecha_mod'] = date("Y-m-d H:i:s");

            if (!empty($password)) {
                $data['pwd_usuario'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $arrWhere = ["id_usuario"];
            $arrCond  = [$idUsuario];

            $result = $this->generalModel->updateData($data, $fromtable, $arrWhere, $arrCond);
        }

        return $this->response->setBody($result ? "Success" : "Error");
    }

    public function Cuentas()
    {
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $idCuenta = $this->request->getPost('idCuenta');
            $dataAgencia = $this->session->get('idupdate');
            $fromtable = "agencias_cuentas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            
            if ($idCuenta == 0) {
                $Array = [
                    'id_agencia'                => $dataAgencia['id'],
                    'alias_cuenta'              => $this->request->getPost('aliasCuenta'),
                    'nombre_cuenta'             => $this->request->getPost('nombreCuenta'),
                    'institucion_cuenta'        => $this->request->getPost('institucionCuenta'),
                    'tipo_cuenta'               => $this->request->getPost('tipoCuenta'),
                    'num_cuenta'                => $this->request->getPost('numCuenta'),
                    'clabe_cuenta'              => $this->request->getPost('clabeCuenta'),
                    'observaciones_cuenta'      => $this->request->getPost('observacionesCuenta'),
                    'status_cuenta'             => $this->request->getPost('statusCuenta'),
                    'usuario_alta_cuenta'       => $datosUsuario['id_usuario'], 
                    'fechahora_alta_cuenta'     => date("Y-m-d H:i:s"),
                ];

                $result = $this->generalModel->insertData($Array, $fromtable);
            
            
            } else {
                $Array = [
                    'alias_cuenta'                  => $this->request->getPost('aliasCuenta'),
                    'nombre_cuenta'                 => $this->request->getPost('nombreCuenta'),
                    'institucion_cuenta'            => $this->request->getPost('institucionCuenta'),
                    'tipo_cuenta'                   => $this->request->getPost('tipoCuenta'),
                    'num_cuenta'                    => $this->request->getPost('numCuenta'),
                    'clabe_cuenta'                  => $this->request->getPost('clabeCuenta'),
                    'observaciones_cuenta'          => $this->request->getPost('observacionesCuenta'),
                    'status_cuenta'                 => $this->request->getPost('statusCuenta'),
                    'usuario_modificacion_cuenta'   => $datosUsuario['id_usuario'], 
                    'fechahora_modificacion_cuenta' => date("Y-m-d H:i:s"),
                ];

                $arrWhere = ["id_cuenta"];
                $arrCond = [$idCuenta];

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }

            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);
        
        } else {
            return redirect()->to(base_url());
        }
    }
    
    public function Documentos()
    {
        if ($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')) {
            $idDocumento = $this->request->getPost('idDocumento');
            $dataAgencia = $this->session->get('idupdate');
            $idAgencia = $dataAgencia['id'];
            $fromtable = "agencias_documentos";

            
            $agencia = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$idAgencia], [], []);
            
            $nombreAgencia = !empty($agencia) ? ($agencia[0]['nombre_agencia'] ?? 'agencia_desconocida') : 'agencia_desconocida'; 
            
            $path = FCPATH . "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/";
            
            if (!is_dir($path)) {
                mkdir($path, 0775, true);
            }

            
            $file = $this->request->getFile('archivoDocumento');
            $archivoPath = null;
            $fileUploaded = false;
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $archivoPath = "assets/agencias/" . str_replace(' ', '', $nombreAgencia) . "/" . $newName;
                $fileUploaded = true;
            }

            $datosUsuario = $this->session->get('loggedInNaturleon');

            
            if ($idDocumento == 0) {
                $Array = [
                    'id_agencia'                => $idAgencia,
                    'alias_documento'           => $this->request->getPost('aliasDocumento'),
                    'nombre_oficial_documento'  => $this->request->getPost('nombreDocumento'),
                    'observaciones_documento'   => $this->request->getPost('observacionesDocumento'),
                    'usuario_alta_documento'    => $datosUsuario['id_usuario'], 
                    'fechahora_alta_documento'  => date("Y-m-d H:i:s"),
                ];
                
                if ($fileUploaded) {
                    $Array['archivo_documento'] = $archivoPath;
                    $result = $this->generalModel->insertData($Array, $fromtable);
                } else {
                    $result = false; 
                }

            
            } else {
                $Array = [
                    'alias_documento'               => $this->request->getPost('aliasDocumento'),
                    'nombre_oficial_documento'      => $this->request->getPost('nombreDocumento'),
                    'observaciones_documento'       => $this->request->getPost('observacionesDocumento'),
                    'usuario_modificacion_documento'=> $datosUsuario['id_usuario'], 
                    'fechahora_modificacion_documento'=> date("Y-m-d H:i:s"),
                ];
                
                if ($fileUploaded) {
                    $Array['archivo_documento'] = $archivoPath;
                }

                $arrWhere = ["id_documento"];
                $arrCond = [$idDocumento];

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }
            
            $msg = $result ? "Success" : "Error";
            return $this->response->setBody($msg);

        } else {
            return redirect()->to(base_url());
        }
    }

    public function DatosFiscales()
    {
        if($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')){
            
            $dataAgencia = $this->session->get('idupdate');
            $datofiscal = $this->request->getPost('idDatoFiscal'); 

            $datosUsuario = $this->session->get('loggedInNaturleon');
            
            
            $fiscalData = [
                'razon_social_fiscal'           => $this->request->getPost('razonSocialFiscal'),
                'rfc_fiscal'                    => $this->request->getPost('rfcFiscal'),
                'pais_fiscal'                   => $this->request->getPost('paisFiscal'),
                'estado_fiscal'                 => $this->request->getPost('estado_Fiscal'),
                'municipio_fiscal'              => $this->request->getPost('municipio_Fiscal'),
                'cp_fiscal'                     => $this->request->getPost('cp_Fiscal'),
                'colonia_fiscal'                => $this->request->getPost('colonia_Fiscal'),
                'callenum_fiscal'               => $this->request->getPost('calleNumFiscal'),
                'email_fiscal'                  => $this->request->getPost('emailFiscal'),
                'encargado_fiscal'              => $this->request->getPost('encargadoFiscal'),
                'telefono1_fiscal'              => $this->request->getPost('telefonofiscal'),
                'telefono2_fiscal'              => $this->request->getPost('telefonoadicionalfiscal'),
                'movil1_fiscal'                 => $this->request->getPost('movil1fiscal'),
                'movil2_fiscal'                 => $this->request->getPost('movil2fiscal'),
                'forma_pago'                    => $this->request->getPost('formaPagoFiscal'),
                'metodo_pago'                   => $this->request->getPost('metodoPagoFiscal'),
                'regimen_fiscal'                => $this->request->getPost('regimenFiscalFiscal'),
                'uso_cfdi'                      => $this->request->getPost('usoCFDIFiscal'),
                'status_fiscal'                 => $this->request->getPost('statusFiscal'),
            ];

            $fromtable = "agencias_datos_fiscales";

            if($datofiscal == 0){
                
                $Array = array_merge($fiscalData, [
                    'id_agencia'                    => $dataAgencia['id'],
                    'usuario_alta_fiscal'           => $datosUsuario['id_usuario'],
                    'fechahora_alta_fiscal'         => date("Y-m-d H:i:s"),
                ]);
                
                $result = $this->generalModel->insertData($Array, $fromtable);

                if(!$result){
                    $db = \Config\Database::connect();
                    return $this->response->setBody("Error SQL: " . json_encode($db->error()));
                }

                $msg = $result ? "Success" : "Error";
            }else{
                
                $Array = array_merge($fiscalData, [
                    'usuario_modificacion_fiscal'   => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_fiscal' => date("Y-m-d H:i:s"),
                ]);

                $arrWhere = array("id_dato_fiscal");
                $arrCond = array($datofiscal);

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                $msg = $result ? "Success" : "Error";
            }
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Configuracion()
    {
        if($this->session->get("idupdate") && $this->session->get('loggedInNaturleon')){
            $dataAgencia = $this->session->get('idupdate');
            $idAgencia = $dataAgencia['id'];

            $columnselect = "*";
            $fromtable = "agencias_configuracion";

            $arrWhere = array("id_agencia");
            $arrCond = array($idAgencia);

            $agencia = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, [], []);

            
            $configData = [
                'credito_configuracion'             => $this->request->getPost('pagoCredito'),
                'cronospay_configuracion'           => $this->request->getPost('pagoCronosPay'),
                'prepago_configuracion'             => $this->request->getPost('pagoPrepago'),
                'noreembolsable_configuracion'      => $this->request->getPost('noReembolsables'),
                'web_configuracion'                 => $this->request->getPost('accesoWeb'),
                'naturframe_configuracion'          => $this->request->getPost('naturframe'),
                'canal_web_configuracion'           => $this->request->getPost('canalWeb'),
                'mbp_configuracion'                 => $this->request->getPost('canalMbp'),
                'grupos_configuracion'              => $this->request->getPost('canalGrupos'),
                'expoviaja_configuracion'           => $this->request->getPost('canalExpoViaja'),
                'bloqueos_naturleon_configuracion'  => $this->request->getPost('canalBloqueoNaturleon'),
                'bloqueos_agencias_configuracion'   => $this->request->getPost('canalBloqueoAgencias'),
                'comision_efectivo_configuracion'   => $this->request->getPost('comisionEfectivo'),
                'comision_tarjeta_configuracion'    => $this->request->getPost('comisionTarjeta'),
                'observaciones_configuracion'       => $this->request->getPost('observacionesInternas'),
            ];

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if(!empty($agencia)){
                
                $Array = array_merge($configData, [
                    'usuario_modificacion_configuracion'    => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_configuracion'  => date("Y-m-d H:i:s"),
                ]);

                $fromtable = "agencias_configuracion";
                $arrWhere = array("id_agencia");
                $arrCond = array($idAgencia);

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                $msg = $result ? "Success" : "Error";
            }else{
                
                $Array = array_merge($configData, [
                    'id_agencia'                            => $idAgencia,
                    'usuario_modificacion_configuracion'    => $datosUsuario['id_usuario'], 
                    'fechahora_modificacion_configuracion'  => date("Y-m-d H:i:s"),
                ]);

                $fromtable = "agencias_configuracion";

                $result = $this->generalModel->insertData($Array, $fromtable);

                $msg = $result ? "Success" : "Error";
            }
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function DataAgencia()
    {
        if($this->session->get('loggedInNaturleon')){
            $id = $this->request->getPost('id');

            $result = [];
            
            $result["agencia"] = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$id], [], []);
            $result["fiscales"] = $this->generalModel->selectData("*", "agencias_datos_fiscales", ["id_agencia"], [$id], [], []);
            $result["usuarios"] = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$id,"agencia"], [], []);
            $result["documentos"] = $this->generalModel->selectData("*", "agencias_documentos", ["id_agencia"], [$id], [], []);

            if(!empty($result["agencia"])){
                $array = array("msg" => "Success", 
                            "agencia" => $result["agencia"], 
                            "fiscales" => $result["fiscales"], 
                            "usuarios" => $result["usuarios"], 
                            "documentos" => $result["documentos"]);
            }else{
                $array = array("msg" => "Error");
            }

            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function AceptarSolicitud()
    {
        if($this->session->get('loggedInNaturleon')){
            $agenciaId = $this->request->getPost("agencia");

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'status_agencia'                => 1,
                'usuario_aprobacion_agencia'    => $datosUsuario['id_usuario'],
                'fechahora_aprobacion_agencia'  => date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData($Array, "agencias", ["id_agencia"], [$agenciaId]);

            

            $dataUsuario = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$agenciaId,"agencia"], [], []);

            $ruta_logo = base_url('assets/img/naturleon_logo.png');

            $email = \Config\Services::email();

            $email->setTo($dataUsuario[0]['email_usuario']); 

            $email->setSubject('Bienvenido a Naturleón - Test' .time());

            $mensaje = '<div style="background-color: #f4f4f4; padding: 20px; font-family: sans-serif;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border-collapse: collapse; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center" style="padding: 40px 0; background-color: #003a70;">
                            <img src="'.$ruta_logo.'" alt="Naturleón" style="width: 200px; display: block;">
                            <h1 style="color: #ffffff; font-size: 28px; margin: 20px 0 0 0;">¡Bienvenido a la familia!</h1>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 40px 30px; text-align: center;">
                            <h2 style="color: #333333; font-size: 22px; margin-top: 0;">¡Hola, '.$dataUsuario[0]['nombre_usuario'].'!</h2>
                            <p style="color: #666666; font-size: 16px; line-height: 1.6;">
                                Nos complace informarte que tu solicitud ha sido <strong>aprobada con éxito</strong>. A partir de este momento, ya eres parte de nuestros socios comerciales en <strong>Naturleón</strong>.
                            </p>
                            
                            <div style="background-color: #f0f7ff; border: 1px dashed #003a70; padding: 20px; margin: 30px 0; border-radius: 8px;">
                                <p style="color: #003a70; font-size: 14px; margin: 0 0 10px 0; text-transform: uppercase; letter-spacing: 1px;">Tu identificador de acceso:</p>
                                <span style="color: #333333; font-size: 24px; font-weight: bold;">'.$dataUsuario[0]['login_usuario'].'</span>
                            </div>

                            <p style="color: #666666; font-size: 15px; line-height: 1.5;">
                                Utiliza tu login y la contraseña que generaste en tu registro para comenzar a disfrutar de nuestros servicios.
                            </p>
                            
                            <div style="margin-top: 30px;">
                                <a href="'.base_url().'" style="background-color: #28a745; color: #ffffff; padding: 18px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; font-size: 16px;">
                                    Comenzar ahora
                                </a>
                            </div>

                            <p style="color: #999999; font-size: 13px; margin-top: 25px; font-style: italic;">
                                ¿Olvidaste tu contraseña? No te preocupes, puedes restablecerla en el panel de inicio de sesión.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 25px 30px; background-color: #eeeeee; color: #777777; font-size: 12px; text-align: center;">
                            <p style="margin: 0; font-weight: bold;">Estamos para apoyarte en cada paso.</p>
                            <p style="margin: 5px 0 0 0;">&copy; '.date('Y').' Naturleón S.A. de C.V. Todos los derechos reservados.</p>
                        </td>
                    </tr>
                </table>
            </div>
            ';

            $email->setMessage($mensaje);

            if($email->send()){
                $msg = "Success";
            }else{
                $msg = "Error";
            }
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function RechazarSolicitud()
    {
        if($this->session->get('loggedInNaturleon')){
            $agenciaId = $this->request->getPost("agencia");

            $observaciones = $this->request->getPost("observaciones");

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $token = bin2hex(random_bytes(16));

            $Array = [
                'status_agencia'                => 2,
                'token_edicion_agencia'         => $token,
                'token_usado_agencia'           => 0, 
                'usuario_modificacion_agencia'  => $datosUsuario['id_usuario'],
                'fechahora_modificacion_agencia'=> date("Y-m-d H:i:s"),
            ];

            $result = $this->generalModel->updateData($Array, "agencias", ["id_agencia"], [$agenciaId]);

            $dataUsuario = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$agenciaId,"agencia"], [], []);

            $url_modificar = base_url("Main/ModificarSolicitud/".$agenciaId."/".$token);

            $ruta_logo = base_url('assets/img/naturleon_logo.png');

            $email = \Config\Services::email();

            $email->setTo($dataUsuario[0]['email_usuario']); 

            $email->setSubject('Feedback solicitud a Naturleón - ' .time());

            $mensaje = '<div style="background-color: #f4f4f4; padding: 20px; font-family: sans-serif;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border-collapse: collapse;">
                    <tr>
                        <td align="center" style="padding: 30px 0; background-color: #003a70;">
                            <img src="'.$ruta_logo.'" alt="Naturleón" style="width: 180px; display: block;">
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h1 style="color: #333333; font-size: 24px; margin-top: 0;">¡Hola, '.$dataUsuario[0]['nombre_usuario'].'!</h1>
                            <p style="color: #666666; font-size: 16px; line-height: 1.5;">
                                Gracias por tu interés en formar parte de la familia <strong>Naturleón</strong>. 
                                Hemos revisado tu solicitud de registro y tenemos algunas observaciones importantes:
                            </p>
                            
                            <div style="background-color: #fff9e6; border-left: 4px solid #ffcc00; padding: 15px; margin: 25px 0;">
                                <p style="color: #856404; font-size: 15px; margin: 0;">
                                    '.nl2br($observaciones).'
                                </p>
                            </div>

                            <p style="color: #666666; font-size: 16px; line-height: 1.5;">
                                Para continuar con el proceso, por favor realiza los cambios solicitados ingresando al siguiente enlace:
                            </p>
                            
                            <div style="text-align: center; margin-top: 30px;">
                                <a href="'.$url_modificar.'" style="background-color: #003a70; color: #ffffff; padding: 15px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                                    Actualizar mi Solicitud
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 30px; background-color: #eeeeee; color: #999999; font-size: 12px; text-align: center;">
                            <p style="margin: 0;">Este es un mensaje automático, por favor no respondas a este correo.</p>
                            <p style="margin: 5px 0 0 0;">&copy; '.date('Y').' Naturleón S.A. de C.V. Todos los derechos reservados.</p>
                        </td>
                    </tr>
                </table>
            </div>
            ';

            $email->setMessage($mensaje);

            if($email->send()){
                $msg = "Success";
            }else{
                $msg = "Error";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function EliminarSolicitud(){
        
        if($this->session->get('loggedInNaturleon')){
            $agenciaId = $this->request->getPost("agencia");

            $observaciones = $this->request->getPost("observaciones");

            $dataUsuario = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$agenciaId,"agencia"], [], []);

            $ruta_logo = base_url('assets/img/naturleon_logo.png');

            $email = \Config\Services::email();

            $email->setTo($dataUsuario[0]['email_usuario']); 

            $email->setSubject('Feedback solicitud a Naturleón - ' .time());

            $mensaje = '<div style="background-color: #f4f4f4; padding: 20px; font-family: sans-serif;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border-collapse: collapse;">
                    <tr>
                        <td align="center" style="padding: 30px 0; background-color: #f8f9fa; border-bottom: 1px solid #eeeeee;">
                            <img src="'.$ruta_logo.'" alt="Naturleón" style="width: 180px; display: block;">
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h1 style="color: #333333; font-size: 22px; margin-top: 0;">Estimado(a) '.$dataUsuario[0]['nombre_usuario'].',</h1>
                            <p style="color: #666666; font-size: 16px; line-height: 1.5;">
                                Agradecemos el tiempo dedicado a tu solicitud de registro para ingresar a <strong>Naturleón</strong>.
                            </p>
                            <p style="color: #666666; font-size: 16px; line-height: 1.5;">
                                Tras una revisión detallada de la información proporcionada, lamentamos informarte que en esta ocasión <strong>no ha sido posible aprobar tu registro</strong> y tu solicitud ha sido dada de baja de nuestro sistema.
                            </p>
                            
                            <p style="color: #333333; font-size: 16px; font-weight: bold; margin-bottom: 10px;">
                                Motivos de la decisión:
                            </p>
                            
                            <div style="background-color: #fff5f5; border-left: 4px solid #e53e3e; padding: 15px; margin-bottom: 25px;">
                                <p style="color: #c53030; font-size: 15px; margin: 0; line-height: 1.4;">
                                    '.nl2br($observaciones).'
                                </p>
                            </div>

                            <p style="color: #666666; font-size: 14px; line-height: 1.5; font-style: italic;">
                                Si consideras que ha habido un error o deseas realizar una nueva solicitud en el futuro una vez solventados estos puntos, por favor contáctanos directamente.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 30px; background-color: #eeeeee; color: #999999; font-size: 12px; text-align: center;">
                            <p style="margin: 0;">Atentamente,</p>
                            <p style="margin: 5px 0 0 0; font-weight: bold; color: #777777;">Departamento de Afiliaciones - Naturleón</p>
                            <p style="margin: 15px 0 0 0;">&copy; '.date('Y').' Naturleón S.A. de C.V.</p>
                        </td>
                    </tr>
                </table>
            </div>
            ';

            $email->setMessage($mensaje);

            if($email->send()){
                

                
                $dataAgencia = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$agenciaId], [], []);

                $nombreComercial = str_replace(' ', '', $dataAgencia[0]['nombre_agencia']);
                $pathSegment = "assets/agencias/" . $nombreComercial . "/";
                $fullPath = FCPATH . $pathSegment;

                $isDeleted = $this->deleteDir($fullPath);

                
                $deletedUsuarios = $this->generalModel->deleteData("usuarios", ["id_entidad","tipo_acceso"], [$agenciaId,"agencia"]);

                
                $deletedAgencia = $this->generalModel->deleteData("agencias", ["id_agencia"], [$agenciaId]);

                
                $deletedDatosFacturacion = $this->generalModel->deleteData("agencias_datos_fiscales", ["id_agencia"], [$agenciaId]);

                
                $deletedDocumentos = $this->generalModel->deleteData("agencias_documentos", ["id_agencia"], [$agenciaId]);

                $msg = "Success";
            }else{
                $msg = "Error";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    protected function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            return false;
        }

        $files = glob($dirPath . '/*');
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->deleteDir($file);
            } else {
                unlink($file);
            }
        }

        return rmdir($dirPath);
    }

}