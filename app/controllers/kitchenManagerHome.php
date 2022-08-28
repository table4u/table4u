<?php

class KitchenManagerHome extends Controller
{
    public function __construct()
    {
        $this->DashModel = $this->model('dashboard');
        isValidUser('Kitchen Manager');

    }

    public function index(){
        $rescount = $this->DashModel->getResCount();
        $ordcount = $this->DashModel->getOrdCount();
        $data = [
            'rescount' => $rescount ,
            'ordcount' =>$ordcount,
            'title' => "Dashboard"
        ];
        $this->view('pages/index', $data);
    }
}