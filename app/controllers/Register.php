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


            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'mobile' => trim($_POST['mobile']),
                'username' => trim($_POST['username']),
                'password' => trim($_POST['pw']),
                'confirm_password' => trim($_POST['confirm_pw']),
                'vkey' => '',
                'mobile_err' => '',
                'name_err' => '',
                'username_err' => '',
                'email_err' => '',
                'pw_err' => '',
                'confirm_pw_err' => ''
            ];

            $data['vkey'] = md5(time() . $data['username']);
            // die($data['vkey']);

            //check if email available
            if ($this->selfRegisteredModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'An account already exists with this email address. Please try login';
            }

            //check if mobile available
            if ($this->selfRegisteredModel->findUserByMobile($data['mobile'])) {
                $data['mobile_err'] = 'Mobile is already taken';
            }

            //check if username avaialble
            if ($this->selfRegisteredModel->findUserByUsername($data['username']) or $this->employeeModel->findEmployeeByUsername($data['username'])) {
                $data['username_err'] = 'Username is already taken';
            }

            //validations
            //correct name format
            $data['name_err'] = nameValidation($data['name']);

            //correct mobile number format
            $data['mobile_err'] = mobileValidation($data['mobile']);


            //validate the strength of the password
            $data['pw_err'] = checkPasswordStrength($data['password']);

            // Validate Confirm Password
            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_pw_err'] = 'Passwords do not match';
            }

            //validate email
            $vkey = md5(time() . $data['username']);
            $data['vkey'] = $vkey;

            if (empty($data['email_err']) && empty($data['mobile_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->selfRegisteredModel->registerCustomer($data)) {
                    //send verification mail
                    $mail = new Mailer();
                    $subject = "Verification Link";
                    $body = "<strong>Dear Mr./Ms. " . $data['name'] . ",</strong></br></br>
                    Please verify your account to proceed with. </br>
                    <a href='http://localhost/gp1/register/verifyEmail/$vkey'>Verification Link</a>
                    </br></br>

                    Best Regards, </br>
                    Team Table4U
                    ";

                    $mail->mailto($subject, $data['email'], $body);

                    header("Location: " . URLROOT . '/register/thankyou');

                    // $mail->mailto($subject, $data['email'], $body);
                    // $_SESSION['successMsg'] = "SUCCESSFULLY REGISTERED. YOU CAN LOG IN NOW";

                    // //ON SUCCESS, send an email to customer address
                    // $mail = new Mailer();

                    // $subject = "Welcome to Hotel De Luna!";
                    // $body = "<strong>Dear Mr./Mrs.".$data['name'].",</strong></br>
                    // Thank you for registering with Hotel de Luna! Now you can log in and make reservations and order food.
                    // Bon apetit";

                    // //call function in class
                    // $mail->mailto($subject, $data['email'], $body);
                    // header("Location: " . URLROOT . '/login');
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

    public function thankyou()
    {
        $this->view('thankyou');
    }

    public function verifyEmail($vkey)
    {
        // die($vkey);
        if ($this->selfRegisteredModel->verifyEmail($vkey)) {
            $_SESSION['successMsg'] = "Successfully registered. You can log in now";

            header("Location: " . URLROOT . '/login');
        } else {
            $_SESSION['unsuccessMsg'] = "Email verification failed. Try Again";
            // die($_SESSION['unsuccessMsg']);
            header("Location: " . URLROOT . '/register');
        }
    }
}
