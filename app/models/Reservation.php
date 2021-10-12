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
}
