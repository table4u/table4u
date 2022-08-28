<?php
class Feedback
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addFeedback($data)
    {
        $this->db->query('INSERT INTO 
        feedback(comment, customerID) 
        VALUES(:comment, :customerID)');

        $this->db->bind(':comment', $data['comment']);
        $this->db->bind(':reservationID', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
