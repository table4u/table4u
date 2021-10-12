<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerHome.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- navigation menu -->
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <!-- <a href="#appetizers">Menu</a> -->
            <a href="<?php echo URLROOT ?>/customerMenu/menu">Menu</a>
            <a href="<?php echo URLROOT ?>/reservations/reservationDetails">Reservations</a>
            <a href="#main-course">Food Package</a>
            <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
            <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
        </nav>
    </header>

    <section>
        <div class="main">
            <div class="box box1 selected">
                <a href="">Upcoming Reservations</a>
            </div>
            <div class="box box2">
                <a href="#">Food Packages</a>
            </div>
        </div>


        <div class="content">
            <div class="reservations">
                <div class="rev">
                    <div class="date">Date</div>
                    <div class="time">Time</div>
                    <div class="guests">No of guests</div>
                    <div class="food">Food ordered</div>
                </div>

                <div class="rev">
                    <div class="date">Date</div>
                    <div class="time">Time</div>
                    <div class="guests">No of guests</div>
                    <div class="food">Food ordered</div>
                </div>

                <!-- <div class="rev">
                    <div class="date">No upcoming reservations</div>
                </div> -->

            </div>
            <div class="foodpackage">
                <div class="pkg hide">
                    <h1>Food package Name </h1>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <button class="btn">Order Now</button>
                    <button class="btn delete">Delete</button>
                </div>
                <div class="pkg hide">
                    <h1>Food package Name </h1>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <div class="menuitem">
                        <span>Food name: </span>
                        <span># of servings</span>
                    </div>
                    <button class="btn">Order Now</button>
                    <button class="btn delete">Delete</button>
                </div>

            </div>
        </div>

        <div class="buttons" style="padding-top:0;padding-bottom:1rem">
            <a href="<?php echo URLROOT ?>/customerMenu/menu"><button class="btn">Order Food</button></a>
            <a href="<?php echo URLROOT ?>/reservations/makeReservations"><button class="btn">Make Reservation</button></a>
            <!-- <button class="btn">Make Reservation</button> -->
        </div>
    </section>
    <script src="<?php echo URLROOT ?>/public/js/script.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/customerHome.js"></script>


</body>

</html>