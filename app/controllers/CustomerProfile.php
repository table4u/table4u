<?php

class CustomerProfile extends Controller
{
    public function __construct()
    {
        if(isValidUser('Customer')){
            $this->selfRegisteredModel = $this->model('SelfRegistered');
            $this->user = $this->selfRegisteredModel->getUserDetails($_SESSION['user_id']);
        }        
    }

    public function index()
    {
        $this->view('customerProfile', $this->user);
    }

    public function profile()
    {
        $this->view('customerProfile',$this->user);
    }

    // public function show($id){
    //     $user = $this->selfRegisteredModel->getUserDetails($id);
    // }
}
