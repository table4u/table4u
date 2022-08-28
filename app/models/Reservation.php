<?php
class Reservation
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getReservationDetails($userID)
    {
        $this->db->query('SELECT r.reservationID, r._date, r.reservationTime, r.noOfGuests, t.tableNo, r.status
        FROM reservation AS r, reservation_table as t WHERE customerID = :userID AND r.reservationID = t.reservationID ORDER BY r._date, r.reservationTime');
        $this->db->bind(':userID', $userID);

        $row = $this->db->resultSet();
        // if ($this->db->rowCount() > 0) {
        return $row;
        // }
        // else{
        //     return false;
        // }
    }
    public function cancelReservation($reservationID)
    {
        $this->db->query("UPDATE reservation
                            SET status='Cancel' 
                            WHERE reservationID = :reservationID");
        $this->db->bind(':reservationID', $reservationID);
        if ($this->db->execute()) {
            $this->db->query("DELETE FROM tableavailability WHERE reservationID = :resID");
            $this->db->bind(':resID', $reservationID);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getreservations()
    {
        date_default_timezone_set("Asia/Colombo");
        $date = Date("y-m-d");
        $this->db->query("SELECT * ,customer.name AS cusname FROM reservation 
                        INNER JOIN reservation_table
                        ON reservation_table.reservationID = reservation.reservationID
                        INNER JOIN customer
                        ON reservation.customerID = customer.customerID
                        WHERE reservation._date='$date' AND reservation.status != 'Cancel' ");
        $result = $this->db->resultset();
        return $result;
    }

    public function makeReservation($data)
    {
        $this->db->query('INSERT INTO 
        reservation (customerID, _date, reservationTime, noOfGuests, status) 
        VALUES(:customerID, :_date, :reservationTime, :noOfGuests, :status)');

        $this->db->bind(':customerID', $_SESSION['user_id']);
        $this->db->bind(':_date', $data['date']);
        $this->db->bind(':reservationTime', $data['time']);
        $this->db->bind(':noOfGuests', $data['covers']);
        $this->db->bind(':status', "Pending");

        if ($this->db->execute()) {
            $this->db->query('SELECT LAST_INSERT_ID() as reservationID from reservation');
            $result = $this->db->single();
            // print_r($result);

            $_SESSION['reservationID'] = $result->reservationID;
            // echo   $_SESSION['reservationID'];
            // die();
            return true;
        } else {
            return false;
        }
    }

    public function getMostRecentReservation($userID)
    {
        $this->db->query("SELECT r.reservationID, r._date, r.reservationTime, r.noOfGuests, t.tableNo, r.status
        FROM reservation AS r, reservation_table as t 
        WHERE customerID = :userID AND r.reservationID = t.reservationID AND r.status != 'Cancel'
        ORDER BY r._date, r.reservationTime LIMIT 1");
        $this->db->bind(':userID', $userID);

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
