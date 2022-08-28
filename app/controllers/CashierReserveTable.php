<?php
class CashierReserveTable extends Controller
{
    public function __construct()
    {
        isValidUser('Cashier');
        $this->reservationModel = $this->model('Reservations');
        $this->tableModel = $this->model('Cashiertable');
    }

    public function index()
    {
        $tableDetail = $this->reservationModel->getTableData_M();
        $this->verifyDateAndTime();
        // $this->view('cashierReserveTable', $tableDetail);
        // print_r($tableDetail);
        // $this->view('cashierReserveTableNew', $tableDetail);
        //print_r($tableDetail);
    }

    public function verifyDateAndTime()
    {
        date_default_timezone_set("Asia/Colombo");
        $current_date = Date("Y-m-d");
        $current_time = Date("g:i a");
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // die("submitted");
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            if (isset($_POST['date']) && $_POST['time']) {
                $data = [
                    'date' => trim($_POST['date']),
                    'time' => trim($_POST['time'])
                ];
            }
        } else {
            $data = [
                'date' => $current_date,
                'time' => $current_time
            ];
        }

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
            // $this->popup_ivalidTime();
            $this->view('cashierReserveTableNew');
            //    echo '<script type="text/javascript">
            //            window.onload = function(){alert("Please select a date and time in the future"); return}</script>';
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

