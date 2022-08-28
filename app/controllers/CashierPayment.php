<?php
    class CashierPayment extends Controller{
        public function __construct(){
            isValidUser('Cashier');
            $this->paymentModel = $this->model('Payment');
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

        public function gotopay(){
             $this->view('cashierCashPay');  
        }

        public function gotoProfile(){
            // $this->view('');  
        }

        // Start of showing payment details

        public function showCompletedpayments(){
            $data = $this->paymentModel->showCompletedpayments();
            $this->view('cashierPayment', $data); 
        }
        // End of showing payment details

        // Start of searching payments

        public function searchCompletedPayments(){
            if(isset($_GET['search'])){
                $filtervalues = $_GET['search'];
                $data = $this->paymentModel->searchCompletedPayments($filtervalues);
                $this->view('cashierPayment',$data); 
            }
        }

        // End of searching payments

        // Start of transaction
        public function doTransaction($total){
            if($this->paymentModel->doTransaction($total)){
                header("Location: " . URLROOT . '/CashierPayment/showCompletedpayments');
            }
            // if(isset($_GET['id'])){
            //     $filtervalues = $_GET['id'];
            //     $this->paymentModel->doTransaction($filtervalues);
            //     $this->view('cashierPayment _updated',$data); 
            //     header("Location: " . URLROOT . '/CashierPayment/showCompletedpayments');
            // }
        }

        public function showError(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 //die("redirected");
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
 
                // Init data
                $total = trim($_POST['no1']);
                $recived = trim($_POST['no2']);
                $data =[
                    'total' => trim($_POST['no1']),
                    'recived' => trim($_POST['no2']),
                    'balance' => trim($_POST['no2']) - trim($_POST['no1']) ,
                    'bal_err' => ''
                ];
                // print_r($data);
        
                $_SESSION['error'] = "";
                // Check
                 if ($data['balance'] < 0 ){
                     $data['bal_err'] = "Insufficient money !";
                     $_SESSION['error'] = "  Insufficient money !  ";
                 }
                //  if (empty($data['bal_err'])){
                     //die("method");
                    //  if ($this->paymentModel->showError($data)) {
                    //      // die("database");
                    //      $_SESSION['successMsg'] = "  SUCCESSFULL ";
                        //   header("Location: " . URLROOT . '/CashierPayment/showCompletedpayments');header("Location: " . URLROOT . '/CashierPayment/showCompletedpayments');
                    //  } else {
                    //      $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
                    //      $this->view('cashierCashPay', $data);
                    //  }
                     
                // } else {
                     // $_SESSION['unsuccessMsg'] = "SOMETHING WENT WRONG. TRY AGAIN";
                     // $_SESSION['telNo_err'] = "SOMET. TRY AGAIN";
                      $this->view('cashierCashPay', $data);
                     
                }
                
              else {
               $data =[
                'total' => '',
                'received' => '',
                'balance' => ''
               ]; 
              // Load view
               $this->view('cashierCashPay',$data); 
             }
         }

        // public function changePaymentType(){
        //     if(isset($_GET['no1'])){
        //         $filtervalues = $_GET['no1'];
        //         $data = $this->paymentModel->changePaymentType($filtervalues);
        //        $this->view('cashierPayment _updated',$data); 
        //     }
        // }

        // End of transaction


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