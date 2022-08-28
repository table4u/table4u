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

<?php if (isset($_SESSION['unsuccess'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['unsuccess']; ?>' , 'error')">
        <?php unset($_SESSION['unsuccess']); ?>

    <?php
else : ?>

        <body>
        <?php endif; ?>
        <!-- navigation menu -->
        <?php
        require APPROOT . '/views/customer/header.php';
        ?>

        <section>
            <div class="main">
                <div class="box box1 cur">
                    <a href="">Upcoming Reservations</a>
                </div>
            </div>


            <div class="content">
                <div class="reservations" style="align-items: center; justify-items: center;">
                    <div class="rev" style="width: 60%;">
                        <?php
                        $t = 0;
                        // print_r($data);

                        foreach ($data['resDetails'] as $d) :
                            // print_r($d);
                            if (($d->_date > date("Y-m-d") and $d->status != 'Cancel') || ($d->_date == date("Y-m-d") and $d->reservationTime >= date("H:i:s", $_SERVER['REQUEST_TIME']) and $d->status != 'Cancel')) :
                                $t = 1;
                        ?>
                                <div class="date">
                                    <b>Date: </b>
                                    <?php echo date("l, jS \of F Y", strtotime($d->_date)); ?>
                                </div>

                                <div class="time">
                                    <b>Time: </b>
                                    <?php echo date("g:i A ", strtotime($d->reservationTime)); ?>
                                </div>

                                <div class="guests"><b>No of Guests: </b>
                                    <?php echo $d->noOfGuests; ?>

                                </div>
                                <div class="guests"><b>Table Number: </b>
                                    <?php echo $d->tableNo; ?>

                                </div>

                                <!-- <div class="food">Food ordered</div> -->
                    </div>
                    <?php break; ?>
                <?php else : continue; ?>

                <?php endif;
                        endforeach;
                        if ($t == 0) : ?>
                <div class="rev">
                    <div class="date">No upcoming reservations</div>
                </div>
            <?php endif; ?>
                </div>

            </div>

            <div class="buttons" style="padding-top:0;padding-bottom:1rem">
                <a href="<?php echo URLROOT ?>/customerMenu/menu"><button class="btn">Order Food</button></a>
                <a href="<?php echo URLROOT ?>/customerReservations/showReservations"><button class="btn">Make Reservation</button></a>
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