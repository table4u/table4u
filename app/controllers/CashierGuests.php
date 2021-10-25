<?php
class CashierGuests extends Controller
{
    public function __construct()
    {
        $this->guestModel = $this->model('Customer');
        isValidUser('Cashier');
    }

    public function index()
    {
        $this->view('cashierGuests');
    }

    public function backtoHome()
    {
        $this->view('cashierHome');
    }

    public function addCustomer()
    {
        $this->view('cashierGuests_add');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //    die("redirected");
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'custName' => trim($_POST['custName']),
                'telNo' => trim($_POST['telNo']),
                'NIC' => trim($_POST['NIC']),
                'custAddress' => trim($_POST['custAddress']),
                'telNo_err' => '',
                'NIC_err' => ''
            ];

            // Check
            if ($this->guestModel->findUserByMobile($data['telNo'])) {
                $data['telNo_err'] = 'Mobile number is not available.';
            }
            if ($this->guestModel->findUserByMobile($data['NIC'])) {
                $data['NIC_err'] = 'NIC is not available.';
            }
            // No erros then add customer
            if (empty($data['telNo_err']) && empty($data['NIC_err'])) {
                // die("method");
                if ($this->guestModel->addCustomer($data)) {
                    die("database");
                    $_SESSION['successMsg'] = "SUCCESSFULLY REGISTERED. YOU CAN LOG IN NOW";
                    header("Location: " . URLROOT . '/login');
                } else {
                    $_SESSION['unsuccessMsg'] = "SOMETHING WENT WRONG. TRY AGAIN";
                }
            } else {
                $this->view('cashierGuests_add');
            }
        } else {
            $data = [
                'custName' => '',
                'telNo' => '',
                'NIC' => '',
                'custAddress' => ''
            ];
            // Load view
            //   $this->view('cashierGuests', $data); 
        }
    }

    public function showallcustomers()
    {
        $data = $this->guestModel->showallcustomers();
        $this->view('cashierGuests', $data);
    }

    public function showRegisterCustomers()
    {
        $data = $this->guestModel->showRegisterCustomers();
        $this->view('cashierGuests_reg', $data);
    }

    public function showUnregisterCustomers()
    {
        $data = $this->guestModel->showUnregisterCustomers();
        $this->view('cashierGuests_unreg', $data);
    }

    public function logout()
    {
        $this->view('Login');
    }
}
