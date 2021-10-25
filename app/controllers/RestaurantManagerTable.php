<?php

class RestaurantManagerTable extends Controller{
    private $tableDetail;

    public function __construct()
    {
        $this->postmodel = $this->model('RMaddNewTable');
        isValidUser('Restaurant Manager');
    }

    public function index(){
       $this->tableDetail = $this->postmodel->getTableData_M();
        //print_r($this->tableDetail);
        $this->view('resManager_table',$this->tableDetail);
    
        
      
    }

    public function addNewTable(){
        $TableNum = trim($_POST['table_number']);
        $maxCover = trim($_POST['max_covers']);
        $minCover = trim($_POST['min_covers']);

        if(empty($maxCover) && empty($minCover) )
        {   
            //echo "Add Max Covers and Min Covers";
           $this->tableDisplay(1);
        }else{
            $tableRow = $this->postmodel->addNewTable_M($TableNum,$maxCover,$minCover);
            $this->tableDisplay(1);
        
            
        }

        

        
    }

    public function tableDisplay($tableNo){
        
        $table_detail = $this->postmodel->getTableDetailsByRow($tableNo);
        array_push($table_detail,$tableNo);
       // print_r($table_detail);
        $this->view('resManager_table',$table_detail);


    }
}





?>