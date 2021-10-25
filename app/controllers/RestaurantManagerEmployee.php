<?php

class RestaurantManagerEmployee extends Controller{

public function __construct(){
   // echo "RestaurantManagerEmployee constructor";
   $this->postModel = $this->model('RMgetempDetails');
        isValidUser('Restaurant Manager');

}

    public function index(){
       // echo "This is Restaurant manager index function";
       $getdata = $this->postModel->getEmpData();
      //print_r($getdata);
      
      
    
        $this->view('resManagerEmployee',$getdata);
    }

    public function addNewEmp(){
        $this->view('resManager_addnewemp');
    }

    public function seeMoreDetails($rowID){
        $getdataRow = $this->postModel->getEmpDataByRow($rowID);
        //print_r($getdataRow);
        $this->view('resManager_seeMoreEmp', $getdataRow);
    }


    
}







?>