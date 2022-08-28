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
  </div>
<!-- End of profile -->
  <!-- End of navigation -->

  <!-- Start Menu List -->
  <nav class="menuList">
    <h1 class="floor">Floor 1</h1>
    <a class="current"  href="<?php echo URLROOT ?>/CashierHome/reserve"><h1>Current</h1></a>
    <div class="date_time" onclick="selectdate_time()">
      <img class="calander1" src="<?php echo URLROOT ?>/public/images/calendar2.svg">
      <img class="clock1" src="<?php echo URLROOT ?>/public/images/clock2.svg">
        <!-- Start Select date & time -->
        <div class="chooseDate" id="popupdateform">
          <form action="<?php echo URLROOT ?>/CashierReserve/showUpdatedLayout">
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
              <input type="reset" value="Cancel">
            </div>

          </form> 
        </div>
        <!-- End Select date & time -->
    </div>
    
  </nav>
      
  <!-- End of Menu List -->


<!--  Start layout  -->
<div class="layout">
  <div class="menubutton"  onclick="showreserveList()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
    
      <!-- Start of reserve table -->
    <div class="tableform" id="Tform">
      <div class="title">Reserve Table</div>

      <form action="<?php echo URLROOT ?>/CashierHome/reserve">
        <div class="row">
          <div class="labelname">
            <label for="custName">Customer name</label>
          </div>
          <div class="inputrow">
            <input type="text" id="custName" name="custName" required></br></br>
          </div>
        </div>
          
        <div class="row">
          <div class="labelname">
            <label for="telNo">Contact No</label>
          </div>
          <div class="inputrow">
            <input type="tel" id="telNo" name="telNo" required></br></br>
          </div>
        </div>

        <div class="row">
          <div class="labelname">
            <label for="NIC">NIC No</label>
          </div>
          <div class="inputrow">
            <input type="text" id="NIC" name="NIC" required></br></br>
          </div>
        </div>

        <div class="row">
          <div class="labelname">
            <label for="custAddress">Address</label>
          </div>
          <div class="inputrow">
            <input type="text" id="custAddress" name="custAddress" required></br></br>
          </div>
        </div>

        <div class="row">
          <div class="labelname">
            <label for="noOfCovers">Number of covers</label>
          </div>
          <div class="inputrow">
            <input type="number" id="noOfCovers" name="noOfCovers" required></br></br>
          </div>
        </div>
          
        <input type="submit" value="OK">
        <input type="button" value="Cancel" onclick="closeForm()">
      
      </form> 
    </div>
  </div>  

  <!-- Start Already reserved message -->
  <div class="message" id="alreadyreserved">

  </div>  
  <!-- End Already reserved message -->

<!-- End  of reserve table -->
  

  <div class="table1"  onclick="showreserveList()">
        <h2 class="text">Table 1</h2>
        <h3 class="covers">Covers Range (7 - 10)</h3>
  </div>

  <div class="table2"  onclick="showreserveList()">
    <h2 class="text">Table 2</h2>
    <h3 class="covers">Covers Range (7 - 10)</h3>
  </div>

  <div class="table33" id="unavailableT3" onclick="showreserveForm()">
    <h2 class="text">Table 3</h2>
    <h3 class="covers">Covers Range (5 - 8)</h3>
  </div>

  <div class="table4"  onclick="showalreadyReserved()">
    <h2 class="text">Table 4</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <div class="table5"  onclick="showalreadyReserved()">
    <h2 class="text">Table 5</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <div class="table6"  onclick="showreserveList()">
    <h2 class="text">Table 6</h2>
    <h3 class="covers">Covers Range (1 - 4)</h3>
  </div>

  <div class="table8"  onclick="showalreadyReserved()">
    <h2 class="text">Table 8</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table9"  onclick="showalreadyReserved()">
    <h2 class="text">Table 9</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table10"  onclick="showalreadyReserved()">
    <h2 class="text">Table 10</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table11"  onclick="showalreadyReserved()">
    <h2 class="text">Table 11</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table12"  onclick="showreserveList()">
    <h2 class="text">Table 12</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table13"  onclick="showreserveList()">
    <h2 class="text">Table 13</h2>
    <h3 class="covers">Covers Range (3 - 6)</h3>
  </div>

  <div class="table14"  onclick="showreserveList()">
    <h2 class="text">Table 14</h2>
    <h3 class="covers">Covers Range (4 - 8)</h3>
  </div>

  <div class="table15"  onclick="showreserveList()">
    <h2 class="text">Table 15</h2>
    <h3 class="covers">Covers Range (4 - 8)</h3>
  </div>

  <div class="table16"  onclick="showreserveList()">
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
