<?php

namespace App\Controllers;

// 1. Importar las clases necesarias de CodeIgniter
use App\Models\GeneralModel;

class Main extends BaseController
{
    /**
     * @var GeneralModel
     */
    protected $generalModel;

    /**
     * @var \CodeIgniter\Session\Session
     */
    protected $session;
    
    public function __construct()
    {

        $this->generalModel = new GeneralModel();
        $this->session = \Config\Services::session();
    }

    // ---------------------------------------------------------------------
    // FUNCIÓN INDEX
    // ---------------------------------------------------------------------
    public function index()
    {
        // echo password_hash("123456", PASSWORD_DEFAULT);
        // die();

        $columnselect = "*";
        $fromtable = "cms_slider";
        $arrWhere = ["status_slider"];
        $arrCond = [1];
        $arrJoin = [];
        $arrCondJoin = [];

        $result['sliders'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

        $result['plazas'] = $this->generalModel->selectData("*", "cms_plazas", [], [], [], []);

        $result['nosotros'] = $this->generalModel->selectData("*", "cms_nosotros", [], [], [], []);

        $result['valores'] = $this->generalModel->selectData("*", "cms_nosotros_valores", [], [], [], []);
        
        return view('frontpage', $result);
    }

    // ---------------------------------------------------------------------
    // FUNCIÓN BUSCAR DIRECCIÓN
    // ---------------------------------------------------------------------
    public function BuscarDireccion()
    {
        
        $cp = $this->request->getPost('cp'); 

        $columnselect = "*";
        $fromtable = "colonias";
        $arrWhere = ["codigo_postal"];
        $arrCond = [$cp];
        
        $result['colonias'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, [], []);

        if (!empty($result["colonias"])) {

            $estadoID = $result["colonias"][0]['id_estado'];
            $municipioID = $result["colonias"][0]['id_municipio'];

            $result['estado'] = $this->generalModel->selectData("nombre_estado", "estados", ["id_estado"], [$estadoID], [], []);

            $result['municipio'] = $this->generalModel->selectData("nombre_municipio", "municipios", ["id_municipio","id_estado"], [$municipioID,$estadoID], [], []);
            
            $array = ["msg" => "Success", "colonias" => $result["colonias"], "municipio" => $result["municipio"], "estado" => $result["estado"]];
        } else {
            $array = ["msg" => "Error"];
        }

        return $this->response->setJSON($array); 
    }

    // ---------------------------------------------------------------------
    // FUNCIÓN LOGIN
    // ---------------------------------------------------------------------
    
    public function logIn(){
        $username = $this->request->getPost('login-user');
        $passwordIngresada = $this->request->getPost('login-password');

        if (isset($username) && isset($passwordIngresada)) {
            $fromtable = "usuarios";
            $arrWhere = ["login_usuario", "status_usuario"];
            $arrCond = [$username, 1];

            $result = $this->generalModel->selectData("*", $fromtable, $arrWhere, $arrCond, [], []);

            if ($result) {
                $user = $result[0];

                if (password_verify($passwordIngresada, $user['pwd_usuario'])) {

                    $tipoAcceso = $user['tipo_acceso'];

                    $sess_array = [
                        'id_usuario'            => $user['id_usuario'],
                        'nombre_usuario'        => $user['alias_usuario'],
                        'login_usuario'         => $user['login_usuario'],
                        'tipo_usuario'          => $tipoAcceso,
                        'entidad_usuario'       => $user['id_entidad'],
                    ];

                    $this->session->set('loggedInNaturleon', $sess_array);

                    $this->generalModel->updateData(
                        ['ultimo_acceso' => \CodeIgniter\I18n\Time::now()->toDateTimeString()],
                        "usuarios",
                        ["id_usuario"],
                        [$user['id_usuario']]
                    );
                    
                    $puedeAcceder = false;

                    $route = ($user['tipo_acceso'] == "agencia") ? 'Booking' : 'Dashboard';
                    return redirect()->to(base_url($route));
                    
                } else {
                    return redirect()->to(base_url('/'))->withInput()->with('error', 'Los datos ingresados no son correctos. Inténtalo de nuevo.');
                }
            } else {
                return redirect()->to(base_url('/'))->withInput()->with('error', 'El usuario no existe o tu cuenta no está disponible en este momento. Por favor, contacta al administrador.');
            }
        } else {
            return redirect()->to(base_url());
        }
    }

    public function RegistrarAgenciaFront(){
        $loginusuario = $this->request->getPost('loginagencia');
        $columnselect = "*";$fromtable = "usuarios";$arrWhere = array("login_usuario");$arrCond = array($loginusuario);
        
        $checkUsuario = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, [], []);

        if(!empty($checkUsuario)){
            $msg = "UsuarioExiste";
        }else{
            $Array = [
                'alias_agencia'             => $this->request->getPost('nombrecomercial'),
                'nombre_agencia'            => $this->request->getPost('nombrecomercial'),
                'plaza_agencia'             => $this->request->getPost('plaza'),
                'registro_agencia'          => $this->request->getPost('renatu'),
                'pais_agencia'              => "México",
                'estado_agencia'            => $this->request->getPost('estadocontacto'),
                'municipio_agencia'         => $this->request->getPost('municipiocontacto'),
                'codigopostal_agencia'      => $this->request->getPost('cpcontacto'),
                'callenum_agencia'          => $this->request->getPost('callecontacto'),
                'colonia_agencia'           => $this->request->getPost('coloniacontacto'),
                'telefono1_agencia'         => $this->request->getPost('telefonocontacto'),
                'telefono2_agencia'         => $this->request->getPost('telefonoadicionalcontacto'),
                'movil1_agencia'            => $this->request->getPost('movil1contacto'),
                'movil2_agencia'            => $this->request->getPost('movil2contacto'),    
                'observaciones_agencia'     => $this->request->getPost('otrosdatos'),
                'status_agencia'            => 3,
                'usuario_alta_agencia'      => 0,
                'fechahora_alta_agencia'    => date("Y-m-d H:i:s"),
            ];

            $fromtable = "agencias";
            $idagencia = $this->generalModel->insertDataReturn($Array, $fromtable);

            if($idagencia){
                
                $nombreComercial = str_replace(' ', '', $this->request->getPost('nombrecomercial'));
                $pathSegment = "assets/agencias/" . $nombreComercial . "/";
                $fullPath = FCPATH . $pathSegment; 

                if (!is_dir($fullPath)) {
                    mkdir($fullPath, 0775, TRUE);
                }

                
                $logotipo = $this->request->getFile('logotipoagencia');
                if ($logotipo && $logotipo->isValid() && !$logotipo->hasMoved()) {
                    $newName = $logotipo->getRandomName();
                    $logotipo->move($fullPath, $newName);
                    
                    $Array = ['logotipo_agencia'  => $pathSegment . $newName];
                    $this->generalModel->updateData($Array, "agencias", ["id_agencia"], [$idagencia]);
                }

                
                $usuarioData = [
                    'id_entidad'                    => $idagencia,
                    'tipo_acceso'                   => 'agencia',
                    'alias_usuario'                 => $this->request->getPost('personacontacto'),
                    'nombre_usuario'                => $this->request->getPost('personacontacto'),
                    'email_usuario'                 => $this->request->getPost('emailcontacto'),
                    'movil_usuario'                 => $this->request->getPost('movil1contacto'),
                    'login_usuario'                 => $loginusuario,
                    'pwd_usuario'                   => password_hash($this->request->getPost('passwordagencia'), PASSWORD_DEFAULT),
                    'status_usuario'                => 0,
                    'usuario_alta'                  => 0,
                    'fecha_alta'                    => date("Y-m-d H:i:s"),
                ];

                $idUsuario = $this->generalModel->insertDataReturn($usuarioData, "usuarios");
                $this->generalModel->updateData(['usuario_alta_agencia' => $idUsuario], "agencias", ["id_agencia",], [$idagencia]);
                $this->generalModel->updateData(['usuario_alta' => $idUsuario], "usuarios", ["id_usuario"], [$idUsuario]);

                
                $fiscalData = [
                    'id_agencia'            => $idagencia,
                    'razon_social_fiscal'   => $this->request->getPost('razonsocial'),
                    'rfc_fiscal'            => $this->request->getPost('rfc'),
                    'pais_fiscal'           => "México",
                    'estado_fiscal'         => $this->request->getPost('estadofacturacion'),
                    'municipio_fiscal'      => $this->request->getPost('municipiofacturacion'),
                    'cp_fiscal'             => $this->request->getPost('cpfacturacion'),
                    'colonia_fiscal'        => $this->request->getPost('coloniafacturacion'),
                    'callenum_fiscal'       => $this->request->getPost('callefacturacion'),
                    'email_fiscal'          => $this->request->getPost('emailfacturacion'),
                    'encargado_fiscal'      => $this->request->getPost('personafacturacion'),
                    'telefono1_fiscal'      => $this->request->getPost('telefonofacturacion'),
                    'telefono2_fiscal'      => $this->request->getPost('telefonoadicionalfacturacion'),
                    'movil1_fiscal'         => $this->request->getPost('movil1facturacion'),
                    'movil2_fiscal'         => $this->request->getPost('movil2facturacion'),
                    'status_fiscal'         => 1,
                    'usuario_alta_fiscal'   => $idUsuario,
                    'fechahora_alta_fiscal' => date("Y-m-d H:i:s"),
                ];
                $this->generalModel->insertData($fiscalData, "agencias_datos_fiscales");

                
                $documentos = [
                    'altahacienda' => "Alta Hacienda", 'identificacionoficial' => "Identificación Oficial", 
                    'comprobantedomicilio' => "Comprobante Domicilio", 'cartamembretada' => "Carta Membretada", 
                    'cedulaturistica' => "Cédula Turística", 'fotoexterioragencia' => "Foto Exterior", 
                    'fotointerioragencia' => "Foto Interior",
                ];
                
                foreach ($documentos as $key => $alias) {
                    $file = $this->request->getFile($key);
                    if ($file && $file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move($fullPath, $newName);
                        $filePath = $pathSegment . $newName;

                        $documentoData = [
                            'id_agencia'                => $idagencia,
                            'alias_documento'           => $alias,
                            'nombre_oficial_documento'  => $alias,
                            'archivo_documento'         => $filePath,
                            'usuario_alta_documento'    => $idUsuario,
                            'fechahora_alta_documento'  => date("Y-m-d H:i:s"),
                        ];
                        $this->generalModel->insertData($documentoData, "agencias_documentos");
                    }
                }

                $msg = "Success";
            }else{
                $msg = "Error";
            }
        }
        return $this->response->setBody($msg);
    }

