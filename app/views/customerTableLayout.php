<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerTable.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .res-details .form-group input[type=submit]:focus {
            border: none;
        }

        .res-details .form-group input[type=submit]:hover {
            box-shadow: 0 0 0.5rem #222222;
        }
    </style>
    <title>Table Layout</title>

</head>

<?php if (isset($_SESSION['invlaidTime'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['invlaidTime']; ?>' , 'error')">
        <?php unset($_SESSION['invlaidTime']); ?>

    <?php else : ?>

        <body>
        <?php endif; ?>

        <header>
            <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="<?php echo URLROOT ?>/customerHome">Home</a>
                <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
                <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
            </nav>
        </header>

        <form class="res-details" method="POST" action="<?php echo URLROOT ?>/reservations/verifyDateAndTime">
            <div class="form-group">
                <label for="">Date </label>
                <input required name="date" class="date" type="date" class="input-field" id="" placeholder="" value="<?php echo $data['date']; ?>">
            </div>
            <div class="form-group">
                <label for="">Time </label>
                <input required name="time" class="time" type="time" class="input-field" id="" placeholder="" value="<?php echo $data['time']; ?>">
            </div>
            <div class="form-group">
                <input name="submit" class="btn btn-check" type="submit" value="Check" id="" placeholder="" style="color: white; padding-left: 2rem; padding-right:  2rem;">
            </div>
        </form>

        <section>

            <div class="table-main">
                <h3 class="heading">Table Layout</h3>
                <hr>
                <div class="table-layout">
                    <div class="table" id="t1">
                        Table 1
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                    <div class="table" id="t2">
                        Table 2
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                    <div class="table" id="t3">
                        Table 3
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                    <div class="table" id="t4">
                        Table 4
                        <div class="covers">
                            Max: 16
                            <br>
                            Min: 10
                        </div>
                    </div>
                    <div class="table" id="t5">
                        Table 5
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                    <div class="table" id="t6">
                        Table 6
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                    <div class="table" id="t7">
                        Table 7
                        <div class="covers">
                            Max: 5
                            <br>
                            Min: 2
                        </div>
                    </div>
                </div>


            </div>
            <div class="">
                <h3 class="heading">Table Details</h3>
                <hr>
                <div class="table-det-main">
                    <div class="t1 table-det inactive">
                        <h3>
                            Table 1
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span class="label">Availability </span><span class="val">Available</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t2 table-det inactive">
                        <h3>
                            Table 2
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span class="label">Availability </span><span class="val">Available</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t3 table-det inactive">
                        <h3>
                            Table 3
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span class="label">Availability </span><span class="val">Available</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t4 table-det inactive">
                        <h3>
                            Table 4
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">16</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">10</span></div>
                            <div><span disabled class="label">Availability </span><span class="val">Unvailable</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t5 table-det inactive">
                        <h3>
                            Table 5
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span class="label">Availability </span><span class="val">Available</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t6 table-det inactive">
                        <h3>
                            Table 6
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span class="label">Availability </span><span class="val">Available</span></div>
                        </div>
                        <button class="btn bookNow">
                            Book Now
                        </button>
                    </div>

                    <div class="t7 table-det inactive">
                        <h3>
                            Table 7
                        </h3>
                        <div class="table-info">
                            <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                            <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                            <div><span disabled class="label">Availability </span><span class="val">Unavailable</span></div>
                        </div>
                        <button class="btn bookNow" id="">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>


        </section>

        <div class="bg inactive"></div>

        <div class="modal inactive">
            <div class="close fas fa-times"></div>
            <h3 class="heading">Reserve Table</h3>
            <hr>
            <form action="<?php echo URLROOT ?>/reservations/makeReservations" method="POST">
                <div class="form-group">
                    <label for="">Date: </label>
                    <input name="date" type="date" required class="input-field" id="" placeholder="" value="<?php echo $data['date']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Time: </label>
                    <input name="time" type="time" required class="input-field" id="" placeholder="" value="<?php echo $data['time']; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Covers: <span class="star">*</span></label>
                    <input name="covers" type="number" min=2 max=6 required class="input-field" id="" placeholder="Covers" value="">
                </div>
                <div class="form-group" style="width:  115%;">
                    <label for="">Food Ordering? <span class="star">*</span></label>
                    <input name="food" type="radio" required class="radio-btn" id="yes" class="radio-btn" placeholder="" value="Yes"> <label for="yes" style="margin-left: 0.25rem;">Yes</label>
                    <input name="food" type="radio" required class="radio-btn" id="no" class="radio-btn" placeholder="" value="No"> <label for="no" style="margin-left: 0.5rem;">No</label>
                </div>
                <button class="btn" id="confirm-btn" type=submit>
                    Confirm
                </button>
            </form>
        </div>
        <script src="<?php echo URLROOT ?>/public/js/customerTable.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

        </body>

</html>