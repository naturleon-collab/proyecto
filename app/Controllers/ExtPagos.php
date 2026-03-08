<?php

namespace App\Controllers;


use App\Models\GeneralModel;

class ExtPagos extends BaseController
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
    
    public function Proveedores()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["hoteles"] = $this->generalModel->selectData(
                "*", "hoteles", [], [], [], []
            );

            $result["charters"] = $this->generalModel->selectData(
                "*", "naturcharter", [], [], [], []
            );

            $result["flights"] = $this->generalModel->selectData(
                "*", "naturflight", [], [], [], []
            );

            $result["tours"] = $this->generalModel->selectData(
                "*", "tours", [], [], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/pagos/proveedores',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function HistorialProveedores()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["hoteles"] = $this->generalModel->selectData(
                "*", "hoteles", [], [], [], []
            );

            $result["charters"] = $this->generalModel->selectData(
                "*", "naturcharter", [], [], [], []
            );

            $result["flights"] = $this->generalModel->selectData(
                "*", "naturflight", [], [], [], []
            );

            $result["tours"] = $this->generalModel->selectData(
                "*", "tours", [], [], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/pagos/historialproveedores',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Agencias()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["agencias"] = $this->generalModel->selectData(
                "*", "agencias", [], [], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/pagos/agencias',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function HistorialAgencias()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["agencias"] = $this->generalModel->selectData(
                "*", "agencias", [], [], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/pagos/historialagencias',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }
}