<?php

namespace App\Controllers;


use App\Models\GeneralModel;

class ExtCobros extends BaseController
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

            $output = view('extranet/header',$user);
            $output .= view('extranet/cobros/administrar');
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    public function CronosPay()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $output = view('extranet/header',$user);
            $output .= view('extranet/cobros/cronospay');
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    function ObtenerReserva(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $arrWhere = ["folio_reservacion"];
            $arrCond = [$data['localizador']];
            
            $result = $this->generalModel->selectData(
                "reservaciones.*, hoteles.nombre_hotel", 
                "reservaciones",
                $arrWhere, 
                $arrCond, 
                ["hoteles"], 
                ["hoteles.id_hotel = reservaciones.hotel_reservacion"]
            );

            $response = [];
            if (!empty($result)) {
                $response = ["msg" => "Success", 'reservacion' => $result];
            } else {
                $response = ["msg" => "Error"];
            }
            
            return $this->response->setJSON($response);
        }else{
            return redirect()->to(base_url());
        }
    }

    function ProcesarPago(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $Array = [
                'id_reservacion'                => $data['cobro_reservacion'],
                'nombre_tarjetahabiente'        => $data['nombre'],
                'apellido_tarjetahabiente'          => $data['apellido'],
                'email_contacto'                    => $data['email'],
                'movil_contacto'                    => $data['movil'],
                'estado'                            => $data['estado_cronosPay'],
                'ciudad'                            => $data['municipio_cronosPay'],
                'codigo_postal'                     => $data['cp_cronosPay'],
                'domicilio'                     => $data['domicilio'],
                'tipo_tarjeta'                  => $data['tipoTarjeta'],
                'banco_emisor'                  => $data['banco'],
                'plazo_pago'                    => $data['plazo'],
                'monto_base'                    => $data['cobro_monto'],
                'monto_sobretasa'               => "0",
                'monto_total_pagado'            => $data['cobro_monto'],
                'estatus_transaccion '          => 1,
                'usuario_registro'              => $datosUsuario['id_usuario'], 
                'fecha_registro'                => date("Y-m-d H:i:s"),
            ];

            $fromtable = "cronospay_transacciones";

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

    public function CronosPayLink()
    {
        if($this->session->get("loggedInNaturleon")){

            $datosUsuario = $this->session->get('loggedInNaturleon');

            $user = [
                'usuario' => $datosUsuario,
            ];

            $result["agencias"] = $this->generalModel->selectData(
                "*", 
                "agencias", 
                ["status_agencia"], ["1"], [], []
            );

            $result["links"] = $this->generalModel->selectData(
                "*", 
                "cronospay_links", 
                ["estatus_logico"], ["1"], [], []
            );

            $output = view('extranet/header',$user);
            $output .= view('extranet/cobros/cronospaylink',$result);
            $output .= view('extranet/footer');

            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    function GuardarLinkPago(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $link = $data['id_link'];
            $datosUsuario = $this->session->get('loggedInNaturleon');

            $urlPago = base_url()."LinkPago/".bin2hex(random_bytes(4));

            $fromtable = "cronospay_links";
            
            $Array = [
                'id_agencia'                    => $data['agencia_id'],
                'id_reservacion'                => $data['link_reservacion'],
                'folio_reservacion'             => $data['link_localizador'],
                'hotel_reservacion'             => $data['link_hotel'],
                'titular_reservacion'           => $data['link_titular_reservacion'],
                'monto_pagar'                   => $data['link_monto'],
                'whatsapp'                      => $data['whatsapp'],
                'email'                         => $data['email'],
                'token_seguridad'               => bin2hex(random_bytes(4)),
                'url_pago'                      => $urlPago,
                'estatus_logico'                => 1,
                'estatus_pago'                  => 0,
            ];

            if($link == 0){
                $Array['usuario_alta'] = $datosUsuario['id_usuario'];
                $Array['fecha_alta'] = date("Y-m-d H:i:s");
                $id = $this->generalModel->insertDataReturn($Array, $fromtable);
            }else{
                $Array['usuario_mod'] = $datosUsuario['id_usuario'];
                $Array['fecha_mod'] = date("Y-m-d H:i:s");
                $arrWhere = ["id_link"]; 
                $arrCond = [$link]; 
                    
                $id = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);
            }

            $msg = "Error"; 

            if ($id) {
                $msg = "Success";
            }
            
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    function DesactivarLink(){
        $request = $this->request;
        
        if ($this->session->get('loggedInNaturleon')) {
            
            $id = $request->getPost('id');

            $array = [
                "estatus_logico" => 0,
            ];

            $fromtable = "cronospay_links";
            $arrWhere = ["id_link"]; 
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

    function ObtenerLink(){
        if($this->session->get('loggedInNaturleon')){
            $data = $this->request->getPost();

            $arrWhere = ["id_link "];
            $arrCond = [$data['id']];
            
            $result = $this->generalModel->selectData(
                "*", 
                "cronospay_links",
                $arrWhere, 
                $arrCond, 
                [], 
                []
            );

            $response = [];
            if (!empty($result)) {
                $response = ["msg" => "Success", 'link' => $result];
            } else {
                $response = ["msg" => "Error"];
            }
            
            return $this->response->setJSON($response);
        }else{
            return redirect()->to(base_url());
        }
    }
}