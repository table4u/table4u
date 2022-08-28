<?php
class CustomerTable extends Controller
{
    public function __construct()
    {
        // isValidUser('Customer');
        $this->tableModel = $this->model('Table');
    }

    public function tableDetails($tableNo)
    {
        $table_detail = $this->tableModel->getTableDetailsByTable($tableNo);
        $testarray = json_encode($table_detail);
        echo ($testarray);
        // die();        
    }

    public function tableNextAvailability($tableNo, $date, $time){
        $table_detail = $this->tableModel->getNextAvailability($tableNo, $date, $time);
        $testarray = json_encode($table_detail);
        echo ($testarray);
        die();        
    }
}
