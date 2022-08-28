<?php

class RMgetempDetails{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getEmpData(){
        $qqq = "SELECT * FROM employee";
        $this->db->query($qqq);
        return $this->db->resultSet();

    }

    public function getEmpDataByRow($rowID){
        $qqq = "SELECT * FROM employee WHERE empID = '$rowID'";
        $this->db->query($qqq);
        return $this->db->single();
    }

 
    public function registerEmp($data){
        $qqq = "INSERT INTO employee(NIC,name,address,mobile,password,username,dob,email, empType)
        VALUES (:nic,:name,:address,:mobile,:password,:username,:dob,:email,:emp_type) ";
        $this->db->query($qqq);
    //bind values
         $this->db->bind(':nic',$data['nic']);
         $this->db->bind(':name',$data['name']);
         $this->db->bind(':address',$data['address']);
         $this->db->bind(':mobile',$data['mobile']);
         $this->db->bind(':password',$data['password']);
         $this->db->bind(':username',$data['username']);
         $this->db->bind(':dob',$data['dob']);
         $this->db->bind(':email',$data['email']);
         $this->db->bind(':emp_type',$data['designation']);

         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
    }

    public function updateEmp($data){
        //print_r($data);
        $qqq = "UPDATE employee SET 
        NIC =:nic,
        name = :name,
        address = :address ,
        mobile = :mobile,
        username = :username,
        dob = :dob,
        email = :email , 
        empType = :emp_type WHERE empID = :empID ";
        $this->db->query($qqq);
    //bind values
         $this->db->bind(':empID',$data['empID']);
         $this->db->bind(':nic',$data['nic']);
         $this->db->bind(':name',$data['name']);
         $this->db->bind(':address',$data['address']);
         $this->db->bind(':mobile',$data['mobile']);
         $this->db->bind(':username',$data['username']);
         $this->db->bind(':dob',$data['dob']);
         $this->db->bind(':email',$data['email']);
         $this->db->bind(':emp_type',$data['designation']);

         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
    }

    public function getEmpByEmail($email){
        $qqq = "SELECT * FROM employee WHERE email = :email";
        $this->db->query($qqq);
        $this->db->bind(':email',$email);

        $row = $this->db->single();

        //ckeck
        if($this->db->rowCount($row) > 0)
        {
            return true;
        }else{
            return false;
        }
        
    }

    public function getEmpByUsername($username){
        $qqq = "SELECT * FROM employee WHERE username = :username";
        $this->db->query($qqq);
        $this->db->bind(':username',$username);

        $row = $this->db->single();

        //ckeck
        if($this->db->rowCount($row) > 0)
        {
            return true;
        }else{
            return false;
        }
        
    }

    public function getEmpByNIC($nic){
        $qqq = "SELECT * FROM employee WHERE NIC = :nic";
        $this->db->query($qqq);
        $this->db->bind(':nic',$nic);

        $row = $this->db->single();

        //ckeck
        if($this->db->rowCount($row) > 0)
        {
            return true;
        }else{
            return false;
        }
        
    }

    public function DeleteEmp($NIC){
        $qqq = "DELETE FROM employee WHERE NIC ='$NIC'";
        $this->db->query($qqq);
        return ($this->db->execute());
    }
    public function searchEmployee($filtervalues){
        $qqq = "SELECT * FROM employee WHERE CONCAT(name,empType,mobile,email) LIKE '%$filtervalues%' ";
        $this->db->query($qqq);
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;

    }




}



?>