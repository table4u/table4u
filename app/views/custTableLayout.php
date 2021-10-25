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

    <?php elseif (isset($_SESSION['unsuccessReservation'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['unsuccessReservation']; ?>' , 'error')">
            <?php unset($_SESSION['unsuccessReservation']); ?>

        <?php else : ?>

            <body>
            <?php endif; ?>

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

            <script src="<?php echo URLROOT ?>/public/js/customerTable.js"></script>
            <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

            </body>

</html>