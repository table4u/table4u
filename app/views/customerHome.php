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

    <style>
        .active {
            display: block;

        }

        .inactive {
            display: none;
        }

        .modal {
            padding: 5rem;
            width: 40%;
            position: absolute;
            top: 30%;
            left: 30%;
            z-index: 1000;
            padding: auto;
            margin: auto;
            background: white;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.25);
        }

        .modal-buttons {
            display: flex;
            justify-content: space-between;
        }

        .modal-content {
            font-size: 1.5rem;
            padding-top: 2rem;
            text-align: center;
            padding-bottom: 2rem;
            color: rgb(102, 102, 102);
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
            width: 40%;
            box-shadow: 0 0 1rem #222222;
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

        .close {
            position: absolute;
            right: 5rem;
            top: 5rem;
            font-size: 1.5rem;
            cursor: pointer
        }

        .close:hover {
            transform: scale(1.1);
        }
    </style>
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
            <a href="<?php echo URLROOT ?>/customerFoodpackage/index">Food Package</a>
            <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
            <a href="#"><i class="fas fa-bell"></i></a>
            <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
        </nav>
    </header>

    <section>
        <div class="main">
            <div class="box box1 cur">
                <a href="">Upcoming Reservations</a>
            </div>
            <div class="box box2">
                <a href="#">Food Packages</a>
            </div>
        </div>


        <div class="content">
            <div class="reservations" style="align-items: center; justify-items: center;">
                <div class="rev" style="width: 60%;">
                    <div class="date">Date</div>
                    <div class="time">Time</div>
                    <div class="guests">No of guests</div>
                    <div class="food">Food ordered</div>
                </div>

                <!-- <div class="rev">
                    <div class="date">Date</div>
                    <div class="time">Time</div>
                    <div class="guests">No of guests</div>
                    <div class="food">Food ordered</div>
                </div> -->

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
                    <a href="<?php echo URLROOT ?>/customerMenu/menu" class="btn">Order Now</a>
                    <a class="btn delete deleteBtn">Delete</a>
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
                    <a href="<?php echo URLROOT ?>/customerMenu/menu" class="btn">Order Now</a>
                    <a class="btn delete deleteBtn">Delete</a>
                </div>

            </div>
        </div>

        <div class="buttons" style="padding-top:0;padding-bottom:1rem">
            <a href="<?php echo URLROOT ?>/customerMenu/menu"><button class="btn">Order Food</button></a>
            <a href="<?php echo URLROOT ?>/reservations/showReservations"><button class="btn">Make Reservation</button></a>
            <!-- <button class="btn">Make Reservation</button> -->
        </div>
    </section>
    <div class="bg inactive"></div>
    <div class="delete-popup modal inactive">
        <div class="close fas fa-times"></div>
        <div class="modal-content">
            Are you sure to remove this package?
        </div>
        <div class="modal-buttons">
            <a href="" class="modal-btn">No</a>
            <a href="" class="modal-btn">Yes</a>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/public/js/home.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/customerHome.js"></script>

    <script>
        const tabs = document.querySelectorAll(".box")
        let deleteBtn = document.querySelectorAll(".deleteBtn");
        let modal = document.querySelector(".modal");
        let bg = document.querySelector(".bg");
        let close = document.querySelector(".close");

        tabs.forEach((t, index) => {
            t.addEventListener("click", () => {
                tabs.forEach((t) => t.classList.remove("cur"))

                t.classList.add("cur")
            })
        })

        for (let i = 0; i < deleteBtn.length; i++) {
            deleteBtn[i].addEventListener("click", function() {
                console.log("clicked");
                modal.classList.add("active");
                bg.classList.add("active");
                modal.classList.remove("inactive");
                bg.classList.remove("inactive");
            });
        }

        close.addEventListener("click", function() {
            console.log("close")
            modal.classList.remove("active");
            bg.classList.remove("active");
            modal.classList.add("inactive");
            bg.classList.add("inactive");
        })
    </script>
</body>

</html>