    public function ModificarSolicitud($agencia,$token){

        
        $result['plazas'] = $this->generalModel->selectData("*", "cms_plazas", [], [], [], []);
        $result['agencia'] = $this->generalModel->selectData("*", "agencias", ["id_agencia","token_usado_agencia","token_edicion_agencia"], [$agencia,"0",$token], [], []);
        $result['usuarios'] = $this->generalModel->selectData("*", "usuarios", ["id_entidad","tipo_acceso"], [$agencia,"agencia"], [], []);
        $result['fiscales'] = $this->generalModel->selectData("*", "agencias_datos_fiscales", ["id_agencia"], [$agencia], [], []);
        $result['documentos'] = $this->generalModel->selectData("*", "agencias_documentos", ["id_agencia"], [$agencia], [], []);
        $result['idAgencia'] = $agencia;
        $result['token'] = $token;

        $cpAgencia = !empty($result['agencia']) && isset($result['agencia'][0]['codigopostal_agencia']) ? $result['agencia'][0]['codigopostal_agencia'] : null;
        $cpFiscal = !empty($result['fiscales']) && isset($result['fiscales'][0]['cp_fiscal']) ? $result['fiscales'][0]['cp_fiscal'] : null;
        $result["coloniasagencia"] = []; $result["coloniasfiscal"] = [];
        if ($cpAgencia) {
            $result["coloniasagencia"] = $this->generalModel->selectData("*", "colonias", ["codigo_postal"], [$cpAgencia], [], []);
            $result["coloniasfiscal"] = $this->generalModel->selectData("*", "colonias", ["codigo_postal"], [$cpFiscal], [], []);
        }
        
        return view('extranet/agencias/modificarSolicitud', $result);
    }

