<?php

class CashierHome extends Controller
{
    public function __construct()
    {
        isValidUser('Cashier');

    }

    public function index()
    {
        $this->view('cashierHome');
    }
}
