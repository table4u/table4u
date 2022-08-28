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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierOrderMenu.css">
    <title>Table4U</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h7>Table 4U<br> Cashier Panel</h7>
         </div>
                <div>
                    <ul>
                    <!-- <li> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
                    <li> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
                    <li class="menu-navigation"> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierPayment/showCompletedpayments">Payments </a> </li>
                
                    <br><br>
                    <!-- <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li> -->

                    </ul>
                </div>
                <a class="logout" a href="<?php echo URLROOT ?>/Login/logout">Log Out</a>
                
        </section><!--Section navigation end-->


        <section class="main_area"> <!--Section main area start-->
        <div class="login_name"><p>Cashier</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/profile.png" width="30px" height="30px">  </div>

        <!-- Start of menu buttons -->
        <div class="menutypeButtons">
          <a class="btn1"  href="<?php echo URLROOT ?>/CashierOrderMenu">
            <div class="appertizer">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
                <h3 class="text1">Appetizers </h3>
            </div>
          </a>

          <a class="btn22"  href="<?php echo URLROOT ?>/CashierOrderMenu/showMaincourse">
            <div class="maincourse">
              <img class="icon2" src="<?php echo URLROOT ?>/public/images/dinner.svg" alt=""/>
              <h3 class="text2"> Main Course</h3>
            </div>
          </a>

          <a class="btn3"  href="<?php echo URLROOT ?>/CashierHome/dorders">
            <div class="dessert">
              <img class="icon3" src="<?php echo URLROOT ?>/public/images/desert.svg" alt=""/>
              <h3 class="text3">Dessert</h3>
            </div>
          </a>
        </div>
    <!-- End of menu buttons -->

  <div id="list1">

    <!-- Start Menu List -->

    <div class="menulist">
      <form class="search" action="<?php echo URLROOT ?>/CashierOrders/searchMenuItem">
        <input type="text" placeholder="Search.." name="search">
        <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
      </form>

        <!-- Start of Section2 -->

      <!-- <table class="table-menuItems">
        <tbody>
        <?php foreach($data as $d ): ?>
        <tr class="row">
            <td class="column"><?php echo $d->name; ?></td>
        </tr>
        <tr class="row">
            <td class="column"><?php echo $d->	pricePerServing; ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table> -->


      <div class="menuItems">
        <div class="row">
          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
              <h5 class="text1">Italian Chops</h5>
              <h5 class="price1">Rs . <span class="price">800.00</span></h5>
            </div>
          </div>

          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse1.jpg" alt=""/>
              <h5 class="text1">Chainese Spicy</h5>
              <h5 class="price1">Rs . <span class="price">800.00</span></h5>
            </div>
          </div>
          
          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse2.jpg" alt=""/>
              <h5 class="text1">Chicken Biriyani</h5>
              <h5 class="price1">Rs . <span class="price">900.00</span></h5>
            </div>
          </div>

          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse3.jpg" alt=""/>
              <h5 class="text1">Chicken Kottu</h5>
              <h5 class="price1">Rs . <span class="price">850.00</span></h5>
            </div>
          </div>

        </div>

        <div class="row">
         
          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer9.jpg" alt=""/>
              <h5 class="text1">Deviled Egg</h5>
              <h5 class="price1">Rs . <span class="price">300.00</span></h5>
            </div>
          </div>
          
          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse4.jpg" alt=""/>
              <h5 class="text1">Mix Rice</h5>
              <h5 class="price1">Rs . <span class="price">500.00</span></h5>
            </div>
          </div>
          
          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse6.jpg" alt=""/>
              <h5 class="text1">Rice & Curry</h5>
              <h5 class="price1">Rs . <span class="price">300.00</span></h5>
            </div>
          </div>

          <div class="column">
            <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse7.jpg" alt=""/>
              <h5 class="text1">Bread & Omelette</h5>
              <h5 class="price1">Rs . <span class="price">300.00</span></h5>
            </div>
          </div>

        </div>
      </div>  


        <!-- <div class="info"  onclick="addToCartClicked()">
              <img class="iconinfo" src="<?php echo URLROOT ?>/public/images/information.svg" alt=""/>
          </div>
        </div> -->

    </div>

    <!-- End of Menu List -->

  </div>

  <!-- Start Checkout Box -->

  <div class="checkoutBox">
    <h1>Checkout</h1>
    <h2>Item Price(Rs.) Qty</h2>
    
    <div class="list">
      <section class="container content-section">
            <div class="cart-items">
            </div>
        </section>
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">00000.00</span>
        
    </div>

    <div id="total" ></div>
    
    <!-- <a class="paybyCash" id=""  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCash">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/>
      <h6 class="text1">Cash Pay</h3>
    </a> -->

    <a class="paybyCard"  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCard">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/>
      <h6 class="text1">Card Pay</h3>
    </a>
  </div>

  <!-- End of Checkout Box -->

  <script src="<?php echo URLROOT ?>/public/js/cashierOrders.js"></script>  
</body>
</html>
