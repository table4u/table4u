<?php
class Customer
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add customer
  public function addCustomer($data)
  {
    $this->db->query('INSERT INTO customer (name, mobile, nic, address, cust_type) VALUES(:custName, :telNo, :NIC, :custAddress, :cust_type)');

    $this->db->bind(':custName', $data['custName']);
    $this->db->bind(':telNo', $data['telNo']);
    $this->db->bind(':NIC', $data['NIC']);
    $this->db->bind(':custAddress', $data['custAddress']);
    $this->db->bind(':cust_type', "CR");

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByNIC($nic)
  {
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

  public function findUserByMobile($mobile)
  {
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

  public function findUserby_mobile($mobile){
    $this->db->query('SELECT customerID FROM customer WHERE mobile = :mobile');
    $this->db->bind(':mobile', $mobile);
    $result = $this->db->single();
    return $result;
  }

  public function showallcustomers()
  {
    $this->db->query('SELECT * FROM customer');

    $row = $this->db->resultSet();
    // print_r($row);
    // die();
    return $row;
  }

  public function showRegisterCustomers()
  {
    $this->db->query("SELECT * FROM customer WHERE cust_type='SR'");

    $row = $this->db->resultSet();
    // print_r($row);
    // die();
    return $row;
  }

  public function showUnregisterCustomers()
  {
    $this->db->query("SELECT * FROM customer WHERE cust_type='CR'");

    $row = $this->db->resultSet();
    // print_r($row);
    // die();
    return $row;
  }

  // public function searchFromAll($id){
  //   $this->db->query("SELECT * FROM customer WHERE id=$custName OR id=$telNo OR id=$NIC OR id=$custAddress OR id=$cust_type OR id=$email");

  //   $row = $this->db->resultSet();
  //   // print_r($row);
  //   // die();
  //   return $row;

  // }

  // public function searchFromReg($id){
  //   $this->db->query("SELECT * FROM customer WHERE id=$custName OR id=$telNo OR id=$NIC OR id=$custAddress OR id=$cust_type OR id=$email");

  //   $row = $this->db->resultSet();
  //   // print_r($row);
  //   // die();
  //   return $row;

  // }

  // public function searchFromUnreg($id){
  //   $this->db->query("SELECT * FROM customer WHERE id=$custName OR id=$telNo OR id=$NIC OR id=$custAddress OR id=$cust_type");

  //   $row = $this->db->resultSet();
  //   // print_r($row);
  //   // die();
  //   return $row;

  // }

  public function searchcustomers($filtervalues)
  {
    $this->db->query("SELECT * FROM customer WHERE CONCAT(name,mobile,nic) LIKE '%$filtervalues%' ");

    $row = $this->db->resultSet();
    // print_r($row);
    // die();
    return $row;
  }
}
