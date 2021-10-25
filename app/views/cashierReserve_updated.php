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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierReserve.css">

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
          <h8>A.S.M. Adhikari</h8>
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
  <nav class="menuList">
    <h1 class="floor">Floor 1</h1>
    <a class="current"  href="<?php echo URLROOT ?>/CashierReserve/index"><h1>Current</h1></a>
    <div class="date_time" onclick="selectdate_time()">
      <img class="calander1" src="<?php echo URLROOT ?>/public/images/calendar2.svg">
      <img class="clock1" src="<?php echo URLROOT ?>/public/images/clock2.svg">
    </div>
    
  </nav>
      
  <!-- End of Menu List -->

  <!-- Start Select date & time -->
<div class="chooseDate" id="popupdateform">
  <form>
    <div class="row">
      <div class="labelname">
        <label for="reserveDate">Date </label>
      </div>
      <div class="inputrow">
        <input type="date" id="reserveDate" name="reserveDate"></br></br>
      </div>
    </div>
    
    <div class="row">
      <div class="labelname">
        <label for="reserveTime">Time </label>
      </div>
      <div class="inputrow">
        <input type="time" id="reserveTime" name="reserveTime"></br></br>
      </div>
    </div>
    
    <div class="ok">
      <input type="submit" value="OK">
    </div>
    <div class="Cancel">
      <input type="cancel" value="Cancel">
    </div>

  </form> 
</div>
<!-- End Select date & time -->

  <!-- Start Layout One -->

    <!--  Start layout  -->
<div class="layout">
  <div class="menubutton"  onclick="showreserveList()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    <!-- <div class="tableform" id="Tform">

    </div> -->
  </div>

  <div class="table1u"  onclick="func()">
        <h2 class="text">Table 1</h2>
        <h3 class="covers">Covers Range (7 - 10)</h3>
  </div>

  <div class="table2u"  onclick="func()">
    <h2 class="text">Table 2</h2>
    <h3 class="covers">Covers Range (7 - 10)</h3>
  </div>

  <div class="table3"  onclick="func()">
    <h2 class="text">Table 3</h2>
    <h3 class="covers">Covers Range (5 - 8)</h3>
  </div>

  <div class="table4u"  onclick="func()">
    <h2 class="text">Table 4</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <div class="table5u"  onclick="func()">
    <h2 class="text">Table 5</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <div class="table6u"  onclick="func()">
    <h2 class="text">Table 6</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <!-- <div class="table7u"  onclick="func()">
    <h2 class="text">Table 7</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div> -->

  <div class="table8u"  onclick="func()">
    <h2 class="text">Table 8</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table9u"  onclick="func()">
    <h2 class="text">Table 9</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table10u"  onclick="func()">
    <h2 class="text">Table 10</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table11u"  onclick="func()">
    <h2 class="text">Table 11</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table12u"  onclick="func()">
    <h2 class="text">Table 12</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table13u"  onclick="func()">
    <h2 class="text">Table 13</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table14u"  onclick="func()">
    <h2 class="text">Table 14</h2>
    <h3 class="covers">Covers Range (4 - 8)</h3>
  </div>

  <div class="table15u"  onclick="func()">
    <h2 class="text">Table 15</h2>
    <h3 class="covers">Covers Range (4 - 8)</h3>
  </div>

  <div class="table16u"  onclick="func()">
    <h2 class="text">Table 16</h2>
    <h3 class="covers">Covers Range (4 - 8)</h3>
  </div>

  <!-- End of layout One -->

  <div class="naming">
    <h4>Available Unavailable</h4>
    <div class="available"></div>
    <div class="unavailable"></div>
  </div>
<!-- End of layout  -->
</div>

   

  <script src="<?php echo URLROOT ?>/public/js/cashierReserve.js"></script>  
</body>
</html>
