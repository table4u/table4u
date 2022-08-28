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

        <?php elseif (isset($_SESSION['noReservation'])) : ?>

            <body onload="Toast.show('<?php echo $_SESSION['noReservation']; ?>' , 'error')">
                <?php unset($_SESSION['noReservation']); ?>

            <?php else : ?>

                <body>
                <?php endif; ?>

                <?php
                require APPROOT . '/views/customer/header.php';
                ?>

                <form class="res-details" method="POST" action="<?php echo URLROOT ?>/customerReservations/verifyDateAndTime">
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

                <div>
                    <form class="openingTime" action="">
                        <div class="form-group">
                            <!-- <?php print_r($data['openTime']); ?> -->
                            <label for="">Opening Time </label>
                            <!-- <input readonly name="openTime" class="time" type="time" class="input-field" id="" placeholder="" " value=" <?php print_r($data['openTime']) ?>"> -->
                            <input readonly name="closeTime" class="time" type="time" class="input-field" id="" placeholder="" value="<?php echo $data['openTime']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="">Closing Time </label>
                            <input readonly name="closeTime" class="time" type="time" class="input-field" id="" placeholder="" value="<?php echo $data['closeTime']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Holidays </label>
                            <?php if (count($data['holidays'])) :
                                foreach ($data['holidays'] as $h) :
                                    if (($h->date > date("Y-m-d"))) :
                            ?>
                                        <div style="font-size:1.5rem">
                                            <?php echo date("l, jS \of F Y", strtotime($h->date)); ?>
                                        </div>
                                <?php endif;
                                endforeach; ?>
                            <?php else : ?>
                                <div style="font-size:1.5rem">
                                    Restaurant Open
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

                <script src="<?php echo URLROOT ?>/public/js/customerTable.js"></script>
                <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

                </body>

</html>