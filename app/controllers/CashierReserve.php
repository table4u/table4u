<?php
class CashierReserve extends Controller
{
    public function __construct()
    {
        isValidUser('Cashier');
    }

    public function index()
    {
        $this->view('cashierReserve');
    }

    public function backtoHome()
    {
        $this->view('cashierHome');
    }

    public function reserves()
    {
        $this->view('cashierReserve_updated');
    }

    public function nreserve()
    {
        $this->view('cashierReserve_newlyupdated');
    }

    public function gotoProfile()
    {
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
