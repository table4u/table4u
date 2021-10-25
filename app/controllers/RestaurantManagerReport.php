<?php

class RestaurantManagerReport extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
    }

    public function index(){
        $this->view('resManager_report');
    }
}




?>