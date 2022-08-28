<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerReservations.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .heading {
            padding-top: 2rem;
            text-align: center;
            font-size: 3.5rem;
            padding: 1rem;
            color: rgb(102, 102, 102);
        }

        hr {
            margin: auto;
            padding: 1rem;
            justify-content: center;
            height: 30px;
            width: 150px;
            border-style: solid;
            border-color: var(--orange);
            border-width: 3px 0 0 0;
            /* border-radius: 20px; */
        }

        .update {
            color: green;
        }

        button {
            margin-right: 1.5rem;
        }

        .btn {
            font-size: 1.5rem;
        }

        .update:hover {
            background: green;
            color: #fff;

        }

        .active {
            display: block;

        }

        .inactive {
            display: none;
        }

        .modal,
        .cancel-modal {
            padding: 5rem;
            width: 60%;
            position: absolute;
            top: 15%;
            left: 20%;
            z-index: 1000;
            padding: auto;
            margin: auto;
            background: white;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.25);
            /* background-color: rebeccapurple; */
        }

        .cancel-modal {
            width: 40%;
            left: 30%;
            top: 30%;
        }

        .cancel-modal .content {
            font-size: 1.5rem;
            padding: 2rem;
            padding-bottom: 0;
            color: rgb(102, 102, 102);
        }

        .form-group {
            margin-bottom: 15px;
            margin-top: 15px;
            display: flex;
            align-items: center;
            /* font-weight: bolder; */
        }

        .modal .form-group label {
            width: 400px;
            font-size: 1.5rem;
            color: rgb(102, 102, 102);
            margin-right: 10px;
        }

        .modal .form-group input {
            width: 100%;
            outline: none;
            border: 1px solid #d5dbd9;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .modal-btn {
            background-color: #181818;
            color: whitesmoke;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            display: inline-block;
            padding: 0.8rem 3rem;
            cursor: pointer;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
            width: 100%;
            box-shadow: 0 0 1rem #222222;
        }

        .heading {
            font-size: 2rem;
        }

        .modal .form-group .input-field:focus {
            border: 1px solid var(--orange);
            box-shadow: 0 0 10px var(--orange);

        }

        .content {
            font-size: 1.5rem;
        }

        .form-group p {
            font-size: 1.5rem;
            text-align: left;
            padding-bottom: 0;
            /* padding-top: 15px; */
        }

        .modal .form-group .radio-btn {
            width: auto;
            margin-left: 0rem;
            padding-left: 0rem;
            padding-right: 0;
        }


        .bg {
            z-index: 2;
            padding: auto;
            margin: auto;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.75);
            overflow-y: hidden;
        }

        .close,
        .close-cancel {
            position: absolute;
            right: 5rem;
            top: 5rem;
            font-size: 1.5rem;
            cursor: pointer
        }

        .close:hover,
        .close-cancel:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<?php if (isset($_SESSION['newReservation'])) : ?>

    <body style="background:White;" onload="Toast.show('<?php echo $_SESSION['newReservation']; ?>' , 'success')">
        <?php unset($_SESSION['newReservation']); ?>

    <?php else : ?>

        <body style="background:White;">
        <?php endif; ?>


        <!-- navigation menu -->
        <?php
        require APPROOT . '/views/customer/header.php';
        ?>

        <section>

            <div class="">
                <!-- <div class="reservations"> -->
                <?php if (empty($data)) : ?>
                    <div class="content">
                        <div class="rev">
                            <div class="date">No upcoming reservations</div>
                        </div>
                    </div>

                <?php else : ?>
                    <div class="heading" id="upcoming">
                        Upcoming Reservations
                        <br>
                        <hr style="margin-top: 1rem;">
                    </div>

                    <!-- <?php foreach ($data as $d) :
                                if ($d->_date >= date("Y-m-d")) :
                            ?> -->
                    <!-- <div style="display: grid; grid-template-columns:1fr 1fr;">
                                <div class="content">
                                    <div class="rev" style="text-align:center; width: 100%;">
                                        <div class="date"><b>Date </b><br> <br><?php echo date("l, jS \of F Y", strtotime($d->_date)); ?></div>
                                        <div class="time"><b>Time </b><br> <br><?php echo date("g:i A ", strtotime($d->reservationTime));  ?></div>
                                        <div class="guests"><b>Number of guests </b><br> <br><?php echo $d->noOfGuests; ?></div>
                                        <div class="food">Food ordered</div>
                                        <div style="text-align:center;">
                                            <button class="btn update" style="border-color: green;">Update</button>
                                            <button class="btn delete">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div> -->

                    <!-- <?php endif;
                            endforeach; ?> -->





                    <!-- upcoming reservation -->

                    <table style="width: 100%;">
                        <thead style="border: 0; ">
                            <th>Date</th>
                            <th>Time</th>
                            <th>Number of guests</th>
                            <th>Table Number</th>
                            <th></th>

                            <!-- <th>Price</th> -->

                        </thead>
                        <tbody style="overflow-y:auto; height:30%; ">
                            <?php
                            // asort($data['date']);
                            // print_r($data);
                            // print(date("H:i:s", $_SERVER['REQUEST_TIME']));
                            foreach ($data as $d) :
                                // print_r($d);
                                // echo '<br>';
                                // if ($d->_date >= date("Y-m-d") and $d->reservationTime >= date("H:i:s", $_SERVER['REQUEST_TIME'])) :
                                if (($d->_date > date("Y-m-d") and $d->status != 'Cancel') || ($d->_date == date("Y-m-d") and $d->reservationTime >= date("H:i:s", $_SERVER['REQUEST_TIME']) and $d->status != 'Cancel')) :

                            ?>
                                    <tr>
                                        <td>
                                            <?php echo date("l, jS \of F Y", strtotime($d->_date)); ?>
                                            <form action=''>
                                                <input id='reservationID' type='hidden' value='<?php echo $d->reservationID ?>'>
                                            </form>
                                        </td>
                                        <td>
                                            <?php echo date("g:i A ", strtotime($d->reservationTime)); ?>
                                        </td>
                                        <td>
                                            <?php echo $d->noOfGuests; ?>
                                        </td>
                                        <td>
                                            <?php echo $d->tableNo; ?>
                                        </td>
                                        <td style="display: flex;">
                                            <!-- <button class="btn update" style="border-color: green;">Update</button> -->
                                            <!-- </td> -->
                                            <!-- <td> -->
                                            <button class="menu-details btn update" style="border-color: green; text-align:center" onclick=" viewMenuItems('<?php echo $d->reservationID ?>')">Food</button>
                                            <button class="btn delete" onclick="cancelReservation('<?php echo $d->reservationID ?>')">Cancel</button>
                                        </td>
                                    </tr>
                            <?php endif;
                            endforeach; ?>
                        </tbody>
                    </table>
                    <div class="heading" id="past" style="padding-top: 5rem;">
                        Past Reservations
                        <hr style="margin-top: 1rem;">
                    </div>

                    <div style="padding-bottom: 2rem; ">
                        <!-- <div class="content">
                                <div class="rev" style="text-align:center; width: 100%;">
                                    <div class="date"><b>Date </b><br> <br><?php echo date("l, jS \of F Y", strtotime($d->_date)); ?></div>
                                    <div class="time"><b>Time </b><br> <br><?php echo date("g:i A ", strtotime($d->reservationTime)); ?></div>
                                    <div class="guests"><b>Number of guests </b><br> <br><?php echo $d->noOfGuests; ?></div>
                                    <hr class="break">
                                    <div class="food">Food ordered</div>
                                </div>
                            </div> -->
                        <table style="width: 100%;">
                            <thead style="border: 0;">
                                <th>Date</th>
                                <th>Time</th>
                                <th>Number of guests</th>
                                <th>Table Number</th>
                                <th></th>
                                <!-- <th>Price</th> -->

                            </thead>
                            <tbody style="overflow-y:auto; ">

                                <?php foreach ($data as $d) : if (
                                        $d->_date < date("Y-m-d") or
                                        $d->status == 'Cancel' or
                                        ($d->_date == date("Y-m-d")  and $d->reservationTime <= date("H:i:s", $_SERVER['REQUEST_TIME']))
                                    ) : ?>
                                        <tr>
                                            <td>
                                                <?php echo date("jS \of F Y", strtotime($d->_date)); ?>
                                            </td>
                                            <td>
                                                <?php echo date("g:i A ", strtotime($d->reservationTime)); ?>
                                            </td>
                                            <td>
                                                <?php echo $d->noOfGuests; ?>
                                            </td>
                                            <td>
                                                <?php echo $d->tableNo; ?>
                                            </td>
                                            <td>
                                                <?php if ($d->status == 'Cancel') : ?>
                                                    <p style="font-size:1.5rem; color:red">Cancelled</p>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                <?php endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                endif; ?>



            </div>

        </section>

        <div class="bg inactive"></div>

        <div class="modal inactive" id="menu-items">

        </div>


        <div class="cancel-modal inactive" id="cancelRes">


        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo URLROOT ?>/public/js/home.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/customerReservations.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

        </body>

</html>