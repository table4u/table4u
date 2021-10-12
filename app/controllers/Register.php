<?php
class Register extends Controller
{
    public function __construct()
    {
        $this->selfRegisteredModel = $this->model('SelfRegistered');
        $this->employeeModel = $this->model('Employee');
        // echo "model loaded successfully";
    }

    public function index()
    {
        $data = [
            'name' => '',
            'email' => '',
            'mobile' => '',
            'username' => '',
            'password' => '',
            'confirm_password' => '',
            'mobile_err' => '',
            'name_err' => '',
            'username_err' => '',
            'email_err' => '',
            'pw_err' => '',
            'confirm_pw_err' => ''
        ];

        // Load view
        $this->view('register', $data);
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

            $data = [
                'name' => trim($_POST['name']),
                // 'nic' => trim($_POST['nic']),
                // 'dob' => trim($_POST['dob']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                // 'address' => $address,
                'username' => trim($_POST['username']),
                'password' => trim($_POST['pw']),
                'confirm_password' => trim($_POST['confirm_pw']),
                // 'nic_err' => '',
                'mobile_err' => '',
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'pw_err' => '',
                'confirm_pw_err' => ''
            ];

            //check if email available
            if ($this->selfRegisteredModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken';
            }

            //check if mobile available
            if ($this->selfRegisteredModel->findUserByMobile($data['mobile'])) {
                $data['mobile_err'] = 'Mobile is already taken';
            }

            //check if username avaialble
            if ($this->selfRegisteredModel->findUserByUsername($data['username']) or $this->employeeModel->findEmployeeByUsername($data['username'])) {
                $data['username_err'] = 'Username is already taken';
            }

            //check if nic available
            // if ($this->selfRegisteredModel->findUserByNIC($data['nic'])) {
            //     $data['nic_err'] = 'NIC is already taken';
            // }
            // else{
            //     echo "free email";
            // }

            //validate the strength of the password
            $data['pw_err'] = $this->checkPasswordStrength($data['password']);

            // Validate Confirm Password
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_pw_err'] = 'Passwords do not match';
            }

            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->selfRegisteredModel->registerCustomer($data)) {
                    $_SESSION['successMsg'] = "SUCCESSFULLY REGISTERED. YOU CAN LOG IN NOW";
                    header("Location: " . URLROOT . '/login');
                } else {
                    $_SESSION['unsuccessMsg'] = "SOMETHING WENT WRONG. TRY AGAIN";
                }
            } else {
                // Load view with errors
                $this->view('register', $data);
            }
        } else {

            $data = [
                'name' => '',
                'email' => '',
                'mobile' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'mobile_err' => '',
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'pw_err' => '',
                'confirm_pw_err' => ''
            ];

            // Load view
            $this->view('register', $data);
        }
    }

    public function checkPasswordStrength($pw)
    {
        $uppercase = preg_match('@[A-Z]@', $pw);
        $lowercase = preg_match('@[a-z]@', $pw);
        $number    = preg_match('@[0-9]@', $pw);
        $specialChars = preg_match('@[^\w]@', $pw);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pw) < 8) {
            return 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else {
            return '';
        }
    }
}
