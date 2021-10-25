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
                            ');
            $result = $this->db->resultset();
            return $result;
        }

        public function getmenuitem(){
            $this->db->query('SELECT * FROM menu_item');
            $result = $this->db->resultset();
            return $result;
        }


        public function add_menu_item($data){
            $this->db->query('INSERT INTO menu_item(name,ingredients,description) VALUES (:i_name,:i_ingredients,:i_recipe)');

            $this->db->bind(':i_name',$data['i_name']);
            $this->db->bind(':i_ingredients',$data['i_ingredients']);
            $this->db->bind(':i_recipe',$data['i_recipe']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteMI($id){
            $this->db->query('DELETE FROM menu_item WHERE menu_item.menuItemID = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            } 
        }
    }