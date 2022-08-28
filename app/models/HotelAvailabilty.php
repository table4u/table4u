<?php
class HotelAvailabilty
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getOpenCloseTime()
    {
        $this->db->query('SELECT * from opentime');

        $result = $this->db->single();

        return $result;
    }
    public function getHolidays()
    {
        $this->db->query('SELECT * from holidays');

        $result = $this->db->resultSet();

        return $result;
    }
}
