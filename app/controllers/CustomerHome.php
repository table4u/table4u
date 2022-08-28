<?php

class CustomerHome extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->reservationModel = $this->model('Reservation');
    }

    public function index()
    {
        $res = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
        $data['resDetails'] = $res;
        
        $this->view('customerHome', $data);
    }

    // public function getReservationDetails()
    // {
    //     $reservation = new Reservations();
    //     $data = $reservation->reservationDetails();
    //     $this->view('customerHome',$data);
    // }


}
