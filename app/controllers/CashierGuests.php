<?php
    class CashierGuests extends Controller{
        public function __construct(){
            isValidUser('Cashier');
            $this->guestModel = $this->model('Customer');
            $_SESSION['x']="12";
        }

        public function index(){
            $this->view('cashierGuests');
        }

        public function backtoHome(){
            $this->view('cashierHome'); 
        }
        
        public function loadAddCustomer(){
            $data =[
                'custName' => '',
                'telNo' => '',
                'NIC' => '',
                'custAddress' => ''
            ]; 
            $this->view('cashierGuests_add', $data ); 
        }

        public function addCustomer(){
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //die("redirected");
               $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

               // Init data
               $data =[
                   'custName' => trim($_POST['custName']),
                   'telNo' => trim($_POST['telNo']),
                   'NIC' => trim($_POST['NIC']),
                   'custAddress' => trim($_POST['custAddress']),
                   'telNo_err' => '',
                   'NIC_err' => '',
                   'name_err' => ''
               ];
               $_SESSION['error'] = "";
              
               // Check
                //if ($this->guestModel->findUserByNIC($data['NIC']) || $this->guestModel->findUserByMobile($data['telNo'])) {
                   
                    // $data['NIC_err'] = ' NIC is not available. ';
                    // $_SESSION['error'] = " NIC already exists. ";
               // }
                 if ($this->guestModel->findUserByMobile($data['telNo'])) {
                    $cus = $this->guestModel->findUserby_mobile($data['telNo']);
                    $_SESSION['customerId']=$cus->customerID;
                    header("Location: " . URLROOT . '/CashierReserveTable');
                //     $data['telNo_err'] = ' Mobile number is not available. ';
                //     $_SESSION['error'] .= " Mobile number already exists. ";
                }

                //validations
                //correct name format
                // $data['name_err'] .= ($data['custName']);

                if (nameValidation($data['custName']) != "") {
                    $_SESSION['error'] .=  " Invalid name format. ";
                    $data['name_err'] .= nameValidation($data['custName']);
                }
                //correct mobile number format
                // $data['telNo_err'] .= mobileValidation($data['telNo']);

                if (mobileValidation($data['telNo']) != "") {
                    $_SESSION['error'] .=" Invalid mobile number format. ";
                     $data['telNo_err'] .= mobileValidation($data['telNo']);
      
                }
                if($data['NIC']!= ""){
                if (nicValidation($data['NIC']) != "") {
                    $_SESSION['error'] .=" Invalid NIC format. ";
                     $data['NIC_err'] .= nicValidation($data['NIC']);
                    //  print_r($data);
                    //  print($_SESSION['error']);
                    //  die();
                }
                }
                            
                // No erros then add customer
                if (empty($data['telNo_err']) && empty($data['name_err']) && !($this->guestModel->findUserByMobile($data['telNo']))){
                    //die("method");
                    if ($this->guestModel->addCustomer($data)) {
                        // die("database");
                        $cus = $this->guestModel->findUserby_mobile($data['telNo']);
                        $_SESSION['customerId']=$cus->customerID;
                        $_SESSION['successMsg'] = " CUSTOMER SUCCESSFULLY ADDED. ";
                        header("Location: " . URLROOT . '/CashierReserveTable');

                        // $addedCustomer = $this->guestModel->addCustomer($data);
                        // $_SESSION['cust_id'] = $addedCustomer->customerID;
                        

                    } else {
                        $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
                        $this->view('cashierGuests_add', $data);
                    }
 
               } else {
                    // $_SESSION['unsuccessMsg'] = "SOMETHING WENT WRONG. TRY AGAIN";
                    // $_SESSION['telNo_err'] = "SOMET. TRY AGAIN";
                     $this->view('cashierGuests_add', $data);
                    
               }
               
            } else {
              $data =[
                'custName' => '',
                'telNo' => '',
                'NIC' => '',
                'custAddress' => ''
              ]; 
              // Load view
              $this->view('cashierGuests', $data); 
            }
        }

        // Start of search

        public function searchcustomersUnreg(){
            if(isset($_GET['search'])){
                $filtervalues = $_GET['search'];
                $data = $this->guestModel->searchcustomers($filtervalues);
                $this->view('cashierGuests_unreg',$data); 
            }
        }

        public function searchcustomersReg(){
            if(isset($_GET['search'])){
                $filtervalues = $_GET['search'];
                $data = $this->guestModel->searchcustomers($filtervalues);
                $this->view('cashierGuests_reg',$data); 
            }
        }

        // End of search

        public function showRegisterCustomers(){
            $data = $this->guestModel->showRegisterCustomers();
            $this->view('cashierGuests_reg',$data); 
        }

        public function showUnregisterCustomers(){
            $data = $this->guestModel->showUnregisterCustomers();
            $this->view('cashierGuests_unreg',$data); 
        }

    public function logout()
    {
        unset($_SESSION['customerId']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header("Location: " . URLROOT . '/login');
    }
    }