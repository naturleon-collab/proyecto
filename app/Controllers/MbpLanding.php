<?php

namespace App\Controllers;

use App\Models\GeneralModel;

class MbpLanding extends BaseController
{
    protected $generalModel;

    public function __construct()
    {
        $this->generalModel = new GeneralModel();
    }
    
    public function index()
    {

        //Obtener mbp_zonas
        $arrWhere = ["status_zona"];
        $arrCond = ["1"];
        $result['zonas'] = $this->generalModel->selectData(
            "id_mbp_zona, nombre_zona",
            "mbp_zonas",
            $arrWhere,
            $arrCond,
            [],
            []
        );

        //Obtener los destinos de cada zona
        if ($result['zonas']) {
            foreach ($result['zonas'] as &$zona) {
                $arrWhere = ["id_mbp_zona", "mbp_destino"];
                $arrCond = [$zona['id_mbp_zona'], "1"];

                $zona['destinos'] = $this->generalModel->selectData(
                    "id_destino, nombre_destino",
                    "destinos",
                    $arrWhere,
                    $arrCond,
                    [],
                    []
                );

                $zona['destinos'] = empty($zona['destinos']) ? [] : $zona['destinos'];
            }
        }

        //Obtener imagenes activas para el carrusel y ordenadas por columna orden
        $arrWhere = ["ubicacion", "status_image_landing"];
        $arrCond = ["slider", "1"];
        $arrOrder = ["orden" => "ASC"];
        $arrJoin = [];
        $arrCondJoin = [];

        $result['imagenes_slider'] = $this->generalModel->selectData(
            "*",
            "mbp_imagenes_landing",
            $arrWhere,
            $arrCond,
            $arrJoin,
            $arrCondJoin,
            $arrOrder
        );

        $result['imagenes_slider'] = empty($result['imagenes_slider']) ? [] : $result['imagenes_slider'];

        //Obtener imagen encabezado e informacion del footer
        $result = array_merge(
            $result,
            $this->getHeaderData(),
            $this->getFooterData()
        );

        // Carga de vistas.
        $output = view('mbp/componentes/header', $result);
        $output .= view('mbp/index', $result);
        $output .= view('mbp/componentes/footer', $result);

        return $output;
    }

    public function hotel($id_destino)
    {
        $db = \Config\Database::connect();

        //Obtener mbp_zonas
        $arrWhere = ["status_zona"];
        $arrCond = ["1"];
        $result['zonas'] = $this->generalModel->selectData(
            "id_mbp_zona, nombre_zona",
            "mbp_zonas",
            $arrWhere,
            $arrCond,
            [],
            []
        );

        //Obtener imagen encabezado e informacion del footer
        $result = array_merge(
            $this->getHeaderData(),
            $this->getFooterData()
        );

        // Carga de vistas.
        $output = view('mbp/componentes/header', $result);
        $output .= view('mbp/destino', $result);
        $output .= view('mbp/componentes/footer', $result);

        return $output;
    }

    private function getHeaderData()
    {
        $db = \Config\Database::connect();

        // Obtener la imagen de header
        $result['imagen_header'] = $db->table('mbp_imagenes_landing')
            ->select('id_imagen_landing, imagen_landing, url')
            ->where('ubicacion', 'header')
            ->where('status_image_landing', 1)
            ->limit(1)->get()->getRow();

        $result['imagen_header'] = empty($result['imagen_header']) ? [] : $result['imagen_header'];

        return $result;
    }

    private function getFooterData()
    {
        $db = \Config\Database::connect();

        //Obtener imagenes para el footer
        $arrWhere = ["ubicacion", "status_image_landing"];
        $arrCond = ["footer", 1];
        $arrOrder = ["orden" => "ASC"];
        $result['imagenes_footer'] = $this->generalModel->selectData(
            "*",
            "mbp_imagenes_landing",
            $arrWhere,
            $arrCond,
            [],
            [],
            $arrOrder
        );

        $result['imagenes_footer'] = empty($result['imagenes_footer']) ? [] : $result['imagenes_footer'];

        //Obtener textos de footer seccion izquierda
        $arrWhere = ["ubicacion_mbp_texto"];
        $arrCond = ["izquierda"];
        $result['textos_izquierda_footer'] = $this->generalModel->selectData(
            "id_mbp_texto, texto_mbp, ubicacion_mbp_texto",
            "mbp_textos",
            $arrWhere,
            $arrCond,
            [],
            [],
            []
        );

        $result['textos_izquierda_footer'] = empty($result['textos_izquierda_footer']) ? [] : $result['textos_izquierda_footer'];

        //Obtener textos de footer seccion derecha
        $arrWhere = ["ubicacion_mbp_texto"];
        $arrCond = ["derecha"];
        $result['textos_derecha_footer'] = $this->generalModel->selectData(
            "id_mbp_texto, texto_mbp, ubicacion_mbp_texto",
            "mbp_textos",
            $arrWhere,
            $arrCond,
            [],
            [],
            []
        );

        $result['textos_derecha_footer'] = empty($result['textos_derecha_footer']) ? [] : $result['textos_derecha_footer'];


        return $result;
    }
}
