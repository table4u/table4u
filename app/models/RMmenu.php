
<?php

use LDAP\Result;

class RMmenu{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_menu_details(){
        $qqq = "SELECT * FROM menu_item";
        $this->db->query($qqq);
         
        $data = $this->db->resultSet();
        return $data;
        
    }
    public function menumore($menuid){
        //echo "In model".$menuid;
        $qqq = 'SELECT * FROM menu_item WHERE MenuItemID = "'.$menuid.'" ';
        $this->db->query($qqq); 
       $row=  $this->db-> single();
       //print_r($row);
       return $row;
       
    }
    public function menuDetailsDefault(){
        $qqq = "SELECT * FROM menu_item WHERE availability = '1' OR availability ='0'";
        $this->db->query($qqq); 
       
       $data=  $this->db-> resultSet();
       //print_r($row);
       return $data;

    }
    public function change_availability($menuID,$availability){
        $qqq = "UPDATE menu_item SET availability ='$availability' WHERE menuItemID ='$menuID'";
        $this->db->query($qqq);
        $data = $this->db->execute();
        return $data;

    }
    public function update_menu_data($header,$name,$veg,$description,$small_price,$medium_price,$large_price,$menuID){

        $qqq = "UPDATE menu_item SET name = '$name', veg_NonVeg = '$veg', description = '$description',priceSmall = '$small_price',priceMedium = '$medium_price',priceLarge = '$large_price' WHERE menuItemID = '$menuID'";
        $this->db->query($qqq);
        return $this->db->execute();


    }
    public function get_Menu_ItemAccept(){
        $qqq = "SELECT * FROM menu_item WHERE availability = 3";
        $this->db->query($qqq);
        $data = $this->db->resultSet();
        return $data;
    }
    public function AddMenuItem($menuID,$smallPrice,$mediumPrice,$largePrice){
        $qqq = "UPDATE menu_item SET priceSmall = '$smallPrice', priceMedium ='$mediumPrice', priceLarge = '$largePrice', availability='1' WHERE menuItemID = '$menuID'";
        $this->db->query($qqq);
       // $this->db->bind(':small',$smallPrice);
      //  $this->db->bind(':medium',$mediumPrice);
       // $this->db->bind(':large',$largePrice);
       // $this->db->bind(':menuid',$menuID);
        $result = $this->db->execute();
        return $result;

    }
    public function RejectMenuItemModel($menuID){
        $qqq = "UPDATE menu_item SET Availability = '2' WHERE menuItemID = '$menuID'";
        $this->db->query($qqq);
        $result = $this->db->execute();
        return $result;
    
    }
    public function deleteMenuItem($menuID){
        $qqq = "UPDATE menu_item SET availability = '4' WHERE menuItemID = '$menuID'";
        $this->db->query($qqq);
        $result = $this->db->execute();
        return $result;

    }
    public function searchMenu($filtervalues){
        $qqq = "SELECT * FROM menu_item WHERE CONCAT(name,priceSmall,priceMedium,PriceLarge) LIKE '%$filtervalues%' ";
        $this->db->query($qqq);
  
        $row = $this->db->resultSet();
        //print_r($row);
        // die();
        return $row;
    }





}
