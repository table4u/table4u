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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierGuests.css">

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
      <div class="date" onclick="showCalender()">08/08/202
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
        <!-- <div class="Mycalender" id="popupCalen"></div> -->
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

<!-- Start Menu Bar -->
<div class="menubar">
    <div class="title">
      <h1>Guests</h1>
      <img src="<?php echo URLROOT ?>/public/images/guest.svg">
    </div>

    <a class="btn1"  href="<?php echo URLROOT ?>/CashierGuests/addCustomer">
      <h2>Add Customer</h2>
    </a>

    <a class="btn2"  href="<?php echo URLROOT ?>/CashierGuests/showallcustomers">
      <h2>All Customers</h2>
    </a>

    <a class="btn33"  href="<?php echo URLROOT ?>/CashierGuests/showRegisterCustomers">
      <h2>Registered</h2>
    </a>

    <a class="btn4"  href="<?php echo URLROOT ?>/CashierGuests/showUnregisterCustomers">
      <h2>Unregistered</h2>
    </a>
  </div>
   <!-- End of Menu Bar -->
 
  <div class="pageBackground">
    <!-- <form>
      <input type="text" placeholder="Search" name="search">
      <input type="submit" value="" src="<?php echo URLROOT ?>/public/images/search.svg"> 
    </form> -->

    <!-- Start of Section2 -->

    <table class="table-customers">
    <thead>
    <tr>
        <th class="column1">Name</th>
        <th class="column2">NIC</th>
        <th class="column3">Address</th>
        <th class="column4">Mobile Number</th>
        <th class="column5">Email</th>
    </tr>

    </thead>
    <tbody>
    <?php foreach($data as $d ): ?>
    <tr class="detailrow">
        <td class="column11"><?php echo $d->name; ?></td>
        <td class="column22"><?php echo $d->NIC; ?></td>
        <td class="column33"><?php echo $d->address; ?></td>
        <td class="column44"><?php echo $d->mobile; ?></td>
        <td class="column55"><?php echo $d->email; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

                    

<!-- End of Section2 -->
</div>


  <script src="<?php echo URLROOT ?>/public/js/cashierGuests.js"></script>  
</body>
</html>
