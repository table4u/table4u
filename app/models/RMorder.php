<?php      

class RMorder {

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getOrderDetails(){
        $qqq1 = "SELECT _order.orderID,customer.name AS custname ,_order.status, menu_item.name,order_menu_item.noOfServings,order_menu_item.portionSize FROM _order 
        INNER JOIN reservation ON _order.reservationID = reservation.reservationID 
        INNER JOIN customer ON reservation.customerID = customer.customerID 
        INNER JOIN order_menu_item ON order_menu_item.orderID = _order.orderID 
        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = order_menu_item.menuItemID 
        INNER JOIN menu_item ON menu_item.menuItemID = menu_item_menu.menuItemID";



            $this->db->query($qqq1);
            $data = $this->db->resultSet();
            return $data;

    }
    public function searchOrder($filtervalues){
        $qqq = "SELECT _order.orderID,customer.name AS custname ,_order.status, menu_item.name,order_menu_item.noOfServings,order_menu_item.portionSize FROM _order 
        INNER JOIN reservation ON _order.reservationID = reservation.reservationID 
        INNER JOIN customer ON reservation.customerID = customer.customerID 
        INNER JOIN order_menu_item ON order_menu_item.orderID = _order.orderID 
        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = order_menu_item.menuItemID 
        INNER JOIN menu_item ON menu_item.menuItemID = menu_item_menu.menuItemID
        WHERE CONCAT(customer.name,_order.status,menu_item.name,order_menu_item.noOfServings,order_menu_item.portionSize) LIKE '%$filtervalues%'";
        $this->db->query($qqq);
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;

    }

 












}
?>










