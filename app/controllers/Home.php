<?php
//default controller
class Home extends Controller
{
    public function __construct()
    {
        // echo "page loaded";

    }

    public function index()
    {   // $this->view('hello');
        // $data = [
        //     // 'title' => "WELCOME",
        // ];
        //return the views
        $this->view('home');
    }

    public function gallery()
    {
        $this->view('gallery');
    }
}
