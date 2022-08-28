<?php
class CustomerOrder
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addOrder()
    {

        $this->db->query('INSERT INTO 
        _order(status, reservationID) 
        VALUES(:status, :reservationID)');

        $this->db->bind(':status', 'upcoming');
        $this->db->bind(':reservationID', $_SESSION['reservationID']);
        if ($this->db->execute()) {
            $this->db->query('SELECT LAST_INSERT_ID() as orderID from _order');
            $result = $this->db->single();
            $_SESSION['orderID'] = $result->orderID;
            return true;
        } else {
            return false;
        }
    }
    public function addOrderItemDetails($data)
    {
        $this->db->query('INSERT INTO order_menu_item (orderID, menuItemID, noOfServings, portionSize, specialNotes) VALUES(:order_id, :product_id, :product_amount, :product_size, :special_instructions)');

        $this->db->bind(':order_id', $data['orderID']);
        $this->db->bind(':product_id', $data['menuItemID']);
        $this->db->bind(':product_amount', $data['noOfServings']);
        $this->db->bind(':product_size', $data['portionSize']);
        $this->db->bind(':special_instructions', $data['specialNotes']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addPayment($total)
    {
        $todayTime = (date("H:i:s", $_SERVER['REQUEST_TIME']));
        $todayDate = (date("Y-m-d"));

        $this->db->query('INSERT INTO payment (orderID, date, time, amount, payment_type, payment_status) 
        VALUES(:order_id, :date, :time, :amount, :payment_type, :payment_status)');

        $this->db->bind(':order_id', $_SESSION['orderID']);
        $this->db->bind(':date', $todayDate);
        $this->db->bind(':time', $todayTime);
        $this->db->bind(':amount', $total);
        $this->db->bind(':payment_type',  'Card');
        $this->db->bind(':payment_status', 'Completed');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
