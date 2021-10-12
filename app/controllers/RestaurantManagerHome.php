<?php

class RestaurantManagerHome extends Controller
{
    public function __construct()
    {
        //only the users with user role restaurant manager can access the method in this class
        isValidUser('Restaurant Manager');

    }

    public function index()
    {
        $this->view('restaurantManagerHome');
    }
}
