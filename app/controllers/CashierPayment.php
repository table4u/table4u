<?php
    class CashierPayment extends Controller{
        public function __construct(){
        isValidUser('Cashier');
        }

        public function index(){
            $this->view('cashierPayment');
        }

        public function backtoHome(){
            $this->view('cashierHome'); 
        }

        public function backtoOrder(){
            $this->view('CashierOrders');
        }

        public function gotoProfile(){
            // $this->view('');  
        }

        public function logout(){
            $this->view('Login');   
        }
    }