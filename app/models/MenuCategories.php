<?php
class MenuCategories{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMenuCategories()
    {
        $this->db->query('SELECT * FROM menu');
        $results = $this->db->resultSet();

        return $results;
    }

}