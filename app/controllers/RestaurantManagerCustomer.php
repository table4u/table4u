<?php

class RestaurantManagerCustomer extends Controller{

    public function __construct()
    {   
        isValidUser('Restaurant Manager');
        $this->customermodel = $this->model('RMcustomer');
        
    }

    public function index(){

        $data = $this->customermodel->get_customer_details();
       // print_r($data);
        $this->view('resManager_customer',$data);
       
    }
    public function searchCustomer(){
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $data = $this->customermodel->searchCustomer($filtervalues);
            $this->view('resManager_customer',$data);
        }
    }
}




?>