            $this->view('cashierReserveTableNew', $data);
            // header("Location: " . URLROOT . '/CashierReserveTable');
        } else {
            $_SESSION['invlaidTime'] = "Please select a time between 07:00 AM and 10:00 PM";
            // die("invalid time");
            // $data['tableDetails'];
            // $this->index();
            $this->view('cashierReserveTableNew');
        }
        // echo ($time);
        // die();
        $this->view('cashierReserveTableNew');
        //$this->view('customerTableLayout', $data);

    }

    public function table_table($tableNo)
    {

        $table_detail = $this->reservationModel->tableDataGetAjax($tableNo);
        // $array = json_decode(json_encode($table_detail[0]), true);
        // print_r($table_detail);
        //    $testarray ='{"tableNo":'.$table_detail[0]->tableNo.', "tableID":"'.$table_detail[0]->tableID.'", "availability":"'.$table_detail[0]->availability.'", "maxCover":"'.$table_detail[0]->maxCover.'" , "minCover":"'.$table_detail[0]->minCover.'"}';
        $testarray = json_encode($table_detail);
        echo ($testarray);
    }


    public function showPendingReservations()
    {
        $this->view('cashierReservationDetails');
    }



    public function showCompletedReservations()
    {
        $this->view('cashierReservationDetails_comp');
    }

    public function showCancelledReservations()
    {
        $this->view('cashierReservationDetails_del');
    }


    public function makeReservation()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //die("redirected");
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'date' => trim($_POST['date']),
                'totime' => trim($_POST['to_time']),
                'fromtime' => trim($_POST['from_time']),
                'covers' => trim($_POST['covers']),
                'tableNo' => trim($_POST['tableno']),

            ];

            // $time = date("H:i", strtotime($data['time']));
            // $date = date("Y-m-d", strtotime($data['date']));
            // $todayTime = date("H:i", $_SERVER['REQUEST_TIME']);
            // $todayDate = date("Y-m-d");

            // $today = date("Y-m-d H:i", strtotime($todayTime." ".$todayDate));
            // $reservationDay = date("Y-m-d H:i", strtotime($time . " " . $date));
            // echo $todayDate;
            // echo $todayTime;
            // echo $today;
            // die();
            // $openTime = date("H:i", strtotime("07:00"));
            // $closeTime = date("H:i", strtotime("22:01"));
            // $_SESSION['invlaidTime'] = "testing";

            //die("valid time");

            // if ($this->reservationModel->findCoverRange($data['covers'])) {
            //     $data['covers_err'] = ' Covers are not in range. ';
            //     $_SESSION['error'] = "Covers are not in range.";
            // }


            //check if day is in the future
            // if ($reservationDay < $today){
            // $_SESSION['invlaidTime'] = "Please select a date and time in the future";
            // $this->view('cashierReserveTable', $data);
            // }
            //check if the time selected is between working hoours
            // elseif ($time < $closeTime and $time >= $openTime) {
            // die("valid time");
            //  $this->view('cashierOrderMenu', $data);
            // } else {
            //  $_SESSION['invlaidTime'] = $_SESSION['invlaidTime'] . "Please select a time between 07:00 AM and 10:00 PM";
            // die("invalid time");
            // $this->view('cashierReserveTable', $data);
            // }
            // echo ($time);
            // die();

            // $this->view('customerTableLayout', $data);

            $_SESSION['error'] = "";

            if ($this->reservationModel->makeReservationcashir($data)) {
                $res = $this->reservationModel->getRes($data);
                $_SESSION['resId'] = $res->reservationID;
                if ($this->reservationModel->addtblno($data)) {
                    if ($this->reservationModel->_addOrder()) {
                        $ord = $this->reservationModel->getOrderID();
                        $_SESSION['order_id'] = $ord->ordId;
                        header("Location: " . URLROOT . '/cashierOrderMenu');
                    }
                }
            } else {
                $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
                $this->view('CashierReserveTableNew', $data);
            }

            // if ($this->reservationModel->addAvailability($data)) {
            //     // die("database");
            //      $_SESSION['successMsg'] = " SUCCESFULLY RESERVED. ";
            //      header("Location: " . URLROOT . '/cashierOrderMenu');
            //  } else {
            //      $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
            //      $this->view('CashierReserveTable', $data);
            //  }


        } else {
            $data = [
                'date' => '',
                'totime' => '',
                'fromtime' => '',
                'covers' => '',
                'tableNo' => ''

            ];
            $this->view('cashierReserveTableNew', $data);
        }
    }


    function unavailableTable()
    {
        //  die("REDIRECTED");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //die("redirected");
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'date' => trim($_POST['date']),
                'totime' => trim($_POST['to_time']),
                'fromtime' => trim($_POST['from_time']),
                'tableNo' => trim($_POST['tableno']),

            ];

            // $time = date("H:i", strtotime($data['time']));
            // $date = date("Y-m-d", strtotime($data['date']));
            // $todayTime = date("H:i", $_SERVER['REQUEST_TIME']);
            // $todayDate = date("Y-m-d");

            // $today = date("Y-m-d H:i", strtotime($todayTime." ".$todayDate));
            // $reservationDay = date("Y-m-d H:i", strtotime($time . " " . $date));
            // echo $todayDate;
            // echo $todayTime;
            // echo $today;
            // die();
            // $openTime = date("H:i", strtotime("07:00"));
            // $closeTime = date("H:i", strtotime("22:01"));
            // $_SESSION['invlaidTime'] = "testing";

            //die("valid time");

            // if ($this->reservationModel->findCoverRange($data['covers'])) {
            //     $data['covers_err'] = ' Covers are not in range. ';
            //     $_SESSION['error'] = "Covers are not in range.";
            // }


            //check if day is in the future
            // if ($reservationDay < $today){
            // $_SESSION['invlaidTime'] = "Please select a date and time in the future";
            // $this->view('cashierReserveTable', $data);
            // }
            //check if the time selected is between working hoours
            // elseif ($time < $closeTime and $time >= $openTime) {
            // die("valid time");
            //  $this->view('cashierOrderMenu', $data);
            // } else {
            //  $_SESSION['invlaidTime'] = $_SESSION['invlaidTime'] . "Please select a time between 07:00 AM and 10:00 PM";
            // die("invalid time");
            // $this->view('cashierReserveTable', $data);
            // }
            // echo ($time);
            // die();

            // $this->view('customerTableLayout', $data);

            $_SESSION['error'] = "";

            if ($this->reservationModel->addAvailability($data)) {
                //die("database");
                $_SESSION['successMsg'] = " SUCCESFULLY UNAVAILABLED. ";
                header("Location: " . URLROOT . '/CashierReserveTable');
            } else {
                $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
                $this->view('CashierReserveTableNew', $data);
            }

            // if ($this->reservationModel->addAvailability($data)) {
            //     // die("database");
            //      $_SESSION['successMsg'] = " SUCCESFULLY RESERVED. ";
            //      header("Location: " . URLROOT . '/cashierOrderMenu');
            //  } else {
            //      $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
            //      $this->view('CashierReserveTable', $data);
            //  }


        } else {
            $data = [
                'date' => '',
                'totime' => '',
                'fromtime' => '',
                'tableNo' => ''

            ];
            $this->view('cashierReserveTableNew', $data);
        }
    }

    function availableTable()
    {
        //  die("REDIRECTED");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //die("redirected");
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'tableNo' => trim($_POST['tableno'])
            ];

            $_SESSION['error'] = "";

            if ($this->reservationModel->availableTable($data)) {
                //die("database");
                $_SESSION['successMsg'] = " SUCCESFULLY AVAILABLED. ";
                header("Location: " . URLROOT . '/CashierReserveTable');
            } else {
                $_SESSION['unsuccessMsg'] = " SOMETHING WENT WRONG. TRY AGAIN. ";
                $this->view('CashierReserveTableNew', $data);
            }
        } else {
            $data = [
                'tableNo' => ''
            ];
            $this->view('cashierReserveTableNew', $data);
        }
    }

    public function gotoProfile()
    {
        // $this->view('');  
    }

    // Stat reservation list

    public function showRerservatios()
    {
        $data = $this->reservationModel->showRerservatios();
        $this->view('cashierReserve', $data);
    }

    // End of reservation list

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header("Location: " . URLROOT . '/login');
    }
}
