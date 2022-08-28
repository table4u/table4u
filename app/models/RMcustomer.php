
<?php  

class RMcustomer{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_customer_details(){
        $qqq = "SELECT * FROM customer";
        $this->db->query($qqq);
         
        $data = $this->db->resultSet();
        return $data;
        
    }
    public function searchCustomer($filtervalues){
        $qqq = "SELECT * FROM customer WHERE CONCAT(name,NIC,address,mobile,email,dob) LIKE '%$filtervalues%' ";
        $this->db->query($qqq);
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;

    }





}









?>