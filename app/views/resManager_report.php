<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreport.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Reports- Restaurant manager</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
            </div>
                <div>
                    <ul>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome">DashBoard </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerTable">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li class="report-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerReport">Reports </a> </li>
                    <br>
                    <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li>

                    </ul>
                </div>
            

             
           

        </section><!--Section navigation end-->


        <section class="main_area"> <!--Section main area start-->
        <div class="login_name"><p>Restaurant Manager</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/restaurant_user.png" width="30px" height="30px">  </div>
        
        <div class="topic">
            <h1>OverView</h1>
        </div>
        <div class="details-total">
        <div class="matirial01" >
                <H1>Total Reservation<H1>
                <h1 id="total reservation">15</h1>
            </div>
            

            <!-- <div class="matirial02">
                <H1>Free Tables<H1>
                <h1>9</h1>
            </div> -->
            
          
            

            <div class="matirial04">
                <H1>Food Orders<H1>
                <h1 id="total-Orders">7</h1>
            </div>
        </div>
        <br><br>

            <div class="topic-report"><p>Table4U Reports</p></div>
            <br>
            <div class="line"></div> <br>
            <div class="grid-container">
                    <button class="grid-item01" id="menu-performance-btn" type="button">Menu Performance Report</button>
                    <button class="grid-item02" id="reservation-details-report" type="button">Reservation Details Report</button>
                    <button class="grid-item03" id="customer-details-report" type="button">Customer Details Report</button>
                    <!--
                    <button class="grid-item04">Button -4</button>
                    <button class="grid-item05">Button -5</button>
                    <button class="grid-item06">Button -6</button> -->
              
            </div>
            
        
    

        </section><!--Section main area end-->
        <script src="<?php echo URLROOT?>/public/js/RMreport.js"> </script>
    </div> <!--Dashboard End-->
    
</body>
</html>