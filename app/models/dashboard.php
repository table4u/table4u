<?php
    class Dashboard {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getResCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(reservationID) as rescount 
                            FROM reservation
                            WHERE reservation._date = '$date'");
            $result = $this->db->resultset();
            return $result;
        }

        public function getOrdCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date'");
            $result = $this->db->resultset();
            return $result;
        }

        public function getUpOrdCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date' AND _order.status = 'Upcoming' ");
            $result = $this->db->resultset();
            return $result;
        }

        public function getPreOrdCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date' AND _order.status = 'Preparing'");
            $result = $this->db->resultset();
            return $result;
        }

        public function getFinOrdCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date' AND _order.status = 'Finished'");
            $result = $this->db->resultset();
            return $result;
        }

    }