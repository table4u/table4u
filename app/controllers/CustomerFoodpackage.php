<?php

class CustomerFoodpackage extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
    }

    public function index()
    {
        $this->view('customerFoodpackage');
    }  
}
