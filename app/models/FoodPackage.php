<?php
class FoodPackage
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertFoodPackage($data)
    {
        $this->db->query('INSERT INTO food_package(customerID, name) 
                        VALUES(:customerID, :name)');
        // Bind values
        $this->db->bind(':customerID', $data['customerID']);
        $this->db->bind(':name', $data['package_name']);

        // Execute
        if ($this->db->execute()) {
            $this->db->query('SELECT LAST_INSERT_ID() as foodpackageID from food_package');
            $result = $this->db->single();
            // print_r($result);
            $_SESSION['foodpackageID'] = $result->foodpackageID;
            return true;
        } else {
            return false;
        }
    }

    public function insertFoodItems($data)
    {
        $this->db->query('INSERT INTO food_package_menu_item(menuItemID, foodPackageID, portionSize, noOfServings) 
                        VALUES(:menuItemID, :foodpackageID, :portionSize, :amount)');
        // Bind values
        $this->db->bind(':menuItemID', $data['menuItemID']);
        $this->db->bind(':foodpackageID', $_SESSION['foodpackageID']);
        $this->db->bind(':portionSize', $data['portionSize']);
        $this->db->bind(':amount', $data['amount']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getFoodPackageIDs($userID)
    {
        $query = 'SELECT fp.foodPackageID, fp.name from food_package as fp WHERE customerID = :userID ';
        $this->db->query($query);
        $this->db->bind(':userID', $userID);
        $row = $this->db->resultSet();
        return $row;
    }
    public function getFoodPackageItems($packageID)
    {
        $query = 'SELECT fp.name as packageName, fm.menuItemID, portionSize, m.name AS ItemName, noOfServings, m.priceSmall, m.priceMedium, m.priceLarge 
        from food_package_menu_item fm, menu_item as m, food_package as fp
        WHERE fp.foodPackageID = :packageID AND m.menuItemID = fm.menuItemID AND fp.foodPackageID = fm.foodPackageID;';
        $this->db->query($query);
        $this->db->bind(':packageID', $packageID);
        $row = $this->db->resultSet();
        return $row;
    }

    public function deleteFoodPackage($id)
    {
        $this->db->query("DELETE FROM food_package WHERE foodPackageID = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            $this->db->query("DELETE FROM food_package_menu_item WHERE foodPackageID = :fID");
            $this->db->bind(':fID', $id);

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
