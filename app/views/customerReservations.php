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
    <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerTable.css"> -->

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
        <header>
            <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="<?php echo URLROOT ?>/customerMenu/menu">Menu</a>
                <a href="<?php echo URLROOT ?>/reservations/reservationDetails">Reservations</a>
                <a href="<?php echo URLROOT ?>/customerFoodpackage/index">Food Package</a>
                <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
                <a href="#"><i class="fas fa-bell"></i></a>
                <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
            </nav>
        </header>

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

                    <?php foreach ($data as $d) :
                        if ($d->_date >= date("Y-m-d")) :
                    ?>

                            <div class="content">
                                <div class="rev" style="text-align:center; width: 100%;">
                                    <div class="date"><b>Date </b><br> <br><?php echo date("l, jS \of F Y", strtotime($d->_date)); ?></div>
                                    <div class="time"><b>Time </b><br> <br><?php echo date("g:i A ", strtotime($d->reservationTime));  ?></div>
                                    <div class="guests"><b>Number of guests </b><br> <br><?php echo $d->noOfGuests; ?></div>
                                    <!-- <div class="food">Food ordered</div> -->
                                    <div style="text-align:center;">
                                        <button class="btn update" style="border-color: green;">Update</button>
                                        <button class="btn delete">Cancel</button>
                                    </div>

                                </div>
                            </div>
                    <?php endif;
                    endforeach; ?>
                    <div class="heading" id="past">
                        Past Reservations
                        <hr style="margin-top: 1rem;">
                    </div>
                    <?php foreach ($data as $d) : if ($d->_date < date("Y-m-d")) : ?>

                            <div class="content">
                                <div class="rev" style="text-align:center; width: 100%;">
                                    <div class="date"><b>Date </b><br> <br><?php echo date("l, jS \of F Y", strtotime($d->_date)); ?></div>
                                    <div class="time"><b>Time </b><br> <br><?php echo date("g:i A ", strtotime($d->reservationTime)); ?></div>
                                    <div class="guests"><b>Number of guests </b><br> <br><?php echo $d->noOfGuests; ?></div>
                                    <hr class="break">
                                    <!-- <div class="food">Food ordered</div> -->
                                </div>
                            </div>

                <?php endif;
                    endforeach;
                endif; ?>



            </div>

        </section>

        <div class="bg inactive"></div>

        <div class="modal inactive">
            <div class="close fas fa-times"></div>
            <h3 class="heading">Reserve Table</h3>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="">Date: <span class="star">*</span></label>
                    <input name="date" type="date" required class="input-field" id="" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="">Time: <span class="star">*</span></label>
                    <input name="time" type="time" required class="input-field" id="" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="">Covers: <span class="star">*</span></label>
                    <input name="covers" type="number" min=2 max=6 required class="input-field" id="" placeholder="Covers" value="">
                </div>

                <button class="modal-btn" id="confirm-btn">
                    Confirm
                </button>
            </form>
        </div>


        <div class="cancel-modal inactive">
            <div class=" fas fa-times close-cancel"></div>
            <div class="content">
                Are you sure to cancel the reservation?
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button class="modal-btn" id="confirm-btn" style="width: 35%;">
                    No
                </button>
                <button class="modal-btn" id="confirm-btn" style="width: 35%;">
                    Yes
                </button>
            </div>
        </div>
        <script src="<?php echo URLROOT ?>/public/js/home.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/customerReservations.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

        </body>

</html>