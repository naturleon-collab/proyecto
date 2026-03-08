<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GeneralModel;
use CodeIgniter\Files\File;

class CmsFrontpage extends BaseController
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

    
    public function DataModificar()
    {
        if($this->session->get("loggedInNaturleon")){
            $db = $this->request->getPost('db');
            $namefield = $this->request->getPost('namefield');
            $id = $this->request->getPost('id');
            $nameresult = $this->request->getPost('nameresult');

            $columnselect = "*";
            $fromtable = $db;

            $arrWhere = [$namefield];
            $arrCond = [$id];
            $arrJoin = [];
            $arrCondJoin = [];

            $result[$nameresult] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

            if (!empty($result[$nameresult])) {
                $array = ["msg" => "Success", $nameresult => $result[$nameresult]];
            } else {
                $array = ["msg" => "Error"];
            }

            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function StatusSlider()
    {
        if($this->session->get("loggedInNaturleon")){
            $status = $this->request->getPost('status');
            $id = $this->request->getPost('id');

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $array = [
                'status_slider' => $status,
                'usuario_modificacion_slider' => $datosUsuario['id_usuario'],
                'fechahora_modificacion_slider' => date("Y-m-d H:i:s"),
            ];

            $fromtable = "cms_slider";
            $arrWhere = ["id_slider"];
            $arrCond = [$id];

            $result = $this->generalModel->updateData($array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                $msg = "Success";
            } else {
                $msg = "Error";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    

    public function Slider()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $columnselect = "*";
            $fromtable = "cms_slider";

            $arrWhere = [];
            $arrCond = [];
            $arrJoin = [];
            $arrCondJoin = [];

            $data['sliders'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

            $output = view('extranet/header',$user);
            $output .= view('cms/frontpage/slider', $data);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Plazas()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $columnselect = "*";
            $fromtable = "cms_plazas";

            $arrWhere = [];
            $arrCond = [];
            $arrJoin = [];
            $arrCondJoin = [];

            $data['plazas'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

            $output = view('extranet/header',$user);
            $output .= view('cms/frontpage/plazas', $data);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Nosotros()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            
            $columnselect = "*";
            $fromtable = "cms_nosotros";
            $data['nosotros'] = $this->generalModel->selectData($columnselect, $fromtable, [], [], [], []);

            
            $columnselect = "*";
            $fromtable = "cms_nosotros_valores";
            $data['valores'] = $this->generalModel->selectData($columnselect, $fromtable, [], [], [], []);

            $output = view('extranet/header',$user);
            $output .= view('cms/frontpage/nosotros', $data);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Aviso()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            
            $columnselect = "*";
            $fromtable = "cms_aviso_banner";
            $data['banner'] = $this->generalModel->selectData($columnselect, $fromtable, [], [], [], []);

            
            $columnselect = "*";
            $fromtable = "cms_aviso";
            $data['avisos'] = $this->generalModel->selectData($columnselect, $fromtable, [], [], [], []);

            $output = view('extranet/header',$user);
            $output .= view('cms/frontpage/aviso', $data);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function MBP()
    {
        $db = \Config\Database::connect();

        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            




            $columnselect = "*";
            $fromtable = "mbp_imagenes_landing";
            
            $arrWhere = ["ubicacion"];
            $arrCond = ["header"];
            $arrOrder = ["orden" => "ASC"];
            $data['imagenes_header'] = $this->generalModel->selectData(
                $columnselect,
                $fromtable,
                $arrWhere,
                $arrCond,
                [],
                [],
                $arrOrder
            );

            $data['imagenes_header'] = empty($data['imagenes_header']) ? [] : $data['imagenes_header'];

            
            $arrWhere = ["ubicacion"];
            $arrCond = ["slider"];
            $arrOrder = ["orden" => "ASC"];
            $data['imagenes_sliders'] = $this->generalModel->selectData(
                $columnselect,
                $fromtable,
                $arrWhere,
                $arrCond,
                [],
                [],
                $arrOrder
            );

            $data['imagenes_sliders'] = empty($data['imagenes_sliders']) ? [] : $data['imagenes_sliders'];

            
            $data['mbp_textos_footer'] = $this->generalModel->selectData(
                "id_mbp_texto, texto_mbp, ubicacion_mbp_texto",
                "mbp_textos",
                [],
                [],
                [],
                [],
                []
            );

            $data['imagenes_footer'] = empty($data['imagenes_footer']) ? [] : $data['imagenes_footer'];

            
            $arrWhere = ["ubicacion"];
            $arrCond = ["footer"];
            $arrOrder = ["orden" => "ASC"];
            $data['imagenes_footer'] = $this->generalModel->selectData(
                $columnselect,
                $fromtable,
                $arrWhere,
                $arrCond,
                [],
                [],
                $arrOrder
            );

            $data['imagenes_footer'] = empty($data['imagenes_footer']) ? [] : $data['imagenes_footer'];

            $output = view('extranet/header',$user);
            $output .= view('cms/frontpage/mbp', $data);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    

    
    public function AdministrarSlider()
    {
        if($this->session->get("loggedInNaturleon")){
            $slider = $this->request->getPost('idSlider');
            $msg = "Error"; 

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($slider == 0) {
                
                $path = FCPATH . "assets/cms/slider/";

                $file = $this->request->getFile('archivoSlider');

                if ($file && $file->isValid() && !$file->hasMoved()) {

                    
                    if (!is_dir($path)) {
                        mkdir($path, 0775, true);
                    }

                    
                    $newName = $file->getRandomName();
                    $file->move($path, $newName);
                    $fullPath = "assets/cms/slider/" . $newName;

                    
                    $image = \Config\Services::image();
                    $image->withFile($path . $newName)
                        ->resize(1920, 900, false, 'auto')
                        ->save($path . $newName);

                    $Array = [
                        'imagen_slider'           => $fullPath,
                        'nombre_slider'           => $this->request->getPost('nombreSlider'),
                        'desde_slider'            => $this->request->getPost('desdeSlider'),
                        'hasta_slider'            => $this->request->getPost('hastaSlider'),
                        'usuario_alta_slider'     => $datosUsuario['id_usuario'],
                        'fechahora_alta_slider'   => date("Y-m-d H:i:s"),
                    ];

                    $result = $this->generalModel->insertData($Array, "cms_slider");
                    if ($result) {
                        $msg = "Success";
                    }
                }
            } else {
                
                $path = FCPATH . "assets/cms/slider/";
                $file = $this->request->getFile('archivoSlider');

                $Array = [
                    'nombre_slider'           => $this->request->getPost('nombreSlider'),
                    'desde_slider'            => $this->request->getPost('desdeSlider'),
                    'hasta_slider'            => $this->request->getPost('hastaSlider'),
                    'usuario_modificacion_slider' => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_slider' => date("Y-m-d H:i:s"),
                ];

                if ($file && $file->isValid() && !$file->hasMoved()) {
                    if (!is_dir($path)) {
                        mkdir($path, 0775, true);
                    }
                    $newName = $file->getRandomName();
                    $file->move($path, $newName);
                    $fullPath = "assets/cms/slider/" . $newName;

                    $image = \Config\Services::image();
                    $image->withFile($path . $newName)
                        ->resize(1920, 900, false, 'auto')
                        ->save($path . $newName);

                    $Array['imagen_slider'] = $fullPath;
                }

                $fromtable = "cms_slider";
                $arrWhere = ["id_slider"];
                $arrCond = [$slider];

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

                if ($result) {
                    $msg = "Success";
                }
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarPlazas()
    {
        if($this->session->get("loggedInNaturleon")){
            $plaza = $this->request->getPost('idPlaza');
            $msg = "Error";
            $fromtable = "cms_plazas";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($plaza == 0) {
                
                $Array = [
                    'nombre_plaza'           => $this->request->getPost('nombrePlaza'),
                    'correo_plaza'           => $this->request->getPost('correoPlaza'),
                    'telefono_plaza'         => $this->request->getPost('telefonoPlaza'),
                    'ubicacion_plaza'        => $this->request->getPost('ubicacionPlaza'),
                    'usuario_alta_plaza'     => $datosUsuario['id_usuario'],
                    'fechahora_alta_plaza'   => date("Y-m-d H:i:s"),
                ];

                $result = $this->generalModel->insertData($Array, $fromtable);
            } else {
                
                $Array = [
                    'nombre_plaza'           => $this->request->getPost('nombrePlaza'),
                    'correo_plaza'           => $this->request->getPost('correoPlaza'),
                    'telefono_plaza'         => $this->request->getPost('telefonoPlaza'),
                    'ubicacion_plaza'        => $this->request->getPost('ubicacionPlaza'),
                    'usuario_modificacion_plaza' => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_plaza' => date("Y-m-d H:i:s"),
                ];

                $arrWhere = ["id_plaza"];
                $arrCond = [$plaza];
                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarNosotros()
    {
        if($this->session->get("loggedInNaturleon")){
            $path = FCPATH . "assets/cms/nosotros/";
            $msg = "Error";
            $file = $this->request->getFile('archivoNosotros');

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'mision_nosotros'           => $this->request->getPost('misionNosotros'),
                'vision_nosotros'           => $this->request->getPost('visionNosotros'),
                'usuario_modificacion_nosotros' => $datosUsuario['id_usuario'],
                'fechahora_modificacion_nosotros' => date("Y-m-d H:i:s"),
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir($path)) {
                    mkdir($path, 0775, true);
                }
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $fullPath = "assets/cms/nosotros/" . $newName;
                $Array['banner_nosotros'] = $fullPath;
            }

            $fromtable = "cms_nosotros";
            $arrWhere = ["id_nosotros"];
            $arrCond = [1];

            $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarValores()
    {
        if($this->session->get("loggedInNaturleon")){
            $valor = $this->request->getPost('idValor');
            $msg = "Error";
            $fromtable = "cms_nosotros_valores";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($valor == 0) {
                
                $Array = [
                    'texto_valor'           => $this->request->getPost('textoValor'),
                    'usuario_alta_valor'    => $datosUsuario['id_usuario'],
                    'fechahora_alta_valor'  => date("Y-m-d H:i:s"),
                ];
                $result = $this->generalModel->insertData($Array, $fromtable);
            } else {
                
                $Array = [
                    'texto_valor'           => $this->request->getPost('textoValor'),
                    'usuario_modificacion_valor' => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_valor' => date("Y-m-d H:i:s"),
                ];

                $arrWhere = ["id_valor"];
                $arrCond = [$valor];
                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarBannerAviso()
    {
        if($this->session->get("loggedInNaturleon")){
            $path = FCPATH . "assets/cms/aviso/";
            $msg = "Error";
            $file = $this->request->getFile('archivoAviso');

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'titulo_aviso'           => $this->request->getPost('tituloAvisoBanner'),
                'texto_aviso'            => $this->request->getPost('textoAvisoBanner'),
                'usuario_modificacion_aviso' => $datosUsuario['id_usuario'],
                'fechahora_modificacion_aviso' => date("Y-m-d H:i:s"),
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir($path)) {
                    mkdir($path, 0775, true);
                }
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $fullPath = "assets/cms/aviso/" . $newName;
                $Array['archivo_aviso'] = $fullPath;
            }

            $fromtable = "cms_aviso_banner";
            $arrWhere = ["id_aviso_banner"];
            $arrCond = [1];

            $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarAvisos()
    {
        if($this->session->get("loggedInNaturleon")){
            $aviso = $this->request->getPost('idAviso');
            $msg = "Error";
            $fromtable = "cms_aviso";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($aviso == 0) {
                
                $Array = [
                    'titulo_aviso'           => $this->request->getPost('tituloAviso'),
                    'texto_aviso'            => $this->request->getPost('textoAviso'),
                    'usuario_alta_aviso'     => $datosUsuario['id_usuario'],
                    'fechahora_alta_aviso'   => date("Y-m-d H:i:s"),
                ];
                $result = $this->generalModel->insertData($Array, $fromtable);
            } else {
                
                $Array = [
                    'titulo_aviso'           => $this->request->getPost('tituloAviso'),
                    'texto_aviso'            => $this->request->getPost('textoAviso'),
                    'usuario_modificacion_aviso' => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_aviso' => date("Y-m-d H:i:s"),
                ];

                $arrWhere = ["id_aviso"];
                $arrCond = [$aviso];
                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }

    }

    
    public function AdministrarLogoMBP()
    {
        $request = $this->request;

        if($this->session->get("loggedInNaturleon")) {
            $url = $this->request->getPost('urlLogoMBP');
            $ubicacion = $this->request->getPost('ubicacion');
            $path = FCPATH . "assets/cms/mbp/";
            $msg = "Error";
            $file = $request->getFile('archivoLogoMBP');
            $datosUsuario = $this->session->get('loggedInNaturleon');

            $data = [
                'imagen_landing' => null,
                'ubicacion' => $ubicacion,
                'url' => $url,
                'status_image_landing' => 1,
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir($path)) mkdir($path, 0775, true);

                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $fullPath = "assets/cms/mbp/" . $newName;
                $data['imagen_landing'] = $fullPath;
            }

            $fromtable = "mbp_imagenes_landing";

            $result = $this->generalModel->insertData($data, $fromtable);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarSliderMBP()
    {
        $request = $this->request;

        if($this->session->get("loggedInNaturleon")) {
            $orden = $this->request->getPost('ordenSliderMBP');
            $ubicacion = $this->request->getPost('ubicacion');
            $path = FCPATH . "assets/cms/mbp/";
            $msg = "Error";
            $file = $request->getFile('archivoSliderMBP');
            $datosUsuario = $this->session->get('loggedInNaturleon');

            $data = [
                'imagen_landing' => null,
                'orden' => $orden,
                'ubicacion' => $ubicacion,
                'status_image_landing' => 1,
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir($path)) mkdir($path, 0775, true);

                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $fullPath = "assets/cms/mbp/" . $newName;
                $data['imagen_landing'] = $fullPath;
            }

            $fromtable = "mbp_imagenes_landing";

            $result = $this->generalModel->insertData($data, $fromtable);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarTextoFooterMBP()
    {
        $request = $this->request;

        if($this->session->get("loggedInNaturleon")) {
            $idTextoFooterMBP = $this->request->getPost('idTextoFooterMBP');
            $textoFooterMBP = $this->request->getPost('textoFooterMBP');
            $rdBtnFooterMBP = $this->request->getPost('rdBtnFooterMBP');
            $datosUsuario = $this->session->get('loggedInNaturleon');
            $fromtable = "mbp_textos";
            $fechaActual = date("Y-m-d H:i:s");

            if(empty($idTextoFooterMBP)) {
                $data = [
                    'texto_mbp' => $textoFooterMBP,
                    'ubicacion_mbp_texto' => $rdBtnFooterMBP,
                    'usuario_mbp_texto' => $datosUsuario['id_usuario'],
                    'fechahora_mbp_texto' => $fechaActual,
                ];

                $result = $this->generalModel->insertData($data, $fromtable);
            } else {
                $data = [
                    'texto_mbp' => $textoFooterMBP,
                    'ubicacion_mbp_texto' => $rdBtnFooterMBP,
                    'usuario_modificacion_mbp_texto' => $datosUsuario['id_usuario'],
                    'fechahora_modificacion_mbp_texto' => $fechaActual,
                ];

                $arrWhere = ["id_mbp_texto"];
                $arrCond = [$idTextoFooterMBP];

                $result = $this->generalModel->updateData($data, $fromtable, $arrWhere, $arrCond);
            }

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function EliminarTextoFooterMBP()
    {
        $request = $this->request;

        if($this->session->get("loggedInNaturleon")) {
            $id = $this->request->getPost('id');
            $fromtable = "mbp_textos";
            $arrWhere = ["id_mbp_texto"];
            $arrCond = [$id];

            $result = $this->generalModel->deleteData($fromtable, $arrWhere, $arrCond);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    
    public function AdministrarFooterMBP()
    {
        $request = $this->request;

        if($this->session->get("loggedInNaturleon")) {
            $url = $this->request->getPost('urlFooterMBP');
            $ubicacion = $this->request->getPost('ubicacion');
            $path = FCPATH . "assets/cms/mbp/";
            $msg = "Error";
            $file = $request->getFile('archivoFooterMBP');
            $datosUsuario = $this->session->get('loggedInNaturleon');

            $data = [
                'imagen_landing' => null,
                'ubicacion' => $ubicacion,
                'url' => $url,
                'status_image_landing' => 1,
            ];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir($path)) mkdir($path, 0775, true);

                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $fullPath = "assets/cms/mbp/" . $newName;
                $data['imagen_landing'] = $fullPath;
            }

            $fromtable = "mbp_imagenes_landing";

            $result = $this->generalModel->insertData($data, $fromtable);

            if ($result) {
                $msg = "Success";
            }

            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }

    
    public function CambiarStatusImagenMBP()
    {
        if($this->session->get("loggedInNaturleon")){
            $status = $this->request->getPost('status');
            $id = $this->request->getPost('id');
            $status = $status == 1 ? 2 : 1;

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $array = [
                'status_image_landing' => $status,
                'usuario_modificacion_landing' => $datosUsuario['id_usuario'],
                'fechahora_modificacion_landing_imagen' => date("Y-m-d H:i:s"),
            ];

            $fromtable = "mbp_imagenes_landing";
            $arrWhere = ["id_imagen_landing"];
            $arrCond = [$id];

            $result = $this->generalModel->updateData($array, $fromtable, $arrWhere, $arrCond);

            if ($result) {
                $msg = "Success";
            } else {
                $msg = "Error";
            }

            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

}