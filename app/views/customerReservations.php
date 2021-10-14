<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerReservations.css">
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
            justify-content: center;
            height: 30px;
            width: 250px;
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

        .update:hover {
            background: green;
            color: #fff;

        }
    </style>
</head>

<body style="background:White;">
    <!-- navigation menu -->
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="<?php echo URLROOT ?>/customerHome">Home</a>
            <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
            <a href="#"><i class="fas fa-user"></i></a>
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
                    <hr>
                </div>

                <?php foreach ($data as $d) :
                    if ($d->_date >= date("Y-m-d")) :
                ?>

                        <div class="content">
                            <div class="rev" style="text-align:center; width: 100%;">
                                <div class="date"><b>Date </b><br><?php echo $d->_date; ?></div>
                                <div class="time"><b>Time </b><br><?php echo date("g:i A ", strtotime($d->reservationTime));  ?></div>
                                <div class="guests"><b>Number of guests </b><br><?php echo $d->noOfGuests; ?></div>
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
                    <hr>
                </div>
                <?php foreach ($data as $d) : if ($d->_date < date("Y-m-d")) : ?>

                        <div class="content">
                            <div class="rev" style="text-align:center; width: 100%;">
                                <div class="date"><b>Date </b><br><?php echo $d->_date; ?></div>
                                <div class="time"><b>Time </b><br><?php echo date("g:i A ", strtotime($d->reservationTime)); ?></div>
                                <div class="guests"><b>Number of guests </b><br><?php echo $d->noOfGuests; ?></div>
                                <hr class="break">
                                <!-- <div class="food">Food ordered</div> -->
                            </div>
                        </div>

            <?php endif;
                endforeach;
            endif; ?>



        </div>

    </section>
    <script src="<?php echo URLROOT ?>/public/js/home.js"></script>



</body>

</html>