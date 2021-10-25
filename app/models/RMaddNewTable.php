<?php

class RMaddNewTable{
    private $db;
    public function __construct()
    {
        $this->db = new Database; 
    }

    public function addNewTable_M($tableNo,$maxCover,$minCover){
        $qqq =  "INSERT INTO _table(tableNo ,maxCover, minCover) VALUES ('$tableNo','$maxCover','$minCover')";
        $this->db->query($qqq);
        $this->db->execute();
       // echo "Insert Successful";
        $qqq2 = "SELECT * FROM _table";
        $this->db->query($qqq2);
        return $this->db->single();

    }
    public function getTableData_M(){
        $qqq = "SELECT * FROM _table";
        $this->db->query($qqq);
        return $this->db->resultSet();

    }

    public function getTableDetailsByRow($table_no){
        
        return $this->getTableData_M();

    }

}



?>