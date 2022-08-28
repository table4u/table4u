<?php

class Cashiertable
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTableDetails()
    {
        $this->db->query('SELECT tableNo, tableID, minCover, maxCover FROM _table');

        $row = $this->db->resultSet();
        return $row;
    }

    public function getTableAvailability($date)
    {   
        $this->db->query('SELECT * FROM tableavailability where _date = :date');
        $this->db->bind(':date', $date);

      
        $row = $this->db->resultSet();
        return $row;
    }

    public function getTableDetailsByTable($tableNo)
    {
        $this->db->query("SELECT * FROM _table WHERE tableNo = :tableno");
        $this->db->bind(':tableno', $tableNo);
        return $this->db->single();
    }
    public function getNextAvailability($tableNo, $date, $time)
    {
        // $t = date("H:i", strtotime('-60 minutes', strtotime($tableAvail[$j]->fromTime)));

        $this->db->query("SELECT * 
        FROM tableavailability 
        WHERE (_date = :date AND tableNo = :tableNo AND toTime > :toTime AND fromTime < :fromTime) OR ()");
        $this->db->bind(':tableNo', $tableNo);
        $this->db->bind(':date', $date);
        $this->db->bind(':toTime', $time);
        $this->db->bind(':fromTime', $time);
        return $this->db->resultSet();
    }
// $time >= $t && $time <= $tableAvail[$j]->toTime

    private function updateAvailability($data)
    {
        $this->db->query('INSERT INTO 
        tableavailability (tableNo, _date, toTime, fromTime, availability,reservationID) 
        VALUES(:tableNo, :date, :toTime, :time, :availability, :reservationID)');

        $this->db->bind(':tableNo', $data['tableNo']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':toTime', $data['toTime']);
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':availability', 0);
        $this->db->bind(':reservationID', $_SESSION['reservationID']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function reserveTable($data)
    {
        $this->db->query('INSERT INTO 
        reservation_table (reservationID, tableNo) 
        VALUES(:reservationID, :tableNo)');

        $this->db->bind(':reservationID', $_SESSION['reservationID']);
        $this->db->bind(':tableNo', $data['tableNo']);

        if ($this->db->execute()) {
            if ($this->updateAvailability($data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
