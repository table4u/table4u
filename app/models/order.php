<?php
    class Order{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getorders(){
            $this->db->query('SELECT * ,_order.status AS O_status, reservation.status AS R_status FROM _order 
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE _order.status = "Upcoming" AND reservation.status != "cancel"
                            ORDER BY reservation._date,reservation.reservationTime');
            $result = $this->db->resultset();
            return $result;
        }

        public function getOrd(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT _order.orderID, _order.reservationID, reservation._date, reservation.status, _order.status AS O_status FROM _order 
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date' AND reservation.status != 'cancel'");
            $result = $this->db->resultset();
            return $result;
        }

        public function getfinishedorders(){
            $this->db->query('SELECT * ,_order.status AS O_status, reservation.status AS R_status, customer.name AS cusname FROM _order 
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            INNER JOIN customer
                            ON customer.customerID = reservation.customerID
                            INNER JOIN reservation_table
                            ON reservation_table.reservationID = reservation.reservationID
                            WHERE _order.status = "Finished" AND reservation.status != "cancel"
                            ORDER BY reservation._date,reservation.reservationTime DESC');
            $result = $this->db->resultset();
            return $result;
        }

        public function getASAPorders(){
            $this->db->query('SELECT * ,_order.status AS O_status, reservation.status AS R_status FROM _order 
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            INNER JOIN reservation_table
                            ON reservation_table.reservationID = reservation.reservationID
                            WHERE _order.status != "Finished" AND reservation.status = "arrived"
                            ORDER BY reservation._date,reservation.reservationTime');
            $result = $this->db->resultset();
            return $result;
        }

        public function getpreporders(){
            $this->db->query('SELECT * ,_order.status AS O_status, reservation.status AS R_status, customer.name AS cusname FROM _order 
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            INNER JOIN customer
                            ON customer.customerID = reservation.customerID
                            INNER JOIN reservation_table
                            ON reservation_table.reservationID = reservation.reservationID
                            WHERE _order.status = "Preparing" AND reservation.status != "cancel"
                            ORDER BY reservation._date,reservation.reservationTime ');
            $result = $this->db->resultset();
            return $result;
        }

        public function getOrderDetails(){
            $this->db->query('SELECT menu_item.name , order_menu_item.noOfServings , _order.orderID , menu_item.menuItemID ,menu_item.picture,
                            order_menu_item.portionSize, order_menu_item.specialNotes FROM _Order
                            INNER JOIN order_menu_item
                            ON order_menu_item.orderID = _order.orderID
                            INNER JOIN menu_item
                            ON menu_item.menuItemID = order_menu_item.menuItemID
                            ');    
            $result = $this->db->resultset();
            return $result;
        }

        public function updateStatus($data){
            $this->db->query('UPDATE _order SET status = :status WHERE orderID = :order_id');

            $this->db->bind(':status',$data['status']);
            $this->db->bind(':order_id',$data['order_id']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getUrgOrdCount(){
            date_default_timezone_set("Asia/Colombo");
            $date = Date("y-m-d");
            $this->db->query("SELECT COUNT(orderID) as ordcount 
                            FROM _order
                            INNER JOIN reservation
                            ON reservation.reservationID = _order.reservationID
                            WHERE reservation._date = '$date'AND _order.status != 'Finished' AND reservation.status = 'arrived'");
            $result = $this->db->resultset();
            return $result;
        }
    }