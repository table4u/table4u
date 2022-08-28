<?php

class RMaddNewTable{
    private $db;
    public function __construct()
    {
        $this->db = new Database; 
    }

    public function addNewTable_M($tableNo,$maxCover,$minCover,$tableID){
        $realTableID = "TL-".$tableID;
        $qqq2 =  "INSERT INTO _table(tableNo ,maxCover, minCover,tableID) VALUES ('$tableNo','$maxCover','$minCover', '$realTableID')";
        $this->db->query($qqq2);
        return $this->db->execute();
       // echo "Insert Successful";
        //$qqq2 = "SELECT * FROM _table";
       // $this->db->query($qqq2);
        //return $this->db->single();

    }
    public function getTableNo($tableNo){
        $qqq1 = "SELECT * FROM _table WHERE tableNo = :tableNo";
        $this->db->query($qqq1);
        $this->db->bind(':tableNo',$tableNo);

        $row = $this->db->single();
        //print_r($row) ;

        //ckeck
        if($this->db->rowCount($row) > 0)
        {
            return true;
        }else{
            return false;
        }

    }
    public function getTableData_M(){
        // $qqq = "SELECT _table.tableNo,_table.tableID,_table.maxCover,_table.minCover, reservationtable.reservationID,reservation.reservationTime,reservation.customerID,reservation._date,reservation.status 
        // FROM _table 
        // INNER JOIN reservationtable ON reservationtable.tableNo = _table.tableNo 
        // INNER JOIN reservation ON reservation.reservationID = reservationtable.reservationID";

        $qqq = "SELECT * FROM _table";
        $this->db->query($qqq);
        return $this->db->resultSet();

    }
    // public function getTableData_MAjax(){
    //     $qqq = "SELECT _table.tableNo,_table.tableID,_table.maxCover,_table.minCover, reservationtable.reservationID,reservation.reservationTime,reservation.customerID,reservation._date,reservation.status 
    //     FROM _table 
    //     INNER JOIN reservationtable ON reservationtable.tableNo = _table.tableNo 
    //     INNER JOIN reservation ON reservation.reservationID = reservationtable.reservationID";

    //     //$qqq = "SELECT * FROM _table";
    //     $this->db->query($qqq);
    //     return $this->db->resultSet();

    // }


    public function getTableDetailsByRow($table_no){
        
    return $this->getTableData_M();
       
    }

    public function tableDataGetAjax($tableNo){
        $qqq = "SELECT _table.tableNo,_table.tableID,_table.maxCover,_table.minCover,reservation.reservationTime,reservation._date,reservation.status,reservation.reservationID FROM _table 
        LEFT JOIN reservation_table ON reservation_table.tableNo = _table.tableNo 
        LEFT JOIN reservation ON reservation.reservationID = reservation_table.reservationID
        WHERE _table.tableNo = '$tableNo' ";
        //$qqq = "SELECT * FROM _table WHERE tableNo = :tableno";
        $this->db->query($qqq);
        //$this->db->bind(':tableno', $tableNo);
        return $this->db->resultSet();

    }
    public function getTableArea($tableID){
        $completedID = "TL-".$tableID;
        $qqq = "SELECT * FROM _table WHERE tableID = :tableID";
        $this->db->query($qqq);
        $this->db->bind(':tableID', $completedID);

        $row = $this->db->single();

                //ckeck
                if($this->db->rowCount($row) > 0)
                {
                    return true;
                }else{
                    return false;
                }

    }

    public function deletetable($tableno){
        //echo "In model delete";
        $qqq = "DELETE FROM _table WHERE tableNo= :tableno";
        $this->db->query($qqq);
        $this->db->bind(':tableno',$tableno);
        $result = $this->db->execute();
        return $result;

    }
    public function getReservationCount($tableNo){
        //echo "In model reser";

        $qqq = "SELECT * FROM reservation_table 
        INNER JOIN reservation ON reservation.reservationID = reservation_table.reservationID
        WHERE tableNo = :tableno 
        AND reservation.status = 'Pending' ";
        $this->db->query($qqq);
        $this->db->bind(':tableno', $tableNo);
        $row = $this->db->resultSet();
        //echo ($this->db->rowCount($row));

                //ckeck
                if($this->db->rowCount($row) > 0)
                {
                    return true;
                }else{
                    return false;
                }

    }

}



?>