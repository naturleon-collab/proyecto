<?php

namespace App\Controllers;


use App\Models\GeneralModel;

class ExtReservaciones extends BaseController
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

            // Seleccionamos campos de la reserva, agencia, hotel, habitación y plan
            $columnas = "reservaciones.*, 
                        agencias.nombre_agencia, 
                        hoteles.nombre_hotel, 
                        hoteles_habitaciones.nombre_habitacion, 
                        hoteles_tipos_planes.nombre_tipo_plan";
            
            $tabla = "reservaciones";
            
            // Joins dinámicos para traer toda la información descriptiva
            $joins = ["agencias", "hoteles", "hoteles_habitaciones", "hoteles_tipos_planes"];
            $condsJoin = [
                "agencias.id_agencia = reservaciones.id_agencia_reservacion",
                "hoteles.id_hotel = reservaciones.hotel_reservacion",
                "hoteles_habitaciones.id_habitacion = reservaciones.habitacion_reservacion",
                "hoteles_tipos_planes.id_tipo_plan = reservaciones.plan_reservacion"
            ];
            
            $reservas = $this->generalModel->selectData(
                $columnas, 
                $tabla, 
                [], 
                [], 
                $joins, 
                $condsJoin, 
                ['fecha_creacion_reservacion' => 'DESC']
            );

            $data = [
                'usuario' => $datosUsuario,
                'reservas' => $reservas
            ];

            $output = view('extranet/header', $data);
            $output .= view('extranet/reservaciones/ver', $data);
            $output .= view('extranet/footer');

            return $output;
        } else {
            return redirect()->to(base_url());
        }
    }
}