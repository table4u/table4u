<?php

use function PHPSTORM_META\type;

class CustomerProfile extends Controller
{
    public function __construct()
    {
        if (isValidUser('Customer')) {
            $this->selfRegisteredModel = $this->model('SelfRegistered');
            $this->user = $this->selfRegisteredModel->getUserDetails($_SESSION['user_id']);
            // print_r($this->user);
            // die();
        }
    }

    public function index()
    {
        $this->view('customerProfile', $this->user);
    }

    public function profile()
    {
        $this->view('customerProfile', $this->user);
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            //debugging
            // die("form submitted correctly");

            // Sanitize POST data
            // die(gettype($_POST['dob']));
            // die(gettype($r));
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // $dob = $_POST['dob']->format("Y-m-d");
            $data = [
                'name' => trim($_POST['name']),
                'nic' => trim($_POST['nic']),
                'dob' => trim($_POST['dob']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'address' => trim($_POST['address']),
                'nic_err' => '',
                'mobile_err' => '',
                'name_err' => '',
                'email_err' => ''
            ];
            // die(($data['dob']));
            // //check if email available
            // if ($this->selfRegisteredModel->findUserByEmail($data['email'])) {
            //     $data['email_err'] = 'Email is already taken';
            // }

            // //check if mobile available
            // if ($this->selfRegisteredModel->findUserByMobile($data['mobile'])) {
            //     $data['mobile_err'] = 'Mobile is already taken';
            // }
            //check nic error
            //check name error
            if (empty($data['email_err']) && empty($data['mobile_err'])) {

                if ($this->selfRegisteredModel->editDetails($data)) {
                    $_SESSION['editSuccessMsg'] = "SUCCESSFULLY UPDATED";
                    header("Location: " . URLROOT . '/customerProfile');
                } else {
                    $_SESSION['unsuccessMsg'] = "SOMETHING WENT WRONG. TRY AGAIN";
                }
            } else {
                // Load view with errors
                $this->view('customerProfile', $this->user);

            }
        } else {
            $this->view('customerProfile', $this->user);

        }
    }
}
