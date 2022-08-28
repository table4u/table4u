<?php
    class Payment {
        private $db;

        public function __construct(){
          $this->db = new Database;  
        }

        // Start of payments
  
      public function showCompletedpayments(){
        date_default_timezone_set("Asia/Colombo");
        $date = Date("Y-m-d");
        $this->db->query("SELECT * FROM payment WHERE payment.date = '$date' AND payment_status='Completed'
        ORDER BY payment.time");
     
        $row = $this->db->resultSet();
   
        //print_r($row);
        // die();
        return $row;
      }
  
      public function searchPendingPayments($filtervalues){
        $this->db->query("SELECT * FROM payment WHERE CONCAT(name,date,time,amount) LIKE '%$filtervalues%' ");
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;
      }
  
      public function searchCompletedPayments($filtervalues){
        $this->db->query("SELECT * FROM payment WHERE CONCAT(name,date,time,amount,payment_type) LIKE '%$filtervalues%' ");
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;
      }
  
      public function doTransaction($total){
        date_default_timezone_set("Asia/Colombo");
        $date = Date("y-m-d");
        $time = Date("h:i:s");
        $this->db->query('INSERT INTO payment(orderID,date,time,amount,payment_type,payment_status)
        VALUES(:ordID,:date,:time,:amount,:payment_type,:payment_status)');
        $this->db->bind(':date', $date);
        $this->db->bind(':time', $time);
        $this->db->bind(':amount', $total);
        $this->db->bind(':payment_type', "Cash");
        $this->db->bind(':payment_status', "Completed");        
        $this->db->bind(':ordID', $_SESSION['order_id']);
        // $this->db->query("SELECT * FROM payment WHERE CONCAT(name,date,time,amount,payment_type) LIKE '%$filtervalues%' ");
        //$this->db->resultSet();
        //print_r($row);
        //die();
        //return $row;
        if ($this->db->execute()) {
          return true;
      } else {
          return false;
      }
      }

      

      public function changePaymentType($filtervalues){
        $this->db->query("UPDATE payment SET payment_type='Completed' WHERE amount=$filtervalues");
        
        // $this->db->query("SELECT * FROM payment WHERE CONCAT(name,date,time,amount,payment_type) LIKE '%$filtervalues%' ");
        //$row = $this->db->resultSet();
        //print_r($row);
        //die();
       // return $row;
      }
      
      // End of payments

      // public function calculateTotalByCash(){
      //   $row = $this->db->query("SELECT SUM(amount) FROM payment WHERE payment_type=cash && date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY score DESC");
      //   return $row;
      //   //print_r($row);
      //   //die();
        
      // }

    }