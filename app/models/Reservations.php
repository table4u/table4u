<?php
class Reservations
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function IsOpenDay($date)
    {
        $this->db->query('SELECT * FROM customer WHERE nic = :nic');
        // Bind value
        $this->db->bind(':nic', $date);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function makeReservationcashir($data)
    {
        $this->db->query('INSERT INTO 
        reservation (customerID, _date, reservationTime, noOfGuests, status) 
        VALUES(:customerID, :_date, :reservationTime, :noOfGuests, :status)');

        $this->db->bind(':customerID', $_SESSION['customerId']);
        $this->db->bind(':_date', $data['date']);
        $this->db->bind(':reservationTime', $data['fromtime']);
        $this->db->bind(':noOfGuests', $data['covers']);
        $this->db->bind(':status', "arrived");



        if ($this->db->execute()) {
            if ($this->addAvailability($data)) {
                return true;
            }
            return false;
        } else {
            return false;
        }

        // $this->db->query('INSERT INTO 
        // tableavailability (tableNo, _date, toTime, fromTime, availability)  
        // VALUES(:tableNo, :_date, :toTime, :fromtime, :avail)');

        // $this->db->bind(':avail', "0");
        // $this->db->bind(':tableNo', $data['tableNo']);
        // $this->db->bind(':_date', $data['date']);
        // $this->db->bind(':totime', $data['totime']);
        // $this->db->bind(':fromtime', $data['fromtime']);

        // if ($this->db->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    public function addAvailability($data)
    {
        $this->db->query('INSERT INTO 
        tableavailability (tableNo, _date, toTime, fromTime, availability)  
        VALUES(:tableNo, :_date, :toTime, :fromtime, :avail)');
        // print_r($data);
        // die("Inserted");
        $this->db->bind(':tableNo', $data['tableNo']);
        $this->db->bind(':_date', $data['date']);
        $this->db->bind(':toTime', $data['totime']);
        $this->db->bind(':fromtime', $data['fromtime']);
        $this->db->bind(':avail', "0");

        if ($this->db->execute()) {

            return true;
        } else {
            return false;
        }
    }

    public function getRes($data)
    {
        $this->db->query('SELECT reservationID FROM reservation
                            WHERE customerID = :customerID AND _date=:_date AND reservationTime=:reservationTime 
                            AND noOfGuests=:noOfGuests AND status=:status');
        $this->db->bind(':customerID', $_SESSION['customerId']);
        $this->db->bind(':_date', $data['date']);
        $this->db->bind(':reservationTime', $data['fromtime']);
        $this->db->bind(':noOfGuests', $data['covers']);
        $this->db->bind(':status', "arrived");
        $result = $this->db->single();
        return $result;
    }

    public function addtblno($data)
    {
        $this->db->query('INSERT INTO 
        reservation_table(reservationID,tableNo)
        VALUES(:resID,:tableNo)');
        $this->db->bind(':tableNo', $data['tableNo']);
        $this->db->bind(':resID', $_SESSION['resId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function _addOrder()
    {
        $this->db->query('INSERT INTO _order(status,reservationID)
        VALUES(:status,:resID)');
        $this->db->bind(':status', "Upcoming");
        $this->db->bind(':resID', $_SESSION['resId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderID()
    {
        $this->db->query('SELECT MAX(orderID) AS ordId FROM _order WHERE status=:status AND reservationID=:resID');
        $this->db->bind(':status', "Upcoming");
        $this->db->bind(':resID', $_SESSION['resId']);
        $result = $this->db->single();
        return $result;
    }

    // public function unavailableTable($tableNo)
    // {
    //     $this->db->query("UPDATE _table SET availabilty = 0 WHERE tableNo = :tableNo");
    //     die("unavailable");
    // }

    public function availableTable($data)
    {

        date_default_timezone_set("Asia/Colombo");
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $this->db->query("DELETE FROM tableavailability WHERE tableavailability.tableNo=$data[tableNo] AND tableavailability._date = '$date' AND '$time' BETWEEN tableavailability.fromTime AND tableavailability.toTime");

        $this->db->bind(':tableNo', $data['tableNo']);
        //die("Inserted");
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // public function findCoverRange($covers)
    // {
    //     if ($data['covers']) {
    //         return "Incorrect name format";
    //     } else {
    //         return "";
    //     }
    // }


    public function getTableNo($tableNo)
    {
        $qqq1 = "SELECT * FROM _table WHERE tableNo = :tableNo";
        $this->db->query($qqq1);
        $this->db->bind(':tableNo', $tableNo);

        $row = $this->db->single();

        //ckeck
        if ($this->db->rowCount($row) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getTableData_M()
    {
        $qqq = "SELECT * FROM _table";
        $this->db->query($qqq);
        return $this->db->resultSet();
    }


    public function getTableDetailsByRow($table_no)
    {

        return $this->getTableData_M();
    }

    public function tableDataGetAjax()
    {
        $qqq = "SELECT * FROM _table ";
        $this->db->query($qqq);

        return $this->db->resultSet();
    }
    // public function getTableArea($tableID){
    //     $completedID = "TL-".$tableID;
    //     $qqq = "SELECT * FROM _table WHERE tableID = :tableID";
    // }

}
