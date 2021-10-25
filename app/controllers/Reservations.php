<?php

use function PHPSTORM_META\type;
// date_default_timezone_set('Asia/Colombo');

class Reservations extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->reservationModel = $this->model('Reservation');
    }

    public function index()
    {

        $this->view('customerHome');
    }

    public function reservationDetails()
    {
        $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
        // die($data);
        $this->view('customerReservations', $data);
    }

    public function showReservations()
    {
        $data = [
            'date' => '',
            'time' => ''
        ];
        $this->view('custTableLayout', $data);
    }

    public function verifyDateAndTime()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die("submitted");
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'date' => trim($_POST['date']),
                'time' => trim($_POST['time'])
            ];

            $time = date("H:i", strtotime($data['time']));
            $date = date("Y-m-d", strtotime($data['date']));
            $todayTime = date("H:i", $_SERVER['REQUEST_TIME']);
            $todayDate = date("Y-m-d");

            $today = date("Y-m-d H:i", strtotime($todayTime." ".$todayDate));
            $reservationDay = date("Y-m-d H:i", strtotime($time . " " . $date));
            // echo $todayDate;
            // echo $todayTime;
            // echo $today;
            // die();
            $openTime = date("H:i", strtotime("07:00"));
            $closeTime = date("H:i", strtotime("22:01"));
            // $_SESSION['invlaidTime'] = "testing";

            //check if day is in the future
            if ($reservationDay < $today){
                $_SESSION['invlaidTime'] = "Please select a date and time in the future";
                $this->view('custTableLayout', $data);
            }
            //check if the time selected is between working hoours
            elseif ($time < $closeTime and $time >= $openTime) {
                // die("valid time");
                $this->view('customerTableLayout', $data);
            } else {
                $_SESSION['invlaidTime'] = $_SESSION['invlaidTime'] . "Please select a time between 07:00 AM and 10:00 PM";
                // die("invalid time");
                $this->view('custTableLayout', $data);
            }
            // echo ($time);
            // die();

            // $this->view('customerTableLayout', $data);
        } else {
            $data = [
                'date' => '',
                'time' => ''
            ];
            $this->view('custTableLayout', $data);
        }
    }

    public function makeReservations()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die("submitted");
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'date' => trim($_POST['date']),
                'time' => trim($_POST['time']),
                'covers' => trim($_POST['covers']),
                'foodOrdered' => trim($_POST['food']),
            ];
            // print_r($data);
            // die();

            if ($data['foodOrdered'] == 'Yes') {
                $this->view("customerMenu");
            } else {
                if($this->reservationModel->makeReservation($data)){
                    $_SESSION['newReservation'] = "Your Reservation was placed successfully.";
                    $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
                    $this->view('customerReservations', $data);
                }
                else{
                    $_SESSION['unsuccessReservation'] = "Something went wrong and the reservation could not be placed. Please try again";
                    $this->view('custTableLayout', $data);
                }
                
            }
        } else {
            $data = [
                'date' => '',
                'time' => ''
            ];
            $this->view('custTableLayout', $data);
        }
    }
}
