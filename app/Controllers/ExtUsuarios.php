<?php

namespace App\Controllers;

use App\Models\GeneralModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class ExtUsuarios extends BaseController
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

        $user = $this->session->get('loggedInNaturleon');
        if (!$user || $user['tipo_usuario'] !== 'admin') {
            $this->session->remove('loggedInNaturleon');
            $this->session->remove('idupdate');
            header('Location: ' . base_url());
            exit(); 
        }
    }

    public function index() {
        if($this->session->get("loggedInNaturleon")){
            $datosUsuario = $this->session->get('loggedInNaturleon');
            $user = ['usuario' => $datosUsuario];

            $arrJoin = ["agencias", "hoteles"];
            $arrCondJoin = [
                "usuarios.id_entidad = agencias.id_agencia",
                "usuarios.id_entidad = hoteles.id_hotel"
            ];

            $arrTypeJoin = ["left", "left"]; 

            $campos = "usuarios.*, agencias.nombre_agencia, hoteles.nombre_hotel";

            $data['usuarios'] = $this->generalModel->selectData(
                $campos, 
                "usuarios", 
                [],
                [],
                $arrJoin, 
                $arrCondJoin,
                [],
                $arrTypeJoin
            );

            $output = view('extranet/header', $user);
            $output .= view('extranet/usuarios/administrar', $data);
            $output .= view('extranet/footer');
            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function CargarHoteles(){
        if($this->session->get('loggedInNaturleon')){
            $result = $this->generalModel->selectData("id_hotel,nombre_hotel", "hoteles", [], [], [], []);
            $array = array("hoteles" => $result);
            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function CargarAgencias(){
        if($this->session->get('loggedInNaturleon')){
            $result = $this->generalModel->selectData("id_agencia,nombre_agencia", "agencias", [], [], [], []);
            $array = array("agencias" => $result);
            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function DataUsuario(){
        if($this->session->get('loggedInNaturleon')){
            $id = $this->request->getPost('id');
            $result = $this->generalModel->selectData("*", "usuarios", ["id_usuario"], [$id], [], []);
            if(!empty($result)){
                $array = array("usuario" => $result[0]);
            } else {
                $array = array("usuario" => null);
            }
            return $this->response->setJSON($array);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function AdministrarUsuario(){

        if (!$this->session->get('loggedInNaturleon')) {
            return redirect()->to(base_url());
        }

        $datosUsuario = $this->session->get('loggedInNaturleon');

        $id_usuario = $this->request->getPost('id_usuario');

        $data = [
            'nombre_usuario'   => $this->request->getPost('nombre_usuario'),
            'alias_usuario'    => $this->request->getPost('alias_usuario'),
            'tipo_acceso'      => $this->request->getPost('tipo_acceso'),
            'id_entidad'       => $this->request->getPost('id_entidad') ?? 0,
            'email_usuario'    => $this->request->getPost('email_usuario'),
            'login_usuario'    => $this->request->getPost('login_usuario'),
            'movil_usuario'    => $this->request->getPost('movil_usuario'),
            'cumple_usuario'   => $this->request->getPost('cumple_usuario'),
            'status_usuario'   => 1
        ];

        $password = $this->request->getPost('pwd_usuario');
        if (!empty($password)) {
            $data['pwd_usuario'] = password_hash($password, PASSWORD_DEFAULT); 
        }

        if ($id_usuario == 0 || $id_usuario == "") {
            $data['usuario_alta'] = $datosUsuario['id_usuario'];
            $data['fecha_alta'] = date("Y-m-d H:i:s");
            $result = $this->generalModel->insertData($data, "usuarios");
        } else {
            $data['usuario_mod'] = $datosUsuario['id_usuario'];
            $data['fecha_mod'] = date("Y-m-d H:i:s");
            $arrWhere = ['id_usuario'];
            $arrCond = [$id_usuario];
            $result = $this->generalModel->updateData($data, "usuarios", $arrWhere, $arrCond);
        }

        if ($result) {
            return "Success";
        } else {
            return "Error";
        }
    }

    public function CambiarEstado(){
        if ($this->session->get("loggedInNaturleon")) {

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'status_usuario' => $this->request->getPost('estado'),
                'usuario_mod'  => $datosUsuario['id_usuario'],
                'fecha_mod'=> date("Y-m-d H:i:s"),
            ];

            $fromtable = "usuarios";

            $arrWhere = ["id_usuario"];
            $arrCond = [$this->request->getPost('id')];
            
            $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            $msg = $result ? "Success" : "Error";
            
            return $this->response->setBody($msg);
        } else {
            return redirect()->to(base_url());
        }
    }
}