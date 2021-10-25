<?php
    class Dashboard {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getResCount(){
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(reservationID) as rescount 
                            FROM reservation
                            WHERE reservation._date = '$date'");
            $result = $this->db->resultset();
            return $result;
        }

        public function getOrdCount(){
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date'");
            $result = $this->db->resultset();
            return $result;
        }
    }