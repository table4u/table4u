<?php
class CashierOrders extends Controller
{
    public function __construct()
    {
        isValidUser('Cashier');
        $this->orderModel = $this->model('MenuItems');
    }

    public function index()
    {
        $this->view('cashierOrders');
    }

    public function backtoHome()
    {
        $this->view('cashierHome');
    }

    public function paybyCash()
    {
        $this->view('cashierCashPay');
    }

    public function paybyCard()
    {
        $this->view('cashierCardPay');
    }

    public function gotoProfile()
    {
        // $this->view('');  
    }
    public function searchMenuItem()
    {
        if (isset($_GET['search'])) {
            $filtervalues = $_GET['search'];
            $data = $this->orderModel->searchMenuItem($filtervalues);
            $this->view('cashierOrderMenu', $data);
        }
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
