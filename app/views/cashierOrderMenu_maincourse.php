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
        <!-- <div class="menutypeButtons">
          <a class="btn11"  href="<?php echo URLROOT ?>/CashierOrderMenu">
            <div class="appertizer">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
                <h3 class="text1">Appetizers </h3>
            </div>
          </a>

          <a class="btn2"  href="<?php echo URLROOT ?>/CashierOrderMenu/showMaincourse">
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
        </div> -->
    <!-- End of menu buttons -->

    <section>
        <div class="filter">
            <div class="search">
                <form action="">
                    <input type="text" id="search" name="search" placeholder="Search..." autocomplete="off">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="filters">
                <ul>
                    <li class='active'>All</li>
                    <li>Veg</li>
                    <li>Non Veg</li>
                </ul>
            </div>

        </div>
        <div class="container">
            <div class="tab">
                <?php
                // print_r($data);
                foreach ($data as $d) :

                    if ($d->menuId == 1) : ?>
                        <button id="<?php str_replace(' ', '', $d->name) ?> " class="defaultOpen tablinks" onclick="opentab(event, '<?php echo $d->name ?>')"><?php echo $d->name ?> </button>
                    <?php else : ?>
                        <button id="<?php str_replace(' ', '', $d->name) ?>" class="tablinks" onclick="opentab(event, '<?php echo $d->name ?>')"> <?php echo $d->name ?></button>
                      
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <?php
            foreach ($data as $d) : ?>
                <div class="menu-container order" id="<?php echo $d->name ?>" onclick="addToCartClicked()">
            
                </div>
            <?php endforeach; ?>
            <!-- <div class="cart">
                <h3 class="heading">Your cart</h3>
                <hr>
                <div class="small-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                    </table>

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td class="net-total">Rs 0</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td class="tax">Rs 0</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="grand-total">Rs 0</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <a href=" <?php echo URLROOT ?>/customerMenu/payment" class="checkout" id="checkoutBtn">
                    Proceed to Checkout
                </a>
            </div> -->


            <div class="hoverDetails">

            </div>
    </section>


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
    
    <a class="paybyCash"  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCash">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/>
      <h6 class="text1">Cash Pay</h3>
    </a>

    <a class="paybyCard"  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCard">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/>
      <h6 class="text1">Card Pay</h3>
    </a>
  </div>

  <!-- End of Checkout Box -->

  <script src="<?php echo URLROOT ?>/public/js/cashierOrders.js"></script>  
</body>
</html>
