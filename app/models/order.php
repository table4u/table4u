<?php
    class Order{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getorders(){
            $this->db->query('SELECT * FROM _order');
            $result = $this->db->resultset();
            return $result;
        }

        public function getOrderDetails(){
            $this->db->query('SELECT menu_item.name , order_menu_item.noOfServings , _order.orderID , menu_item.menuItemID
                            FROM _Order
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
    }