<?php
    class Menu{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getmenu(){
            $this->db->query('SELECT * ,
                            menu.name as menu_name,
                            menu_item.name as menu_item_name
                            FROM menu
                            INNER JOIN menu_item_menu
                            ON menu_item_menu.menuID = menu.menuID
                            INNER JOIN menu_item
                            ON menu_item.menuItemID = menu_item_menu.menuItemID
                            ORDER BY menu_item.menuItemID DESC
                            ');
            $result = $this->db->resultset();
            return $result;
        }
        public function get_menu(){
            $this->db->query('SELECT menu.name, menu.menuID FROM menu');
            $result = $this->db->resultset();
            return $result;
        }
        public function get_menuT($id){
            $this->db->query("SELECT menu.name FROM menu 
                            INNER JOIN menu_item_menu ON menu_item_menu.menuID = menu.menuID
                            WHERE menu_item_menu.menuItemID = :id 
                            ");
            $this->db->bind(':id',$id);
            // $this->db->execute();
            $result = $this->db->resultset();
            return $result;
        }

        public function getmenuitem(){
            $this->db->query('SELECT * FROM menu_item');
            $result = $this->db->resultset();
            return $result;
        }

        public function add_menu_item($data){
            $this->db->query('INSERT INTO menu_item(name,ingredients,recipe,veg_NonVeg,costSmall,costMedium,costLarge,availability,picture) 
                            VALUES (:i_name,:i_ingredients,:i_recipe,:i_veg,:i_cost_s,:i_cost_m,:i_cost_l,:i_avail,:i_image)');

            $this->db->bind(':i_name',$data['i_name']);
            $this->db->bind(':i_ingredients',$data['i_ingredients']);
            $this->db->bind(':i_recipe',$data['i_recipe']);
            $this->db->bind(':i_veg',$data['i_veg']);
            $this->db->bind(':i_cost_s',$data['i_cost_s']);
            $this->db->bind(':i_cost_m',$data['i_cost_m']);
            $this->db->bind(':i_cost_l',$data['i_cost_l']);
            $this->db->bind(':i_avail',$data['i_avail']);
            $this->db->bind(':i_image',$data['i_image']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function add_menu_type($data){
            $this->db->query('INSERT INTO menu_item_menu(menuItemID,menuID) VALUES(LAST_INSERT_ID(),:i_menuT)');
            $this->db->bind(':i_menuT',$data['i_menuT']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteMI($id){
            $this->db->query('UPDATE menu_item SET availability =:avail WHERE menuItemID = :id');
            // $this->db->query('DELETE FROM menu_item_menu WHERE menu_item_menu.menuItemID = :id');
            $this->db->bind(':id',$id);
            $this->db->bind(':avail',"4");
            if($this->db->execute()){
                return true;
            } else {
                return false;
            } 
        }

        public function update($data,$id){
            $this->db->query('UPDATE menu_item SET ingredients = :i_ingredients, recipe = :i_recipe, veg_NonVeg = :i_veg, 
                            costSmall = :i_cost_s, costMedium = :i_cost_m, costLarge = :i_cost_l, availability = :i_avail,
                            picture = :i_image WHERE menuItemID = :id');

            $this->db->bind(':i_ingredients',$data['i_ingredients']);
            $this->db->bind(':i_recipe',$data['i_recipe']);
            $this->db->bind(':i_veg',$data['i_veg']);
            $this->db->bind(':i_cost_s',$data['i_cost_s']);
            $this->db->bind(':i_cost_m',$data['i_cost_m']);
            $this->db->bind(':i_cost_l',$data['i_cost_l']);
            $this->db->bind(':i_avail',$data['i_avail']);
            $this->db->bind(':i_image',$data['i_image']);
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updatemenutype($data,$id){
            $this->db->query('UPDATE menu_item_menu SET menuID = :i_menuT WHERE menuItemID = :id');
            $this->db->bind(':i_menuT',$data['i_menuT']);
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateAvail($data){
            $this->db->query('UPDATE menu_item SET availability = :avail WHERE menuItemID = :id');

            $this->db->bind(':avail',$data['avail']);
            $this->db->bind(':id',$data['id']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function checkFoodName($data){
            $this->db->query('SELECT * FROM menu_item WHERE name = :name AND availability != "4"');
            $this->db->bind(':name', $data);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return false;
    } else {
      return true;
    }
        }
    }