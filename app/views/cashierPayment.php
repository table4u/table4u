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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierPayments.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <title>Table4U</title>

</head>

<body>
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
                    <li> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
                    <li class="payment-navigation"> <a href="<?php echo URLROOT ?>/CashierPayment/showCompletedpayments">Payments </a> </li>

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

            <div class="topic-customer">
                <h1>Payments</h1>
            </div>

            <form class="search" action="<?php echo URLROOT ?>/CashierPayment/searchCompletedPayments" method="GET">
                <input type="text" placeholder="Search.." name="search" value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>">
            </form>

            <table class="table-payments" id="payment-table">
                <thead>
                    <tr class="payment_row">
                        <th class="title1">Date</th>
                        <th class="title2">Time</th>
                        <th class="title3">Order Id</th>
                        <th class="title4">Payment Type</th>
                        <th class="title5">Amount</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="5">
                            <div class="scrollit">
                                <table>
                                    <?php foreach ($data as $d) : ?>
                                        <tr class="detailrow">
                                            <td><?php echo $d->date; ?></td>
                                            <td><?php echo $d->time; ?></td>
                                            <td><?php echo "Order-" . $d->orderID; ?></td>
                                            <td><?php echo $d->payment_type; ?></td>
                                            <td><?php echo "Rs. " . $d->amount . ".00"; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                    </tr>
                </tbody>
            </table>

            <div class="matirial01">
                <?php $sum = 0; ?>
                <?php foreach ($data as $d) :
                    //  die("loop");

                    if ($d->payment_type == "Cash") {


                        $sum = $sum + $d->amount;
                    }
                endforeach; ?>

                <H1>Total Amount by Cash -> <?php echo $sum ?>.00/=<H1>


            </div>
            <br>

            <!-- <div class="matirial02">
                    <H1>Total Amount by Card<H1>
                    <h1>2350/=</h1>
                </div>         -->

            <script src="<?php echo URLROOT ?>/public/js/cashierPayment.js"></script>
</body>

</html>