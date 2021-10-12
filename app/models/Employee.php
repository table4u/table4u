<?php
class Employee{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }   

    public function loginEmployee($username, $pw)
    {
        $this->db->query('SELECT * FROM employee WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashed_pw = $row->password;
        if (password_verify($pw, $hashed_pw)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findEmployeeByEmail($email)
    {
        $this->db->query('SELECT * FROM employee WHERE email = :email');
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
    public function findEmployeeByUsername($username)
    {
        $this->db->query('SELECT * FROM employee WHERE username = :username');
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
}