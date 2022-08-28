<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table4U</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierReserveTables.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <title>Table4U</title>

</head>
<?php if (isset($_SESSION['invlaidTime'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['invlaidTime']; ?>' , 'error')">
        <?php unset($_SESSION['invlaidTime']); ?>

    <?php else : ?>

        <body s>
        <?php endif; ?>

        <?php if (isset($_SESSION['successMsg'])) : ?>

            <body onload="Toast.show('<?php echo $_SESSION['successMsg']; ?>' , 'success')">
                <?php unset($_SESSION['successMsg']); ?>

            <?php else : ?>

                <body s>
                <?php endif; ?>


                <div class="dashboard">
                    <!--Dashboard start-->

                    <section class="navigation">
                        <!--Section navigation start-->
                        <div class="logo">
                            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

                            <h1>Table 4U<br> Cashier Panel</h1>
                        </div>
                        <div>
                            <ul>
                                <!-- <li> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
                                <li class="table-navigation"> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
                                <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
                                <li> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
                                <li> <a href="<?php echo URLROOT ?>/CashierPayment/showCompletedpayments">Payments </a> </li>

                                <br><br>
                                <!-- <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li> -->

                            </ul>
                        </div>
                        <a class="logout" a href="<?php echo URLROOT ?>/Login/logout">Log Out</a>

                    </section>
                    <!--Section navigation end-->

                    <section class="main_area">
                        <!--Section main area start-->
                        <div class="login_name">
                            <p>Cashier</p>
                        </div>
                        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/profile.png" width="30px" height="30px"> </div>

                        <!-- <?php

                                echo $_SESSION['error_01'];

                                ?>
        </div> -->


                        <!-- <div class="topic_floor" id="floor-plan-id"><h1>Floor Plan</h1></div> -->


                        <?php

                        if (isset($_SESSION['table_err'])) {
                            echo $_SESSION['table_err'];
                        }
                        ?>
                        <div class="date_timeform">
                            <!-- <form class="res-details" method="POST" action="<?php echo URLROOT ?>/CashierReserveTable/verifyDateAndTime">
                <div class="form-group">
                    <label for="">Date </label>
                    <input required name="date" hidden class="date" type="date" class="input-field" id="" placeholder="" value="<?php echo $data['date']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Time </label>
                    <input required name="time" hidden class="time" type="time" class="input-field" id="" placeholder="" value="<?php echo $data['time']; ?>">
                </div>
                <div class="form-group">
                    <input name="submit" hidden class="btn_btn-check" type="submit" value="Check" id="" placeholder="" style="color: white; padding-left: 2rem; padding-right:  2rem; top:0rem; background-color:green">
                </div>
            </form> -->
                        </div>
                        <div class="layout" id="layout">
                            <div class="table-main">
                                <h3 class="heading">Table Layout</h3>
                                <hr>
                                <div class="table-layout">
                                    <?php
                                    if (isset($data['tableDetails'])) {
                                        $j = 0;

                                        $rowcount = count($data['tableDetails']);
                                        $rowcountD = $rowcount;
                                        $TotalTables = 20;
                                        // print_r($data);

                                        for ($j = 1; $j <= $TotalTables; $j++) {
                                            $loopcheck = 0;
                                            $i = 0;

                                            while ($i < $rowcountD) {
                                                // print_r($data['tableDetails'][$i]->tableNo);
                                                // echo '<br>';
                                                if ($data['tableDetails'][$i]->tableID == "TL-" . $j) {

                                                    if ($data['tableDetails'][$i]->availability == 1) {
                                                        // echo $data['time'];
                                                        echo "<button class = 'table available' id = 'table-" . $data['tableDetails'][$i]->tableNo . "'
                                     onclick = 'table_table(" . $data['tableDetails'][$i]->tableNo . ",  \" " . $data['date'] . "\",\"" . $data['time'] . "\")'> 
                                        
                                      Table " . $data['tableDetails'][$i]->tableNo .
                                                            "<div class = 'covers'>
                                      Max: " . $data['tableDetails'][$i]->maxCover . "<br>
                                      Min: " . $data['tableDetails'][$i]->minCover . "</div></button>";
                                                    } else if ($data['tableDetails'][$i]->availability == 0) {

                                                        echo "<button class = 'table unavailable' id = 'table-" . $data['tableDetails'][$i]->tableNo . "'
                                     onclick = 'table_table(" . $data['tableDetails'][$i]->tableNo . ",  \" " . $data['date'] . "\",\"" . $data['time'] . "\",\"" . $data['tableDetails'][$i]->nextAvailableTime . "\")'> 
                                    Table " . $data['tableDetails'][$i]->tableNo .
                                                            "<div class = 'covers'>
                                      Max: " . $data['tableDetails'][$i]->maxCover . "<br>
                                      Min: " . $data['tableDetails'][$i]->minCover . "</div></button>";
                                                    }

                                                    $loopcheck = $loopcheck + 1;
                                                }
                                                $i = $i + 1;
                                            }
                                            if ($loopcheck == 0) {
                                                echo "<div class='table'></div>";
                                            }
                                            // echo 'TL-'.$j;

                                        }

                                    ?>

                                    <?php $rowcount = count($data);
                                        $rowcountD = $rowcount;
                                        $a = 0;
                                    }


                                    ?>
                                </div>

                            </div>
                        </div>

                        <div class="table_details" id="table-detail-id">
                            <!-- <h2> Table Details </h2> -->
                            <br>
                            <h3 id="TableDetail-header"> Table  </h3>
                            <br>
                            <!-- <p id="TableDetail-status">status - available</p><br> -->
                            <p id="TableDetail-maxCovers"> max covers :  </p>
                            <p id="TableDetail-minCovers"> min covers :  </p>
                            <!-- <button class="edit_table" id="edit_table" onclick="openEdit()">Edit Table</button> -->
                            <br>
                            <div class="delete-update-btn" id="delete-update-btn">

                                <button class="update-done-table" id="delete-table-display" onclick="reservedisplay()">Reserve </button><br><br>
                                <!-- <button class="available-btn" href="<?php echo URLROOT ?>/CashierReserveTable/unavailableTable()">Unvailable </button> -->
                                <button class="unavailable-btn" onclick="unavailabledisplay()">Unvailable</button>
                                <button class="available-btn" onclick="availabledisplay()">Available </button>
                                <!-- <button class="update-done-table" id="update-done-table" onclick="doneUpdate()">Done</button> -->
                            </div>
                            <!-- <br>
            <p>Upcoming reservations</p>
            <p>R02 - 8.00 am</p>
            <p>R05 - 1.00 pm</p>
            <br> <br> -->

                        </div>

                        <div class="chooseDate" id="popup-reserve">

                            <?php if (isset($_SESSION['error'])) : ?>
                                <div style="color: #FF0000; margin-top:20%;margin-left:10%;margin-right:10%;padding: 2%; width:20%; font-weight:8%; font-size:80%;text-align:center;">
                                    <?php echo $_SESSION['error'];
                                    unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" id="reservationForm" action="<?php echo URLROOT ?>/CashierReserveTable/makeReservation">


                            </form>
                        </div>



                        <div class="reservedMessage" id="popup-reserved">
                            <div class="quest1">All ready reserved !!!</div>
                        </div>

                        <!-- <div class="chooseDate" id="popup-available">

            <?php if (isset($_SESSION['error'])) : ?>
                <div style="color: #FF0000; margin-top:20%;margin-left:10%;margin-right:10%;padding: 2%; width:20%; font-weight:8%; font-size:80%;text-align:center;">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

        </div> -->

                        <div class="chooseDate chooseDate_unavailable " id="popup-unavailable">
                            <form method="POST" id="unavailableForm" action="<?php echo URLROOT ?>/CashierReserveTable/unavailableTable">
                            </form>

                        </div>

                        <div class="chooseDate_available" id="popup-available">
                            <form method="POST" id="availableForm" action="<?php echo URLROOT ?>/CashierReserveTable/availableTable">

                            </form>

                        </div>

                    </section>
                    <!--Section main area end-->


                    <div class="layout-in-input" id="layout-in-input">
                        <!--  This is the displayed layout for input tables for table layout -->

                        <script src="<?php echo URLROOT ?>/public/js/cashierReserveTable.js"> </script>
                        <script src="<?php echo URLROOT ?>/public/js/toast.js"> </script>

                    </div>
                    <!--Dashboard End-->


                </body>

</html>