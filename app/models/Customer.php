<?php
    class Customer {
        private $db;

        public function __construct(){
          $this->db = new Database;  
        }

        // Add customer
        public function addCustomer($data){
          $this->db->query('INSERT INTO customer (name, mobile, nic, address, cust_type) VALUES(:custName, :telNo, :NIC, :custAddress, :cust_type)');

          $this->db->bind(':custName', $data['custName']);
          $this->db->bind(':telNo', $data['telNo']);
          $this->db->bind(':NIC', $data['NIC']);
          $this->db->bind(':custAddress', $data['custAddress']);
          $this->db->bind(':cust_type', "CR");

          if($this->db->execute()){
            return true;
          } else {
            return false;
          }

        }

        public function findUserByNIC($nic){
          $this->db->query('SELECT * FROM customer WHERE nic = :nic');
          // Bind value
          $this->db->bind(':nic', $nic);

          $row = $this->db->single();

          // Check row
          if ($this->db->rowCount() > 0) {
              return true;
          } else {
              return false;
          }
        }

      public function findUserByMobile($mobile){
        $this->db->query('SELECT * FROM customer WHERE mobile = :mobile');
        // Bind value
        $this->db->bind(':mobile', $mobile);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showallcustomers(){
        $this->db->query('SELECT * FROM customer');

        $row = $this->db->resultSet();
        // print_r($row);
        // die();
         return $row;
       
    }

    public function showRegisterCustomers(){
       $this->db->query("SELECT * FROM customer WHERE cust_type='SR'");

      $row = $this->db->resultSet();
      // print_r($row);
      // die();
       return $row;
     
  }

  public function showUnregisterCustomers(){
      $this->db->query("SELECT * FROM customer WHERE cust_type='CR'");

    $row = $this->db->resultSet();
    // print_r($row);
    // die();
     return $row;
   
}



    
    }