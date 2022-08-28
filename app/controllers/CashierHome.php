<?php
    class CashierHome extends Controller {
        public function __construct(){
        isValidUser('Cashier');
            $this->guestModel = $this->model('Customer');
        }

        public function index(){
           $this->view('cashierHome'); 
        }

        public function guests(){
          // $data = $this->guestModel->showallcustomers();
            $this->view('cashierGuests_add'); 
            // $this->view('cashierCustomer_add'); 
            
        } 

        public function orders(){
            $this->view('cashierOrders'); 
        } 

         //Extra

        public function morders(){
            $this->view('cashierOrders _maincourse'); 
        }
        
        public function dorders(){
            $this->view('cashierOrders_dessert'); 
        } 

        //Extra


        // public function payment(){
            
        //     $data = $this->guestModel->showPendingpayments();
        //     $this->view('cashierPayment',$data); 
        // } 

        // public function payments(){
        //     $this->view('cashierPayment _updated'); 
        // } 

        //Extra

        public function reserve(){
           // $this->view('cashierReserve'); 
           $this->view('cashierReserve_table'); 
        } 

        public function gotoProfile(){
            // $this->view(''); 
        }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header("Location: " . URLROOT . '/login');
    }
    }