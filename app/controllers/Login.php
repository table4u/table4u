<?php
class Login extends Controller
{
    public function __construct()
    {
        $this->selfRegisteredModel = $this->model('SelfRegistered');
        $this->employeeModel = $this->model('Employee');
    }

    public function index()
    {
        $data = [
            'username' => '',
            'password' => '',
            'username_err' => '',
            'pw_err' => '',
        ];

        $this->view('login', $data);
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die("login method");
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'pw_err' => '',
            ];

            // Check for customer
            if ($this->selfRegisteredModel->findUserByUsername($data['username'])) {
                // die("insdide customer");

                if (empty($data['username_err']) && empty($data['pw_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->selfRegisteredModel->loginCustomer($data['username'], $data['password']);
                    // print_r($loggedInUser);
                    // echo gettype($_SESSION['verified']);
                    // die($_SESSION['user_id']);
                    // die("insdide customer");

                    if ($loggedInUser) {
                        if ($loggedInUser->verified == '1') {

                            // Create Session
                            $_SESSION['user_id'] = $loggedInUser->customerID;
                            $_SESSION['user_role'] = 'Customer';
                            // $_SESSION['reservation_id'] = $this->selfRegisteredModel->getNextReservationID() + 1;
                            $_SESSION['order_id'] = $this->selfRegisteredModel->getNextOrderID() + 1;
                            $_SESSION['isTableReserved'] = false;
                            $this->createUserSession($loggedInUser);

                            header("Location: " . URLROOT . '/customerHome');
                        } else {
                            $_SESSION['notVerified'] = "Please verify your email address to login";
                            $this->view('login', $data);
                        }
                        //  else {
                        //     $_SESSION['notVerified'] = "Please verify your email address to login";
                        //     $this->view('login', $data);
                    } else {
                        $_SESSION['notVerified'] = "Something went wrong. Please try again";

                        $this->view('login', $data);
                    }
                } else {
                    // Load view with errors
                    $data['pw_err'] = 'Password incorrect';
                    $this->view('login', $data);
                }
            }
            //check for employee
            else if ($this->employeeModel->findEmployeeByUsername($data['username'])) {
                if (empty($data['username_err']) && empty($data['pw_err'])) {
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->employeeModel->loginEmployee($data['username'], $data['password']);
                    // die("insdide employee");

                    if ($loggedInUser) {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                        $_SESSION['user_id'] = $loggedInUser->empID;

                        //assign role type
                        if ($loggedInUser->empType == 'Cashier') {
                            $_SESSION['user_role'] = 'Cashier';
                            header("Location: " . URLROOT . '/cashierReserveTable');
                        } else if ($loggedInUser->empType == 'Kitchen Manager') {
                            $_SESSION['user_role'] = 'Kitchen Manager';
                            // print_r($loggedInUser);
                            // die($_SESSION['user_role']);
                            header("Location: " . URLROOT . '/pages/index');
                        } else if ($loggedInUser->empType == 'Restaurant Manager') {
                            $_SESSION['user_role'] = 'Restaurant Manager';
                            header("Location: " . URLROOT . '/restaurantManagerHome');
                        }
                    } else {
                        $data['pw_err'] = 'Password incorrect';
                        $this->view('login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('login', $data);
                    $this->view('login', $data);
                }
            }
            // User not found
            else {

                $data['username_err'] = 'No user found';
                $this->view('login', $data);
            }
        } else {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'usernmae_err' => '',
                'pw_err' => '',
            ];

            // Load view
            $this->view('login', $data);
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header("Location: " . URLROOT . '/login');
    }

    public function createUserSession($user)
    {
        // $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        // header("Location: " . URLROOT . '/customerHome');

    }

    public function resetPassword()
    {
        $this->view("customerResetPW");
    }

    public function resetRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $htoken = bin2hex($token);
            $url = "http://localhost/gp1/login/createNewPassword/$selector/$htoken";

            $expires = date("U") + 1800;

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['username']),
                'selector' => $selector,
                'token' => password_hash($token, PASSWORD_DEFAULT),
                'expire' => $expires
            ];
            if ($this->selfRegisteredModel->resetPassword($data)) {
                //semd reset mail
                $mail = new Mailer();
                $subject = "Password Reset Mail";
                $body = "<p> We received a password reset request. The link to reset your password is geiven below. 
                            If you did not make thos request, you can igmore this mail 
                        </p>
                        <br><br>
                        <p> Here is your password reset link:
                        <a href='$url'>Password reset link</a>
                        </br></br>
                        Best Regards, </br>
                        Team Table4U
                    ";

                $mail->mailto($subject, $data['email'], $body);
            }
        } else {
            // Load view
            $this->view("customerResetPW");
        }
    }
}
