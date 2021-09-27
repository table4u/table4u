<?php
class Login extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
        $data = [];

        //return the views
        $this->view('login');
    }
    
}
