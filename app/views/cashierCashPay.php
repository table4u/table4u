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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierPayments.css">
  <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css"> -->
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
          <!-- <li> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li> -->
          <!-- <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
          <li> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservation </a> </li>
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

    <div class="backgroundPay">
      <!-- <a class="back"  href="<?php echo URLROOT ?>/CashierPayment/showPendingpayments">  
    <img src="<?php echo URLROOT ?>/public/images/back.svg" alt=""/>
  </a>

  <div class="paymentType">
    Cash payment
  </div> -->

      <!-- Start of Cash Payment -->
      <div class="cashpay">
        <div class="heading">Payment Details
          <hr>
        </div>

        <div class="payment_error">
          <?php if (isset($_SESSION['error'])) : ?>
            <div style="color: #FF0000; margin-top:0%;margin-left:10%;margin-right:10%;padding: 2%; width:80%; font-weight:8%; font-size:85%;text-align:center;">
              <?php echo $_SESSION['error'];
              unset($_SESSION['error']); ?>
            </div>
          <?php endif; ?>
        </div>

        <form class="form1" action="<?php echo URLROOT ?>/CashierPayment/showError" method="post">
          <div class="row">
            <div class="labelname">
              <label for="total">Total amount</label>
            </div>
            <div class="inputrow">
              <input type="number" min="0.00" step="0.01" id="total" name="no1" value="<?php echo $data['total']; ?>"></br></br>
              <!-- <input type="number" min="0.00"  step="0.01" id="total" name="total" value="<?php echo $data['total']; ?>"></br></br> -->
            </div>
          </div>

          <div class="row">
            <div class="labelname">
              <label for="recieve">Recieve</label>
            </div>
            <div class="inputrow">
              <input type="number" min="0.01" step="0.01" id="recieve" name="no2" value="<?php echo $data['recived']; ?>" required /></br></br>
              <!-- <input type="number" min="0.00"  step="0.01" id="received" name="received" value="<?php echo $data['recived']; ?>"></br></br> -->
            </div>
          </div>

          <?php
          $sum = "";
          if (isset($_POST['submit'])) {
            $no1 = $_POST['no1'];
            $no2 = $_POST['no2'];
            $sum = $no2 - $no1;
          }
          ?>

          <div class="row">
            <div class="labelname">
              <label for="balance">Balance</label>
            </div>
            <div class="inputrow">
              <input type="string" min="0.00" step="0.01" id="balance" name="balance" value="<?php echo $sum; ?>" /></br></br>
            </div>
          </div>

          <input class="sumButton" type="submit" name="submit" value=" ">

        </form>

        <!-- <input class="ok" type="submit" name="submit" value="Pay"> -->
        <?php if ($sum >= 0) { ?>
          <a class="paybtn" href="<?php echo URLROOT ?>/CashierPayment/doTransaction/<?php echo $no1; ?>">Pay</a> <?php } ?>
        <!-- <A class="paybtn"   <?php if ($sum >= 0) { ?> HREF="<?php echo URLROOT ?>/CashierPayment/doTransaction/<?php echo $no1; ?>"<?php } ?>
    <?php if ($sum < 0) { ?> HREF="<?php echo URLROOT ?>/CashierOrders/paybyCash/<?php echo $no1; ?>/<?php echo $no2; ?>"<?php } ?>>Pay</A> -->

        <!-- End of Cash Payment -->
      </div>

      <script src="<?php echo URLROOT ?>/public/js/cashierPayment.js"></script>
</body>

</html>