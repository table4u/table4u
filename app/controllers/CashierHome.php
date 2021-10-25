<?php
class CashierHome extends Controller
{
    public function __construct()
    {
        $this->guestModel = $this->model('Customer');
        isValidUser('Cashier');
    }

    public function index()
    {
        $this->view('cashierHome');
    }

    public function guests()
    {
        $data = $this->guestModel->showallcustomers();
        $this->view('cashierGuests');
    }

    public function orders()
    {
        $this->view('cashierOrders');
    }

    public function payment()
    {
        $this->view('cashierPayment');
    }

    public function reserve()
    {
        $this->view('cashierReserve');
    }

    public function gotoProfile()
    {
        // $this->view(''); 
    }

    public function logout()
    {
        $this->view('Login');
    }
}
