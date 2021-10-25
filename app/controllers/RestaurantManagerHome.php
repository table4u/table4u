<?php
//default controller
class RestaurantManagerHome extends Controller
{
    public function __construct()
    {
        isValidUser('Restaurant Manager');

    }

    public function index()
    {   // $this->view('hello');
        // $data = [
        //     // 'title' => "WELCOME",
        // ];
        //return the views
       // $this->view('home');
       $this->view('resManager_dashboard');
    }

    public function dashboard()
    {
        $this->view('resManager_dashboard');
    }
}