    public function ModificarSolicitudBD(){

        $idAgencia = $this->request->getPost('idAgencia');
        $dataAgencia = $this->generalModel->selectData("*", "agencias", ["id_agencia"], [$idAgencia], [], []);

        if($dataAgencia[0]['token_usado_agencia'] == 0){
            
            $tokenAgencia = $this->request->getPost('tokenAgencia');
            $idUsuario = $this->request->getPost('idUsuario');

            
            $agenciaData = [
                'alias_agencia'                     => $this->request->getPost('nombrecomercial'),
                'nombre_agencia'                    => $this->request->getPost('nombrecomercial'),
                'plaza_agencia'                     => $this->request->getPost('plaza'),
                'registro_agencia'                  => $this->request->getPost('renatu'),
                'pais_agencia'                      => "México",
                'estado_agencia'                    => $this->request->getPost('estadocontacto'),
                'municipio_agencia'                 => $this->request->getPost('municipiocontacto'),
                'codigopostal_agencia'              => $this->request->getPost('cpcontacto'),
                'callenum_agencia'                  => $this->request->getPost('callecontacto'),
                'colonia_agencia'                   => $this->request->getPost('coloniacontacto'),
                'telefono1_agencia'                 => $this->request->getPost('telefonocontacto'),
                'telefono2_agencia'                 => $this->request->getPost('telefonoadicionalcontacto'),
                'movil1_agencia'                    => $this->request->getPost('movil1contacto'),
                'movil2_agencia'                    => $this->request->getPost('movil2contacto'),    
                'observaciones_agencia'             => $this->request->getPost('otrosdatos'),
                'token_usado_agencia'               => 1,
                'status_agencia'                    => 4,
                'usuario_alta_agencia'              => $idUsuario,
                'fechahora_alta_agencia'            => date("Y-m-d H:i:s"),
                'usuario_modificacion_agencia'      => $idUsuario,
                'fechahora_modificacion_agencia'    => date("Y-m-d H:i:s"),
            ];

            $nombreComercial = str_replace(' ', '', $this->request->getPost('nombrecomercial'));
            $pathSegment = "assets/agencias/" . $nombreComercial . "/";
            $fullPath = FCPATH . $pathSegment; 

            if (!is_dir($fullPath)) {
                mkdir($fullPath, 0775, TRUE);
            }

            
            $logotipo = $this->request->getFile('logotipoagencia');
            if ($logotipo && $logotipo->isValid() && !$logotipo->hasMoved()) {
                $newName = $logotipo->getRandomName();
                $logotipo->move($fullPath, $newName);
                $agenciaData = array_merge($agenciaData, [
                    'logotipo_agencia'  => $pathSegment . $newName,
                ]);
            }

            $this->generalModel->updateData($agenciaData, "agencias", ["id_agencia"], [$idAgencia]);
            
            
            $usuarioData = [
                'alias_usuario'                     => $this->request->getPost('personacontacto'),
                'nombre_usuario'                    => $this->request->getPost('personacontacto'),
                'email_usuario'                     => $this->request->getPost('emailcontacto'),
                'movil_usuario'                     => $this->request->getPost('movil1contacto'),
                'usuario_mod'                       => $idUsuario,
                'fecha_mod'                         => date("Y-m-d H:i:s"),
            ];

            $pwd = $this->request->getPost('passwordagencia');

            if(!empty($pwd)){
                $usuarioData = array_merge($usuarioData, [
                    'pwd_usuario'  => password_hash($pwd, PASSWORD_DEFAULT),
                ]);
            }

            $this->generalModel->updateData($usuarioData, "usuarios", ["id_usuario"], [$idUsuario]);

            
            $fiscalData = [
                'razon_social_fiscal'           => $this->request->getPost('razonsocial'),
                'rfc_fiscal'                    => $this->request->getPost('rfc'),
                'pais_fiscal'                   => "México",
                'estado_fiscal'                 => $this->request->getPost('estadofacturacion'),
                'municipio_fiscal'              => $this->request->getPost('municipiofacturacion'),
                'cp_fiscal'                     => $this->request->getPost('cpfacturacion'),
                'colonia_fiscal'                => $this->request->getPost('coloniafacturacion'),
                'callenum_fiscal'               => $this->request->getPost('callefacturacion'),
                'email_fiscal'                  => $this->request->getPost('emailfacturacion'),
                'encargado_fiscal'              => $this->request->getPost('personafacturacion'),
                'telefono1_fiscal'              => $this->request->getPost('telefonofacturacion'),
                'telefono2_fiscal'              => $this->request->getPost('telefonoadicionalfacturacion'),
                'movil1_fiscal'                 => $this->request->getPost('movil1facturacion'),
                'movil2_fiscal'                 => $this->request->getPost('movil2facturacion'),
                'status_fiscal'                 => 1,
                'usuario_modificacion_fiscal'   => $idUsuario,
                'fechahora_modificacion_fiscal' => date("Y-m-d H:i:s"),
            ];

            $this->generalModel->updateData($fiscalData, "agencias_datos_fiscales", ["id_agencia"], [$idAgencia]);

            
            $documentos = [
                'altahacienda' => "Alta Hacienda", 'identificacionoficial' => "Identificación Oficial", 
                'comprobantedomicilio' => "Comprobante Domicilio", 'cartamembretada' => "Carta Membretada", 
                'cedulaturistica' => "Cédula Turística", 'fotoexterioragencia' => "Foto Exterior", 
                'fotointerioragencia' => "Foto Interior",
            ];
            
            foreach ($documentos as $key => $alias) {
                $file = $this->request->getFile($key);
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move($fullPath, $newName);
                    $filePath = $pathSegment . $newName;

                    $documentoData = [
                        'archivo_documento'                 => $filePath,
                        'usuario_modificacion_documento'    => $idUsuario,
                        'fechahora_modificacion_documento'  => date("Y-m-d H:i:s"),
                    ];

                    $this->generalModel->updateData($documentoData, "agencias_documentos", ["nombre_oficial_documento","id_agencia"], [$alias,$idAgencia]);
                }
            }

            if (ob_get_length()) ob_clean();
            $msg = "Success";
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }
}