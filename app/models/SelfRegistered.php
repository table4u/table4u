<?php

class SelfRegistered extends Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserDetails(){
        $this->db->query('SELECT * FROM customer WHERE customerID = :userID');
        $this->db->bind(':userID', $_SESSION['user_id']);

        $row = $this->db->single();
        print_r($row);
        // die();
        // echo $row->dob;
        // echo gettype($row->dob);
        return $row;
    }

    public function editDetails($data){
        $this->db->query('UPDATE customer SET name = :name,  mobile = :mobile,  email= :email, nic = :nic, dob=:dob, address = :address WHERE customerID = :user_id');
        // $dob = 
        // Bind values
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':address', $data['address']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function registerCustomer($data)
    {
        // $this->db->query('INSERT INTO customer(nic, address, mobile, name, email, username, password, dob, cust_type) 
        //                 VALUES(:nic, :address, :mobile, :name, :email, :username, :password, :dob, :cust_type)');
        $this->db->query('INSERT INTO customer( mobile, name, email, username, password,  cust_type, vkey) 
                        VALUES( :mobile, :name, :email, :username, :password,  :cust_type, :vkey)');
        // Bind values
        // $this->db->bind(':nic', $data['nic']);
        // $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':vkey', $data['vkey']);
        $this->db->bind(':cust_type', 'SR');

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function loginCustomer($username, $pw){
        $this->db->query('SELECT * FROM customer WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_pw = $row->password;
        if (password_verify($pw, $hashed_pw)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM customer WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // public function isVerified($userID)
    // {
    //     $this->db->query('SELECT verified FROM customer WHERE customer = :userID');
    //     // Bind value
    //     $this->db->bind(':userID', $userID);

    //     $row = $this->db->single();

    //     // Check row
    //     if ($this->db->rowCount() > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function findUserByUsername($username)
    {
        $this->db->query('SELECT * FROM customer WHERE username = :username');
        // Bind value
        $this->db->bind(':username', $username);

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

    public function verifyEmail($vkey){
        $this->db->query('SELECT verified, vkey FROM customer WHERE vkey = :vkey');
        // Bind value
        $this->db->bind(':vkey', $vkey);

        $row = $this->db->single();

     
        if ($this->db->rowCount() > 0) {
            $this->db->query('UPDATE customer SET verified = :verified WHERE vkey = :vkey');
            
            $this->db->bind(':vkey', $vkey);
            $this->db->bind(':verified', 1);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
           
        } else {
            return false;
        }
    }

}
