<?php      

class RMreservation {

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDetails(){
        $qqq1 = "SELECT reservation.reservationID, reservation._date, reservation.reservationTime, reservation.status, customer.name , reservation_table.tableNo 
                 FROM reservation
                    INNER JOIN customer ON reservation.customerID = customer.customerID
                    INNER JOIN reservation_table ON reservation.reservationID = reservation_table.reservationID";



            $this->db->query($qqq1);
            $data = $this->db->resultSet();
            return $data;

    }

    public function get_order_details($reservationID){
        //echo("im in model order");
        $qqq = "SELECT * from _order WHERE reservationID = :reservationID ";
        $this->db->query($qqq); 
        $this->db->bind(':reservationID', $reservationID);
        $data = $this->db->resultSet();
        return $data;
    

    }
    public function searchReservation($filtervalues){
       $qqq =  "SELECT reservation.reservationID, reservation._date, reservation.reservationTime, reservation.status, customer.name , reservation_table.tableNo 
        FROM reservation
           INNER JOIN customer ON reservation.customerID = customer.customerID
           INNER JOIN reservation_table ON reservation.reservationID = reservation_table.reservationID
           WHERE CONCAT(customer.name,reservation._date,reservation_table.tableNo,reservation.reservationTime,reservation.status) LIKE '%$filtervalues%' ";
        $this->db->query($qqq);
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;

    }
    public function getReservationDetailsAjax(){
        $qqq = "SELECT COUNT(reservationID) AS count FROM reservation WHERE status = 'Pending'";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;
    }






}























?>