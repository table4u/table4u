<?php

class CustomerHome extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');

    }

    public function index()
    {
        $this->view('customerHome');
    }

    // public function getReservationDetails()
    // {
    //     $reservation = new Reservations();
    //     $data = $reservation->reservationDetails();
    //     $this->view('customerHome',$data);
    // }

    public function profile(){
        $this->view('customerProfile');
    }
}
