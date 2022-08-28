<?php

class RestaurantManagerReservation extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
        $this->reservationModel = $this->model('RMreservation');
    }

    public function index(){
       $data=  $this->getreservationDetails();
        $this->view('resManager_reservation',$data);
        
    }

    public function getreservationDetails(){
        $getdata = $this->reservationModel->getDetails();
       //print_r($getdata);
        return $getdata;
    }

    public function getOrderDetails(){
        //echo $_POST['reservationID'];
        
       $data = $this->reservationModel->get_order_details($_POST['_reservationID']);
        echo json_encode($data);
        //print_r ($data);

    }
    public function searchReservation(){
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $data = $this->reservationModel->searchReservation($filtervalues);
            $this->view('resManager_reservation',$data);
        }
    }
    public function getDatareservation(){
        $data = $this->reservationmodel->getReservationDetailsAjax();
        echo json_encode($data);
    }
}




?>