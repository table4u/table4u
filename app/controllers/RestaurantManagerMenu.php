<?php

class RestaurantManagerMenu extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
    }

    public function index(){
        $this->view('resManager_menu');
    }

    public function menumore(){
        $this->view('resManager_menumore');
    }
}




?>