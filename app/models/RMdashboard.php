<?php      

class RMdashboard {

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDataMenu(){
        $qqq1 = "SELECT order_menu_item.menuItemID, order_menu_item.portionSize, sum(order_menu_item.noOfServings) AS sumofServings ,menu_item.name , menu_item.priceSmall,menu_item.priceMedium,menu_item.priceLarge 
        FROM order_menu_item 
        INNER JOIN menu_item ON menu_item.menuItemID = order_menu_item.menuItemID 
        WHERE (menu_item.availability = '0' OR menu_item.availability = '1' OR menu_item.availability = '4')
        GROUP BY menuItemID, portionSize";



            $this->db->query($qqq1);
            $data = $this->db->resultSet();
            return $data;

    }
    public function getMenuDetailsGroupMenuItemID(){
        $qqq = "SELECT order_menu_item.menuItemID, sum(order_menu_item.noOfServings) AS sumOfServings ,menu_item.name ,menu_item.availability 
        FROM order_menu_item 
        INNER JOIN menu_item ON menu_item.menuItemID = order_menu_item.menuItemID 
        WHERE menu_item.availability = '0' OR menu_item.availability = '1' OR menu_item.availability = '4' 
        GROUP BY menuItemID";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;

    }
    public function getReservationDetails(){
        $qqq = "SELECT reservation_table.tableNo,reservation._date,reservation.reservationTime,reservation.status,customer.name FROM reservation_table 
        INNER JOIN reservation ON reservation_table.reservationID = reservation.reservationID 
        INNER JOIN customer ON customer.customerID = reservation.customerID 
        GROUP BY reservation._date,reservation_table.tableNo";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;
    }
    public function getCustomerDetailsReport(){
        $qqq = "SELECT name,NIC,address,mobile,username,dob,email,cust_type FROM customer";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;
    }
    public function getReservationDetailsAjax(){
        $qqq = "SELECT COUNT(reservationID) AS count FROM reservation WHERE status = 'Pending'";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;
    }
    public function getOrderDetailsAjax(){
        $qqq = "SELECT COUNT(orderID) AS count FROM _order WHERE status = 'Upcoming'";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;

    }
 

 












}
?>
