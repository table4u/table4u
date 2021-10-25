<?php

class RMgetempDetails{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEmpData(){
        $qqq = "SELECT empID,NIC,name,address,mobile,email,empType FROM employee";
        $this->db->query($qqq);
        return $this->db->resultSet();

    }

    public function getEmpDataByRow($rowID){
        $qqq = "SELECT NIC,name,address,mobile,email,empType,dob FROM employee WHERE empID = '$rowID'";
        $this->db->query($qqq);
        return $this->db->single();
    }





}



?>