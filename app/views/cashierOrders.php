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

  <!-- Navigation Bar -->
  <div class="desktop-nav">
      <a href="#">
        <img class="calendar" src="<?php echo URLROOT ?>/public/images/calendar.svg" alt=""/>
        <img class="clock" src="<?php echo URLROOT ?>/public/images/clock.svg" alt=""/>
      </a>
      <div class="date" onclick="showCalender()">22/10/2021
        <div class="Mycalender" id="popupCalen">
          <div class="month">      
            <ul>
              <li class="prev">&#10094;</li>
              <li class="next">&#10095;</li>
              <li>
                Octomber<br>
                <span style="font-size:18px">2021</span>
              </li>
            </ul>
          </div>
          
          <ul class="weekdays">
            <li>Mo</li>
            <li>Tu</li>
            <li>We</li>
            <li>Th</li>
            <li>Fr</li>
            <li>Sa</li>
            <li>Su</li>
          </ul>
          
          <ul class="days">  
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li>10</li>
            <li>11</li>
            <li>12</li>
            <li>13</li>
            <li>14</li>
            <li>15</li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li><span class="active">22</span></li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
            <li>31</li>
          </ul>
        </div>
      </div>
      <div class="day" onclick="showCalender()">Tuesday
        <div class="Mycalender" id="popupCalen"></div>
      </div>
      <div class="time">15 : 45</div>
  </div>
  <!-- </div> -->

  <!-- Profile -->
  <div class="profile">
    <h6 class="name">A.S.M. Adhikari</h6>
    <div class="pfBtn"  onclick="showProfile()">

      <div class="profWindow" id="myPopup">
        <div class="head">
          <div class="profilepic"></div>
          <h4>A.S.M. Adhikari</h4>
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
  <!-- End of navigation -->

  <!-- Start Menu List -->

  <div class="menulist">
    <form class="search" action="<?php echo URLROOT ?>/CashierOrders/searchMenuItem">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>


    <div class="menuItems">
      <div class="row">
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
              <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer.jpg" alt=""/>
              <h5 class="text1">Spicy Shrimp</h5>
              <h5 class="price1">Rs . <span class="price">400.00</span></h5>
              <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer2.jpg" alt=""/>
            <h5 class="text1">French Bread</h5>
            <h5 class="price1">Rs . <span class="price">200.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <!-- <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer3.jpg" alt=""/>
            <h5 class="text1">Garlic Prawn</h5>
            <h5 class="price1">Rs . 500.00</h5>
            <input type="number" class="Itemquantity" value="1">
          </div>
        </div> -->
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer4.jpg" alt=""/>
            <h5 class="text1">Chil Macaroni</h5>
            <h5 class="price1">Rs . <span class="price">420.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer5.jpg" alt=""/>
            <h5 class="text1">Crab Cake</h5>
            <h5 class="price1">Rs . <span class="price">600.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer6.jpg" alt=""/>
            <h5 class="text1">Pot Stickers</h5>
            <h5 class="price1">Rs . <span class="price">300.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer7.jpg" alt=""/>
            <h5 class="text1">Mini Quiche</h5>
            <h5 class="price1">Rs . <span class="price">200.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
      </div>

      <div class="row">
        <!-- <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer8.jpg" alt=""/>
            <h5 class="text1">Potato Skins</h5>
            <h5 class="price1">Rs . 350.00</h5>
            <input type="number" class="Itemquantity" value="1">
          </div>
        </div> -->

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer9.jpg" alt=""/>
            <h5 class="text1">Deviled Egg</h5>
            <h5 class="price1">Rs . <span class="price">300.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer10.jpg" alt=""/>
            <h5 class="text1">Roasted Meat</h5>
            <h5 class="price1">Rs . <span class="price">700.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>
        
        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer11.jpg" alt=""/>
            <h5 class="text1">Hot Wings</h5>
            <h5 class="price1">Rs . <span class="price">800.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer12.jpg" alt=""/>
            <h5 class="text1">Spring Roll</h5>
            <h5 class="price1">Rs . <span class="price">200.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer13.jpg" alt=""/>
            <h5 class="text1">French Burger</h5>
            <h5 class="price1">Rs . <span class="price">500.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
          </div>
        </div>

        <div class="column">
          <div class="card"  onclick="addToCartClicked()">
            <img class="icon" src="<?php echo URLROOT ?>/public/images/apertizer14.jpg" alt=""/>
            <h5 class="text1">Chicken Roll</h5>
            <h5 class="price1">Rs . <span class="price">200.00</span></h5>
            <!-- <input type="number" class="Itemquantity" value="1"> -->
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
    
    <a class="paybyCash"  href="<?php echo URLROOT ?>/CashierOrders/paybyCash">
      <!-- <img class="iconpay" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/> -->
      <h6 class="text1">Cash Pay</h3>
    </a>

    <a class="paybyCard"  href="<?php echo URLROOT ?>/CashierOrders/paybyCard">
      <!-- <img class="iconpay" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/> -->
      <h6 class="text1">Card Pay</h3>
    </a>
  </div>

  <!-- End of Checkout Box -->

<!-- Start of menu buttons -->
<div class="menutypeButtons">
  <a class="btn11"  href="<?php echo URLROOT ?>/CashierHome/orders">
    <div class="appertizer">
    <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
        <h3 class="text1">Appetizers </h3>
    </div>
  </a>

  <a class="btn2"  href="<?php echo URLROOT ?>/CashierHome/morders">
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
