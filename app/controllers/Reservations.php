<?php

class Reservations extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->reservationModel = $this->model('Reservation');
    }

    public function index()
    {
        $this->view('customerHome');
    }

    public function reservationDetails()
    {
        $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
        die($data);
        $this->view('customerReservations', $data);
    }

    public function makeReservations()
    {
        $this->view('customerTableLayout');
    }
}
