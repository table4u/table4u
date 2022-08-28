<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table4U</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Poppins:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierHome.css">

</head>
<body>

  <div class="logo">
    <i class="fas fa-utensils"></i> Hotel De Luna
  </div>

  <!-- Profile -->
  <div class="profile">
    <h6 class="name">Cashier</h6>
    <div class="pfBtn"  onclick="showProfile()">
      <img class="profileimage" src="<?php echo URLROOT ?>/public/images/profile.png" alt=""/>
      <div class="profWindow" id="myPopup">
        <div class="head">
          <div class="profilepic">
            <img class="profileimage" src="<?php echo URLROOT ?>/public/images/profile.png" alt=""/>
          </div>
          <h8>Cashier</h8>
          <a class="gotopf"  href="<?php echo URLROOT ?>/CashierHome/gotoProfile">Go to profile</a>
          <a class="logout"  href="<?php echo URLROOT ?>/CashierHome/logout">Log out</a>
          <div class="up"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of profile -->
<!-- End of navigation -->

<!-- Buttons -->

<a class="btn1"  href="<?php echo URLROOT ?>/CashierHome/reserve">
  <div class="reserve">
    <img class="icon1" src="<?php echo URLROOT ?>/public/images/reserve.svg" alt=""/>
    <h3 class="text1">Reserve</h3>
  </div>
</a>

<a class="btn2"  href="<?php echo URLROOT ?>/CashierHome/orders">
  <div class="orders">
    <img class="icon2" src="<?php echo URLROOT ?>/public/images/order.svg" alt=""/>
    <h3 class="text2">Orders</h3>
  </div>
</a>

<a class="btn3"  href="<?php echo URLROOT ?>/CashierPayment/showPendingpayments">
  <div class="payments">
    <img class="icon3" src="<?php echo URLROOT ?>/public/images/payment.svg" alt=""/>
    <h3 class="text3">Payments</h3>
  </div>
</a>

<a class="btn4"  href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">
  <div class="guests">
      <img class="icon4" src="<?php echo URLROOT ?>/public/images/guest.svg" alt=""/>
      <h3 class="text4">Customers</h3>
  </div>
</a>

<!-- End of Buttons -->

  <div class="end"> </div>

  <script src="<?php echo URLROOT ?>/public/js/cashierHome.js"></script>  
</body>
</html>