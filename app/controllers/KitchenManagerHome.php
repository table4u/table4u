<?php

class KitchenManagerHome extends Controller
{
    public function __construct()
    {
        // if ($_SESSION['user_role'] != 'Kitchen Manager') {
        //     // die("You do not have permision");
        //     header("Location: " . URLROOT . '/errors/noAccess');
        // }

        isValidUser('Kitchen Manager');

    }

    public function index()
    {
        $this->view('kitchenManagerHome');
    }
}
