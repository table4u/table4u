<?php

use function PHPSTORM_META\type;

class CustomerProfile extends Controller
{
    public function __construct()
    {
        if (isValidUser('Customer')) {
            $this->selfRegisteredModel = $this->model('SelfRegistered');
            // $this->user = $this->selfRegisteredModel->getUserDetails($_SESSION['user_id']);
            // print_r($this->user);
            // die();
        }
    }

    public function index()
    {
        $this->user = $this->selfRegisteredModel->getUserDetails($_SESSION['user_id']);
        $this->view('customerProfile', $this->user);
    }

    public function profile()
    {
        $this->user = $this->selfRegisteredModel->getUserDetails($_SESSION['user_id']);
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
                'email_err' => '',
                'dob_err' => ''
            ];
            // die(($data['dob']));           

            //validations
            //correct name format
            $data['name_err'] = nameValidation($data['name']);

            //correct mobile number format
            $data['mobile_err'] = mobileValidation($data['mobile']);

            //nic validation
            $data['nic_err'] = nicValidation($data['nic']);
            // print_r($data);
            // die();

            //dob validation
            $dob = date("Y-m-d", strtotime($data['dob']));
            $todayDate = date("Y-m-d");
            // echo $dob;
            // echo $todayDate;
            // echo $dob >= $todayDate;
            // die();
            // print_r($data);
            // die();
            if ($dob >= $todayDate) {
                $data['dob_err'] = "Please select a valid date";
            }
            if (empty($data['email_err']) && empty($data['mobile_err']) && empty($data['name_err']) && empty($data['nic_err']) && empty($data['dob_err'])) {

                if ($this->selfRegisteredModel->editDetails($data)) {
                    $_SESSION['editSuccessMsg'] = "Successfully updated";
                    header("Location: " . URLROOT . '/customerProfile');
                } else {
                    $_SESSION['unsuccessMsg'] = "Something went wrong. Try again";
                    header("Location: " . URLROOT . '/customerProfile');
                }
            } else {
                // Load view with errors
                $_SESSION['unsuccessMsg'] = "Edit was unsuccessful. Try again";
                header("Location: " . URLROOT . '/customerProfile');
            }
        } else {
            $this->view('customerProfile', $this->user);
        }
    }
}
