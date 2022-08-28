<?php

class RestaurantManagerMenu extends Controller{

    public function __construct()
    {
        isValidUser('Restaurant Manager');
        $this->menumodel = $this->model('RMmenu');
    }

    public function index(){
        $data = $this->menumodel->get_menu_details();
        //print_r($data);
        $this->view( 'resManager_menu' , $data);
    }

    public function getMenuDetailsAjax(){
        //echo('controller');
        $data = $this->menumodel->menumore($_POST['_menuID']);
        echo json_encode($data);
       //echo($data);
        
    }
    public function getAcceptMenuDetailsAjax(){
        
        $data = $this->menumodel->menumore($_POST['_menuID']);
        echo json_encode($data);
       //echo($data);
        
    }
    public function getMenuDetailsDefault(){
        $data = $this->menumodel->menuDetailsDefault();
        echo (json_encode($data));

    }
    public function acceptMenu(){
        $data = $this->menumodel->get_Menu_ItemAccept();
        $this->view('resManager_acceptmenu',$data);
    }
    public function AcceptMenuItem(){
        if($_POST['_smallPrice'] !=0|| $_POST['_mediumPrice'] != 0 || $_POST['_largePrice'] != 0){
        $data = $this->menumodel->AddMenuItem($_POST['_menuID'],$_POST['_smallPrice'],$_POST['_mediumPrice'],$_POST['_largePrice']);
        echo json_encode($data);
        }else{
            echo "error";
        }
    }
    public function RejectMenuItem(){
        $data = $this->menumodel->RejectMenuItemModel($_POST['_menuID']);
        echo json_encode($data);
    }
    public function change_availability(){
        $data = $this->menumodel->change_availability($_POST['_menuID'],$_POST['_availability']);
        echo json_encode($data);
    }

    public function update_menu_ajax(){
        if($_POST['_small_price'] > 0 && $_POST['_medium_price'] >0 && $_POST['_large_price'] > 0 ){
        $data = $this->menumodel->update_menu_data($_POST['_header'],$_POST['_name'],$_POST['_veg_NonVeg'],$_POST['_description'],$_POST['_small_price'],$_POST['_medium_price'],$_POST['_large_price'],$_POST['_menuID']);
        echo $data;
        }

    }
    public function DeleteMenuItem(){
        $data = $this->menumodel->deleteMenuItem($_POST['_menuID']);
        echo json_encode($data);
    }
    public function searchMenu(){
        if(isset($_POST['search'])){
            $filtervalues = $_POST['search'];
            $data = $this->menumodel->searchMenu($filtervalues);
            $this->view( 'resManager_menu' , $data);
        }
    }
}




?>