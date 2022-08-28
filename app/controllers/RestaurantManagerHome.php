<?php
//default controller
class RestaurantManagerHome extends Controller
{
    public function __construct()
    {
        $this->Homemodel = $this->model('RMdashboard');
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
    public function getDataMenu(){
        $data = $this->Homemodel->getMenuDetailsAjax();
        echo json_encode($data);
    }
    public function getDatareservation(){
        $data = $this->Homemodel->getReservationDetailsAjax();
        echo json_encode($data);
    }

    public function getDataOrder(){
        $data = $this->Homemodel->getOrderDetailsAjax();
        echo json_encode($data);
    }
    public function getMenuDetailsAjaxForReport(){
        $data = $this->Homemodel->getMenuDetailsGroupMenuItemID();
        echo json_encode($data);
    }


}