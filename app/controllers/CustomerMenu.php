<?php

class CustomerMenu extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
    }

    public function index()
    {
        $this->view('customerMenu');
    }
    
    public function menu()
    {
        $this->view('customerMenu');
    }
}
