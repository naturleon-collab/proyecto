<?php

namespace App\Controllers;

use App\Models\GeneralModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class ExtDestinos extends BaseController
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
            
            $arrWhere = ["tipo_destino"];
            $arrCond = ["Nacional"];
            $arrJoin = [];
            $arrCondJoin = [];

            $data['destinosnacionales'] = $this->generalModel->selectData(
                "*", 
                "destinos", 
                $arrWhere, 
                $arrCond, 
                $arrJoin, 
                $arrCondJoin
            );

            
            $arrWhere = ["tipo_destino"];
            $arrCond = ["Internacional"];
            

            $data['destinosinternacionales'] = $this->generalModel->selectData(
                "*", 
                "destinos", 
                $arrWhere, 
                $arrCond, 
                $arrJoin, 
                $arrCondJoin
            );
            
            
            $output = view('extranet/header',$user);
            $output .= view('extranet/destinos/administrar', $data);
            $output .= view('extranet/footer');
            
            return $output;
        }else{
            return redirect()->to(base_url());
        }
    }

    
    public function Administrar()
    {
        if($this->session->get("loggedInNaturleon")){
            $destino = $this->request->getPost('destino');
            $fromtable = "destinos";

            $datosUsuario = $this->session->get('loggedInNaturleon');

            if ($destino != 0) {
                
                $Array = [
                    'nombre_destino'                => $this->request->getPost('nombredestino'),
                    'abrev_destino'                 => $this->request->getPost('abrevdestino'),
                    'iata_destino'                  => $this->request->getPost('iatadestino'),
                    'aereo_destino'                 => $this->request->getPost('aerodestino'),
                    'charter_destino'               => $this->request->getPost('charterdestino'),
                    'hoteleria_destino'             => $this->request->getPost('hoteleriadestino'),
                    'traslado_destino'              => $this->request->getPost('trasladodestino'),
                    'actividades_destino'           => $this->request->getPost('actividadesdestino'),
                    'naturflight_destino'           => $this->request->getPost('naturflightdestino'),
                    'mbp_destino'                   => $this->request->getPost('mpbdestino'),
                    'tipo_destino'                  => $this->request->getPost('tipodestino'),
                    'status_destino'                => $this->request->getPost('statusdestino'),
                    'usuario_modificacion_destino'  => $datosUsuario['id_usuario'], 
                    'fechahora_modificacion_destino'=> date("Y-m-d H:i:s"),
                ];

                $arrWhere = ["id_destino"];
                $arrCond = [$destino];

                $result = $this->generalModel->updateData($Array, $fromtable, $arrWhere, $arrCond);

            } else {
                
                $Array = [
                    'nombre_destino'                => $this->request->getPost('nombredestino'),
                    'abrev_destino'                 => $this->request->getPost('abrevdestino'),
                    'iata_destino'                  => $this->request->getPost('iatadestino'),
                    'aereo_destino'                 => $this->request->getPost('aerodestino'),
                    'charter_destino'               => $this->request->getPost('charterdestino'),
                    'hoteleria_destino'             => $this->request->getPost('hoteleriadestino'),
                    'traslado_destino'              => $this->request->getPost('trasladodestino'),
                    'actividades_destino'           => $this->request->getPost('actividadesdestino'),
                    'naturflight_destino'           => $this->request->getPost('naturflightdestino'),
                    'mbp_destino'                   => $this->request->getPost('mpbdestino'),
                    'tipo_destino'                  => $this->request->getPost('tipodestino'),
                    'status_destino'                => $this->request->getPost('statusdestino'),
                    'usuario_alta_destino'          => $datosUsuario['id_usuario'], 
                    'fechahora_alta_destino'        => date("Y-m-d H:i:s"),
                ];

                $result = $this->generalModel->insertData($Array, $fromtable);
            }

            $msg = $result ? "Success" : "Error";
            
            return $this->response->setBody($msg);
        }else{
            return redirect()->to(base_url());
        }
    }

    public function Data()
    {
        if($this->session->get("loggedInNaturleon")){
            $idDestino = $this->request->getPost('destino');
            $fromtable = "destinos";

            $arrWhere = ["id_destino"];
            $arrCond = [$idDestino];
            $arrJoin = [];
            $arrCondJoin = [];

            $result["destino"] = $this->generalModel->selectData(
                "*", 
                $fromtable, 
                $arrWhere, 
                $arrCond, 
                $arrJoin, 
                $arrCondJoin
            );

            if (!empty($result["destino"])) {
                $array = ["msg" => "Success", "destino" => $result["destino"]];
            } else {
                $array = ["msg" => "Error"];
            }
            
            return $this->response->setJSON($array);
        }else{
            return redirect()->to(base_url());
        }
    }
}