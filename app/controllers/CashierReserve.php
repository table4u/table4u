<?php
    class CashierReserve extends Controller{
        public function __construct(){
        isValidUser('Cashier');
        }

        public function index(){
            $this->view('cashierReserve');
        }

        public function backtoHome(){
            $this->view('cashierHome'); 
        }

        public function gotoProfile(){
            // $this->view('');  
        }

        public function logout(){
            $this->view('Login');   
        }
    }