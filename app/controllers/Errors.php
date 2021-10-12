<?php

class Errors extends Controller
{
    public function index()
    {
        // $this->view('noAccess');
    }

    public function noAccess()
    {
        $this->view('noAccess');
    }
}
