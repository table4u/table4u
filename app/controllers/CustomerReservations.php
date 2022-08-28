<?php

use function PHPSTORM_META\type;
// date_default_timezone_set('Asia/Colombo');

class CustomerReservations extends Controller
{
    public function __construct()
    {
        isValidUser('Customer');
        $this->reservationModel = $this->model('Reservation');
        $this->tableModel = $this->model('Table');
        $this->menuItemModel = $this->model('MenuItems');
        $this->hotelAvailabilityModel = $this->model('HotelAvailabilty');
    }

    public function index()
    {

        $this->view('customerHome');
    }
    public function cancelReservation($reservationID)
    {
        $data = $this->reservationModel->cancelReservation($reservationID);
        echo json_encode($data);

        // header("Location: " . URLROOT . '/customerReservations/reservationDetails');

        // die("success");
    }
    public function reservationDetails()
    {
        $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
        // die($data);
        $this->view('customerReservations', $data);
    }

    public function showReservations()
    {
        $res = $this->hotelAvailabilityModel->getOpenCloseTime();
        $data = [];
        if ($res) {
            $data['openTime'] = $res->openTime;
            $data['closeTime'] = $res->closeTime;
            // print_r($data);
            // die();
        } else {
            $data['openTime'] = '';
            $data['closeTime'] = '';
        }

        $data['date'] = '';
        $data['time'] = '';

        $holidays = $this->hotelAvailabilityModel->getHolidays();
        $data['holidays'] = $holidays;
        // echo count($data['holidays']);
        // die();
        // print_r($data);
        // die();
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
            $res = $this->hotelAvailabilityModel->getOpenCloseTime();
            $data = [];
            if ($res) {
                $data['openTime'] = $res->openTime;
                $data['closeTime'] = $res->closeTime;
                // print_r($data);
                // die();
            } else {
                $data['openTime'] = '';
                $data['closeTime'] = '';
            }

            $holidays = $this->hotelAvailabilityModel->getHolidays();
            $data['holidays'] = $holidays;

            $time = date("H:i", strtotime($data['time']));
            $date = date("Y-m-d", strtotime($data['date']));
            $todayTime = date("H:i", $_SERVER['REQUEST_TIME']);
            $todayDate = date("Y-m-d");

            $today = date("Y-m-d H:i", strtotime($todayTime . " " . $todayDate));
            $reservationDay = date("Y-m-d H:i", strtotime($time . " " . $date));
            // echo $todayDate;
            // echo $todayTime;
            // echo $today;
            // die();
            $openTime = date("H:i", strtotime("07:00"));
            $closeTime = date("H:i", strtotime("22:00"));
            // $_SESSION['invlaidTime'] = "testing";

            //check if day is in the future
            if ($reservationDay < $today) {
                $_SESSION['invlaidTime'] = "Please select a date and time in the future";
                $this->view('custTableLayout', $data);
            }
            //check if the time selected is between working hoours
            elseif ($time < $closeTime and $time >= $openTime) {
                //render the table layout
                // echo "inside else if";
                $tableDet = (array)$this->tableModel->getTableDetails();
                $tableAvail = (array) $this->tableModel->getTableAvailability($data['date']);
                // print_r($time);
                // echo '<br>';
                // foreach ($tableAvail as $t) {
                //     print_r($t);
                //     echo '<br>';
                // }
                // foreach ($tableDet as $t) {
                //     print_r($t);
                //     echo '<br>';
                // }


                // echo count($tableAvail);
                if (count($tableAvail) == 0) {
                    for ($i = 0; $i < count($tableDet); $i++) {
                        $tableDet[$i]->availability = 1;
                    }
                } else {
                    for ($i = 0; $i < count($tableDet); $i++) {
                        for ($j = 0; $j < count($tableAvail); $j++) {
                            if ($tableDet[$i]->tableNo != $tableAvail[$j]->tableNo) {
                                $tableDet[$i]->availability = 1;
                            } else {
                                $t = date("H:i", strtotime('-60 minutes', strtotime($tableAvail[$j]->fromTime)));
                                date("H:i", strtotime($tableAvail[$j]->toTime));
                                date("H:i", strtotime($tableAvail[$j]->fromTime));
                                // die();
                                if (($time <= $tableAvail[$j]->toTime && $time >= $tableAvail[$j]->fromTime)
                                    ||     ($time >= $t && $time <= $tableAvail[$j]->toTime)
                                ) {
                                    // echo "date in between<br>";
                                    // print_r($tableDet[$i]);
                                    $tableDet[$i]->availability = 0;
                                    $tableDet[$i]->nextAvailableTime = $tableAvail[$j]->toTime;
                                    // print_r($tableDet[$i]);
                                    break;
                                } else {
                                    // echo "date not in between<br>";
                                    $tableDet[$i]->availability = 1;
                                    // print_r($tableDet[$i]);
                                    // print_r($tableAvail[$i]);
                                    // echo '<br>';

                                    // echo $tableDet[$i];
                                }
                            }
                        }
                    }
                }
                // die();

                $data['tableDetails'] = $tableDet;

                $this->view('customerTableLayout', $data);
            } else {
                $_SESSION['invlaidTime'] = $_SESSION['invlaidTime'] . "Please select a time between 07:00 AM and 10:00 PM";
                // die("invalid time");
                // $data['tableDetails'];
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
                // 'foodOrdered' => trim($_POST['food']),
                'purpose' => trim($_POST['purpose']),
                'tableNo' => trim($_POST['tableNo'])
            ];
            // print_r($data);
            // die();
            $toTime = calculateReservationTime($data['date'], $data['time'], $data['purpose'], $data['covers']);
            $data['toTime'] = $toTime;
            //check availability again
            $avail = $this->verifyAvailability($data['time'], $data['date'], $data['tableNo']);
            if ($avail) {
                if (isset($_SESSION['reservationID'])) {
                    if ($this->tableModel->reserveTable($data)) {
                        $_SESSION['newReservation'] = "Your Reservation was placed successfully.";
                        $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
                        // $this->view('customerReservations', $data);
                        header("Location: " . URLROOT . '/customerReservations/reservationDetails');
                    }
                } else {
                    if ($this->reservationModel->makeReservation($data)) {
                        // echo $_SESSION['reservationID'];
                        // die();
                        if ($this->tableModel->reserveTable($data)) {
                            $_SESSION['newReservation'] = "Your Reservation was placed successfully.";
                            $data = $this->reservationModel->getReservationDetails($_SESSION['user_id']);
                            // $this->view('customerReservations', $data);
                            header("Location: " . URLROOT . '/customerReservations/reservationDetails');
                        }
                    } else {
                        $_SESSION['unsuccessReservation'] = "Something went wrong and the reservation could not be placed. Please try again";
                        $this->view('custTableLayout', $data);
                    }
                }
            } else {
                $_SESSION['unsuccessReservation'] = "Something went wrong and the reservation could not be placed. Please try again";
                $this->view('custTableLayout', $data);
            }


            // }
        } else {
            $data = [
                'date' => '',
                'time' => ''
            ];
            $this->view('custTableLayout', $data);
        }
    }

    public function verifyAvailability($time, $date, $tableNo)
    {
        $tableDet = (array)$this->tableModel->getTableDetails();
        $tableAvail = (array) $this->tableModel->getTableAvailability($date);

        if (count($tableAvail) != 0) {
            for ($i = 0; $i < count($tableDet); $i++) {
                for ($j = 0; $j < count($tableAvail); $j++) {
                    if ($tableDet[$i]->tableNo == $tableAvail[$j]->tableNo and $tableDet[$i]->tableNo == $tableNo) {
                        $t = date("H:i", strtotime('-60 minutes', strtotime($tableAvail[$j]->fromTime)));
                        date("H:i", strtotime($tableAvail[$j]->toTime));
                        date("H:i", strtotime($tableAvail[$j]->fromTime));
                        // die();
                        if (($time <= $tableAvail[$j]->toTime && $time >= $tableAvail[$j]->fromTime)
                            ||     ($time >= $t && $time <= $tableAvail[$j]->toTime)
                        ) {

                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    public function getMenuItemsByReservation($id)
    {
        $res = $this->menuItemModel->getMenuItemsByReservation($id);
        $result = '<div class="close fas fa-times"></div>
            <h3 class="heading">Ordered Food</h3>';
        if ($res) {
            foreach ($res as $r) {
                // }
                $result .= '                
                            <p style="font-size:1.5rem; text-align:center;">' . $r->name . ' - ' . $r->portionSize . ' - ' . $r->noOfServings . '</p>
                        ';
            }
            echo $result;
        } else {
            $result .= '<p style="font-size:1.5rem; text-align:center;">Food not Ordered </p>';
            echo $result;
            // print_r($res);
        }

        // print_r($res);

        // die();
    }
}
