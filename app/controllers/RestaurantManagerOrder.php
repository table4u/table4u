<?php

class RestaurantManagerOrder extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
        $this->orderModel = $this->model('RMorder');
    }

    public function index(){
        $data = $this->orderModel->getOrderDetails();
        $this->view('resManager_order',$data);
    }
    public function searchOrder(){
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $data = $this->orderModel->searchOrder($filtervalues);
            $this->view('resManager_order',$data);
        }
    }
}




?>