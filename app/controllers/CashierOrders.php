<?php
    class CashierOrders extends Controller{
        public function __construct(){
        isValidUser('Cashier');
        }

        public function index(){
            $this->view('cashierOrders');
        }

        public function backtoHome(){
            $this->view('cashierHome'); 
        }

        public function paybyCash(){
            $this->view('cashierCashPay'); 
        }

        public function paybyCard(){
            $this->view('cashierCardPay'); 
        }

        public function showMaincourse(){
            $this->view('cashierOrders _maincourse'); 
        }

        public function showDessert(){
            $this->view('cashierOrders_dessert'); 
        }

        public function gotoProfile(){
            // $this->view('');  
        }

        public function logout(){
            $this->view('Login');   
        }
    }