<?php

use function PHPSTORM_META\type;

class RestaurantManagerTable extends Controller{
    private $tableDetail;

    public function __construct()
    {
        isValidUser('Restaurant Manager');
        $this->postmodel = $this->model('RMaddNewTable');
    }

    public function index(){
       $this->tableDetail = $this->postmodel->getTableData_M();
        
        $this->view('resManager_table',$this->tableDetail);
        //print_r($this->tableDetail);
    
        
      
    }

    public function addNewTable(){
        $TableNum = trim($_POST['_tableNumber']);
        $maxCover = trim($_POST['_maxCovers']);
        $minCover = trim($_POST['_minCovers']);
        $tableID = trim($_POST['_area']); 

        $err= [
            'empty_err' =>'',
            'minus_err' => '',
            'table_err' =>'',
            'area_err'=>''
        ];

        if(empty($maxCover) && empty($minCover) && empty($TableNum) && empty($tableID) )
        {   
            //echo("<h1 style = 'color:red;'>Add Max Covers and Min Covers</h1>");
            $err['empty_err'] = "Add Max Covers and Min Covers and Table Number";

           //$this->tableDisplay(1);
        }else if($TableNum <=0 || $maxCover <0 || $minCover <0 || $tableID <0 ){

            //echo("<h1 style = 'color:red;'>Add Valid values for table intertion</h1>");
            $err['minus_err'] = "Add Valid values for table insertion";
           //$this->tableDisplay(1);

        }else if($this->postmodel->getTableNo($TableNum))
        { 
            //echo("<h1 style = 'color:red;'>That table is already inserted</h1>");
            $err['table_err'] = "That table is already inserted";
           // $this->tableDisplay(1);

        }else if($tableID >20 ){
            $err['area_err'] = "The area is not valid";
        }else if($this->postmodel->getTableArea($tableID)){
            $err['area_err'] = "In that area already have a table in the layout";
        }
        
        
        if(empty($err['empty_err']) && empty($err['minus_err']) && empty($err['table_err']) && empty($err['area_err'])){
            $tableRow = $this->postmodel->addNewTable_M($TableNum,$maxCover,$minCover,$tableID);
            echo json_encode($tableRow);
           // $this->index();    
        }else{
            //echo "<h1 style = 'color:red;'>".$err['empty_err']."</h1>";
            echo $err['empty_err'];

            //echo "<br>";
            //echo "<h1 style = 'color:red;'>".$err['minus_err']."</h1>";
           echo $err['minus_err'];
           // echo "<br>";
            //echo "<h1 style = 'color:red;'>".$err['table_err']."</h1>";
            echo $err['table_err'];

           // echo "<h1 style = 'color:red;'>".$err['area_err']."</h1>";
            echo $err['area_err'];
            //echo "<br>";
            //$this->index();
            //echo "Suwasana";
            
            //echo $_SESSION['error_01'];
           // 

           
        }

        

        
    }

    public function tableDisplay($tableNo){
        
        $table_detail = $this->postmodel->getTableDetailsByRow($tableNo);
        array_push($table_detail,$tableNo);
       //print_r($table_detail);
        $this->view('resManager_table',$table_detail);


    }

    public function deleteTable($tableno){
       // echo "IN controller";
        $dd = $this->postmodel->getReservationCount($tableno);
        //echo $dd;

        if($dd == false){

            $result = $this->postmodel->deletetable($tableno);

        }else{
           $result = "Table Can't be Deleted";
        }

        echo $result;
       /* if($result){
            $this->tableDisplay(1);
        }*/

    }

    public function table_table($tableNo){

        $table_detail = $this->postmodel->tableDataGetAjax($tableNo); 
       // $array = json_decode(json_encode($table_detail[0]), true);
       $testarray = json_encode($table_detail);
        //print_r($table_detail);
       //$testarray ='{"tableNo":'.$table_detail[0]->tableNo.', "tableID":"'.$table_detail[0]->tableID.'", "maxCover":"'.$table_detail[0]->maxCover.'" , "minCover":"'.$table_detail[0]->minCover.'"}';
       echo ($testarray);
        
        
    }

}





?>