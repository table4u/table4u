<?php
class MenuItems
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getMenuItemsByReservation($id)
    {
        $query = "SELECT m.name, om.portionSize, om.noOfServings 
        from _order as o, order_menu_item as om, menu_item as m
        WHERE o.reservationID = :id AND o.orderID = om.orderID AND om.menuItemID = m.menuItemID";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();

        return $results;
    }
    public function getMenuItems()
    {
        $this->db->query('SELECT I.menuItemID, I.priceSmall, I.priceMedium, I.priceLarge, I.name, I.veg_NonVeg, I.availability, I.description, I.picture, M.name as MenuName 
                            FROM menu_item as I, menu as M, menu_item_menu as mi
                            WHERE I.menuItemID = mi.menuItemID AND mi.menuID = m.menuID AND I.availability = 1
                            ');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getMenuItemsByName($data)
    {
        $query = "SELECT I.menuItemID, I.priceSmall, I.priceMedium, I.priceLarge, I.name AS ItemName, I.veg_NonVeg, I.availability, I.description, I.picture, M.name as MenuName 
                            FROM menu_item as I, menu as M, menu_item_menu as mi
                            WHERE I.menuItemID = mi.menuItemID AND mi.menuID = m.menuID AND I.availability = 1
                            AND (I.name LIKE :itemName OR M.name LIKE :menuName)";
        $this->db->query($query);
        $this->db->bind(':itemName', '%' . $data['search'] . '%');
        $this->db->bind(':menuName', '%' . $data['search'] . '%');
        $results = $this->db->resultSet();

        return $results;
    }
    public function checkAvailability($id)
    {
        $this->db->query('SELECT availability FROM menu_item WHERE menuItemID = :id');
        // Bind value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        $res = $row->availability;
        // Check row
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function showmenuItems()
    {
        $this->db->query('SELECT * FROM menu_item
                        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
                        WHERE menu_item.availability = "1" ');
        $result = $this->db->resultset();
        return $result;
    }
    public function showApertizers()
    {
        $this->db->query('SELECT * FROM menu_item
                        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
                        WHERE menu_item_menu.menuID = "1" AND menu_item.availability = "1" ');
        $result = $this->db->resultset();
        return $result;
    }

    public function getMaincourse()
    {
        $this->db->query('SELECT * FROM menu_item
                        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
                        WHERE menu_item_menu.menuID = "2" AND menu_item.availability = "1" ');
        $result = $this->db->resultset();
        return $result;
    }

    public function searchMenuItem($filtervalues)
    {
        $this->db->query("SELECT * FROM menu_item
        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
        WHERE CONCAT(menu_item.name,menu_item.veg_NonVeg ) LIKE '%$filtervalues%' ");
        $row = $this->db->resultSet();
        //print_r($row);
        //die();
        return $row;
    }
    public function getDessert()
    {
        $this->db->query('SELECT * FROM menu_item
                        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
                        WHERE menu_item_menu.menuID = "4" AND menu_item.availability = "1" ');
        $result = $this->db->resultset();
        return $result;
    }

    public function getDrinks()
    {
        $this->db->query('SELECT * FROM menu_item
                        INNER JOIN menu_item_menu ON menu_item_menu.menuItemID = menu_item.menuItemID 
                        WHERE menu_item_menu.menuID = "3" AND menu_item.availability = "1" ');
        $result = $this->db->resultset();
        return $result;
    }
    public function addOrderMenuItems($id, $size, $quantity)
    {
        $this->db->query('INSERT INTO order_menu_item(orderID,menuItemID,noOfServings,portionSize)
    values(:ordID,:menuItemID,:noOfServings,:portionSize)');
        $this->db->bind(':meniItemID', $id);
        $this->db->bind(':noOfServings', $quantity);
        $this->db->bind(':portionSize', $size);
        $this->db->bind(':ordID', $_SESSION['order_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
