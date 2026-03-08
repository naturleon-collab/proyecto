<?php

namespace App\Controllers;

use App\Models\GeneralModel;

class Aviso extends BaseController
{
    
    protected $generalModel;

    public function __construct()
    {
        $this->generalModel = new GeneralModel();
    }

    public function index()
    {

        
        $columnselect = "*";
        $fromtable = "cms_aviso";
        $arrWhere = [];
        $arrCond = [];
        $arrJoin = [];
        $arrCondJoin = [];

        $data['avisos'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

        
        $columnselect = "*";
        $fromtable = "cms_aviso_banner";
        $arrWhere = [];
        $arrCond = [];
        $arrJoin = [];
        $arrCondJoin = [];

        $data['banner'] = $this->generalModel->selectData($columnselect, $fromtable, $arrWhere, $arrCond, $arrJoin, $arrCondJoin);

        
        return view('aviso', $data);
    }
}