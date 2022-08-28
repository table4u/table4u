<?php

class RestaurantManagerReport extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
        $this->reportmodel = $this->model('RMreport');
    }

    public function index(){
        $this->view('resManager_report');
    }

    public function menuPerformance01(){
        //$data = $this->reportmodel->getMenuPerformanceDetails();
        //echo "In controller";
        $this->view('resManager_menuPerformanceReport');
    }
    public function menuPerformance02(){
        //echo $_POST['month'];
        $data = $this->reportmodel->getMenuPerformanceDetails($_POST['month']);
        //echo "In controller";
        $this->view('resManager_menuPerformanceReport',$data);
    }
    public function getMenuDetailsAjaxForReport(){
        $data = $this->reportmodel->getMenuDetailsGroupMenuItemID();
        echo json_encode($data);
    }
    public function reservationReport01(){
       // $month = $_POST['month'];
        $data = $this->reportmodel->getReservationDetails($_POST['month']);
        $this->view('resManager_reservationDetailsReport',$data);
       // echo json_encode($data);
    }
    public function reservationReport(){
       // $month = $_POST['month'];
        //$data = $this->reportmodel->getReservationDetails($_POST['month']);
        $this->view('resManager_reservationDetailsReport');
       // echo json_encode($data);
    }
    public function customerReport(){
    $data = $this->reportmodel->getCustomerDetailsReport();
    $this->view('resManager_customerDetailsReport',$data);

    }
}




?>