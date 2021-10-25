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
        $this->db->query('SELECT * FROM reservation WHERE customerID = :userID');
        $this->db->bind(':userID', $userID);

        $row = $this->db->resultSet();
        // if ($this->db->rowCount() > 0) {
        return $row;
        // }
        // else{
        //     return false;
        // }
    }

    public function getreservations()
    {
        $this->db->query('SELECT * FROM reservation');
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
        $this->db->bind(':status', "pending");

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
