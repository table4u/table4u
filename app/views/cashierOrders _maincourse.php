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
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierOrders.css">

</head>
<body>
  <div class="header">
    <a class="btnHome"  href="<?php echo URLROOT ?>/CashierHome">
      <img class="iconHome" src="<?php echo URLROOT ?>/public/images/home.svg" alt=""/>
      <div class="logo">
        <i class="fas fa-utensils"></i> Hotel De Luna
      </div>
    </a>
  </div>

  <div class="footer">
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
          <h4>Cashier</h4>
          <a class="gotopf"  href="<?php echo URLROOT ?>/CashierHome/gotoProfile">Go to profile</a>
          <a class="logout"  href="<?php echo URLROOT ?>/CashierHome/logout">Log out</a>
          <div class="up"></div>

        </div>
      </div>

      </div>

      </div>
    </div>
  </div>
  <!-- End of profile -->

  <!-- Start Menu List -->

  <div class="menulist">
    <form class="search" action="<?php echo URLROOT ?>/CashierOrders/searchMenuItem">
      <input type="text" placeholder="Search.." name="search">
      <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
    </form>
  

    <div class="menuItems">
      <div class="row">
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
              <h5 class="text1">Italian Chops</h5>
              <h5 class="price1">Rs . <span class="price">800.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse1.jpg" alt=""/>
              <h5 class="text1">Chainese Spicy</h5>
              <h5 class="price1">Rs . <span class="price">800.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse2.jpg" alt=""/>
              <h5 class="text1">Chicken Biriyani</h5>
              <h5 class="price1">Rs . <span class="price">900.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse3.jpg" alt=""/>
              <h5 class="text1">Chicken Kottu</h5>
              <h5 class="price1">Rs . <span class="price">850.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse4.jpg" alt=""/>
              <h5 class="text1">Mix Rice</h5>
              <h5 class="price1">Rs . <span class="price">500.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <!-- <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
              <h5 class="text1">Italian Chops</h5>
              <h5 class="price1">Rs . 800.00</h5>
              <input type="number" class="Itemquantity" value="1">
          </div>
        </div> -->

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse5.jpg" alt=""/>
              <h5 class="text1">Seafood Rice</h5>
              <h5 class="price1">Rs . <span class="price">750.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
              <h5 class="text1">Italian Chops</h5>
              <h5 class="price1">Rs . 800.00</h5>
              <input type="number" class="Itemquantity" value="1">
          </div>
        </div> -->

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse6.jpg" alt=""/>
              <h5 class="text1">Rice & Curry</h5>
              <h5 class="price1">Rs . <span class="price">300.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse7.jpg" alt=""/>
              <h5 class="text1">Bread & Omelette</h5>
              <h5 class="price1">Rs . <span class="price">300.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse8.jpg" alt=""/>
              <h5 class="text1">Masala Dose</h5>
              <h5 class="price1">Rs . <span class="price">450.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse9.jpg" alt=""/>
              <h5 class="text1">String Hoppers</h5>
              <h5 class="price1">Rs . <span class="price">250.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse10.jpg" alt=""/>
              <h5 class="text1">Indiyan Meal</h5>
              <h5 class="price1">Rs . <span class="price">410.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/maincourse11.jpg" alt=""/>
              <h5 class="text1">Indiyan Parata</h5>
              <h5 class="price1">Rs . <span class="price">380.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
      </div>
    </div>  

      <!-- <div class="info"  onclick="funcCd15()">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/information.svg" alt=""/>
        </div>
      </div> -->

  </div>

  <!-- End of Menu List -->


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

    <a class="cancel"  href="<?php echo URLROOT ?>/CashierHome/payment">
      <div class="text1">Save Order</div>
    </a>
<!--     
    <a class="paybyCash"  href="<?php echo URLROOT ?>/cashierOrders/paybyCash">
       <img class="iconpay" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/> -->
      <!-- <h6 class="text1">Cash Pay</h3>
    </a> --> -->

    <a class="paybyCard"  href="<?php echo URLROOT ?>/cashierOrders/paybyCard">
      <!-- <img class="iconpay" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/> -->
      <h6 class="text1">Card Pay</h3>
    </a>
  </div>

  <!-- End of Checkout Box -->

<!-- Start of menu buttons -->
<div class="menutypeButtons">
  <a class="btn1"  href="<?php echo URLROOT ?>/CashierHome/orders">
    <div class="appertizer">
    <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
        <h3 class="text1">Appetizers </h3>
    </div>
  </a>

  <a class="btn22"  href="<?php echo URLROOT ?>/CashierHome/morders">
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

  <script src="<?php echo URLROOT ?>/public/js/cashierOrders.js"></script>  
</body>
</html>
