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
    <a class="btnHome"  href="<?php echo URLROOT ?>/CashierHome/index">
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
  </div>

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
      <form>
        <input type="text" placeholder="Search" name="search">
        <input type="submit" value="" src="<?php echo URLROOT ?>/public/images/search.svg"> 
      </form>
  

      <div class="crd1"  onclick="funcCd1()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd2"  onclick="funcCd2()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd3"  onclick="funcCd3()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd4"  onclick="funcCd4()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd5"  onclick="funcCd5()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd6"  onclick="funcCd6()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd7"  onclick="funcCd7()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd8"  onclick="funcCd8()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd9"  onclick="funcCd9()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd10"  onclick="funcCd10()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd11"  onclick="funcCd11()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd12"  onclick="funcCd12()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd13"  onclick="funcCd13()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="crd14"  onclick="funcCd14()">
        <div class="item1">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/maincourse.jpg" alt=""/>
            <h4 class="text1">Italian Chops</h4>
            <h5 class="price1">Rs . 800.00</h5>
        </div>
      </div>

      <div class="info"  onclick="funcCd15()">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/information.svg" alt=""/>
        </div>
      </div>

  </div>

  <!-- End of Menu List -->


  <!-- Start Checkout Box -->

  <div class="checkoutBox">
    <h1>Checkout</h1>
    <h2>Name  Qty  Price(Rs.)</h2>
    
    <div class="list">
      <div class="itemList">
        <img class="trash" src="<?php echo URLROOT ?>/public/images/trash-bin.svg">
        <h8 class="itemName">Expresso Shot </h8>
        <h9></h9>
      </div>
    </div>

    <div class="cancel"  onclick="cancelOrder()">
          <!-- <img class="icon1" src="<?php echo URLROOT ?>/public/images/cancel.svg" alt=""/> -->
          <div class="text1">Cancel</div>
    </div>
    
    <a class="paybyCash"  href="<?php echo URLROOT ?>/cashierOrders/paybyCash">
      <img class="icon1" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/>
      <h6 class="text1">Cash Pay</h3>
    </a>

    <a class="paybyCard"  href="<?php echo URLROOT ?>/cashierOrders/paybyCard">
      <img class="icon1" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/>
      <h6 class="text1">Card Pay</h3>
    </a>

      <div class="charge">
        <h7 class="textTotal">Service charge (if any)</h7>
      </div>
      <div class="discount">
        <h7 class="textTotal">Discount</h7>
      </div>
      <div class="total">
        <h7 class="textTotal">Total</h7>
      </div>
  </div>

  <!-- End of Checkout Box -->

<!-- Start of menu buttons -->
<div class="menutypeButtons">
  <a class="btn1"  href="<?php echo URLROOT ?>/cashierOrders/index">
    <div class="appertizer">
    <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
        <h3 class="text1">Appetizers </h3>
    </div>
  </a>

  <a class="btn22"  href="<?php echo URLROOT ?>/cashierOrders/showMaincourse">
    <div class="maincourse">
      <img class="icon2" src="<?php echo URLROOT ?>/public/images/dinner.svg" alt=""/>
      <h3 class="text2"> Main Course</h3>
    </div>
  </a>

  <a class="btn3"  href="<?php echo URLROOT ?>/cashierOrders/showDessert">
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
