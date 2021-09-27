<?php
class Register extends Controller
{
    public function __construct()
    {
        $this->selfRegisteredModel = $this->model('SelfRegistered');
        // echo "model loaded successfully";
    }

    public function index()
    {
        $this->view('register');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            //debugging
            // die("form submitted correctly");

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $address = '';
            if (isset($_POST['houseNo']) or isset($_POST['line1']) or isset($_POST['line2']) or isset($_POST['city'])) {
                $address = array(trim($_POST['houseNo']), trim($_POST['line1']), trim($_POST['line2']), trim($_POST['city']));
                $address = implode(', ', $address);
            }
            // Init data
            $data = [
                'fname' => trim($_POST['fName']),
                'lname' => trim($_POST['lName']),
                'nic' => trim($_POST['nic']),
                'dob' => trim($_POST['dob']),
                'email' => trim($_POST['email']),
                'address' => $address,
                'username' => trim($_POST['username']),
                'password' => trim($_POST['pw']),
                'confirm_password' => trim($_POST['confirm_pw']),
                'nic_err' => '',
                'userName_err' => '',
                'email_err' => '',
                'pw_err' => '',
                'confirm_pw_err' => ''
            ];

            if ($this->selfRegisteredModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            //validate the strength of the password
            if (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        } else {

            $data = [
                'fname' => '',
                'lname' => '',
                'nic' => '',
                'dob' => '',
                'email' => '',
                'address' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'nic_err' => '',
                'userName_err' => '',
                'email_err' => '',
                'pw_err' => '',
                'confirm_pw_err' => ''
            ];

            // Load view
            $this->view('register', $data);
        }
    }
}
