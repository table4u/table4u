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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierPayment.css">

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
  </div>

  <!-- Profile -->
  <div class="profile">
    <h6 class="name">A.S.M. Adhikari</h6>
    <div class="pfBtn"  onclick="showProfile()">

      <div class="profWindow" id="myPopup">
        <div class="head">
          <div class="profilepic"></div>
          <h8>A.S.M. Adhikari</h8>
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

<div class="backgroundPay">
  <form class="search" action="<?php echo URLROOT ?>/CashierPayment/searchpayments">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>

    <!-- Start of menu buttons -->
    <div class="menutypeButtons">
      <a class="btn11"  href="<?php echo URLROOT ?>/CashierHome/payment">
        <div class="pendingbtn">
        <img class="icon1" src="<?php echo URLROOT ?>/public/images/pendingPayment.png" alt=""/>
            <h3 class="text1">Pending Payments </h3>
        </div>
      </a>

      <a class="btn22"  href="<?php echo URLROOT ?>/CashierHome/payments">
        <div class="completebtn">
          <img class="icon2" src="<?php echo URLROOT ?>/public/images/completedPayments.png" alt=""/>
          <h3 class="text2"> Completed Payments</h3>
        </div>
      </a>
    </div>  
  <!-- End of menu buttons -->

  <!-- Start of payment details -->
  <div class="detailtable">
    <div class="row">
      <div class="column1">
        <h2>Date</h2>
      </div>
      <div class="column2">
        <h2>Time</h2>
      </div>
      <div class="column3">
        <h2>Type</h2>
      </div>
      <div class="column4">
        <h2>Name</h2>
      </div>
      <div class="column5">
        <h2>Amount</h2>
      </div>
      <div class="column6">
        <h2>Status</h2>
      </div>
    <div>     

    <div class="row">
      <div class="column11">
        </br><p>12.08.2021</p></br>
        <p>12.08.2021</p></br>
        <p>12.08.2021</p></br>
        <p>05.07.2021</p></br>
      </div>
      <div class="column22">
        </br><p>08 . 12 PM</p></br>
        <p>03 . 50 PM</p></br>
        <p>08 . 44 PM</p></br>
        <p>03 . 11 PM</p></br>
      </div>
      <div class="column33">
        </br><p>Cash</p></br>
        <p>Card</p></br>
        <p>Cash</p></br>
        <p>Cash</p></br>
      </div>
      <div class="column44">
        </br><p>P.S.D.Pathirana</p></br>
        <p>K.P.P.Devid</p></br>
        <p>M.J.F.Zoyza</p></br>
        <p>J.Y.S.Athapaththu</p></br>
      </div>
      <div class="column55">
        </br><p>1200.00</p></br>
        <p>1642.00</p></br>
        <p>2540.00</p></br>
        <p>5800.00</p></br>
      </div>
      <div class="column66">
        </br><div class="complete" > Completed</div></br></a>
        <p class="complete">Completed</p></br>
        <p class="complete">Completed</p></br>
        <p class="complete">Completed</p></br>

      </div>
    <div>     
  </div>  
</div>  
<!-- End of payment details -->

  <script src="<?php echo URLROOT ?>/public/js/cashierPayment.js"></script>  
</body>
</html>
