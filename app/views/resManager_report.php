<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreport.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Employees- Restaurant manager</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
                <div>
                    <ul>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome">DashBoard </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerTable/tableDisplay/1">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li class="report-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerReport"">Reports </a> </li>

                    </ul>
                </div>
            

            </div>
           

        </section><!--Section navigation end-->


        <section class="main_area"> <!--Section main area start-->
        
        <div class="topic">
            <h1>OverView</h1>
        </div>
        <div>
            <div class="matirial01" >
                <H1>Reservation<H1>
            </div>
            <br>

            <div class="matirial02">
                <H1>Tables<H1>
            </div>
            <br>
            <div class="matirial03">
                <H1>Loyalty customers<H1>
            </div>
            <br>

            <div class="matirial04">
                <H1>Employees<H1>
            </div>
        </div>

            <div class="topic-report"><p>Table4U Reports</p></div>
            <br>
            <div class="line"></div> <br>
            <div class="grid-container">
                    <button onclick="alert('Click button')" class="grid-item01">Restaurant Sales Report</button>
                    <button class="grid-item02">Menu Performamce Report</button>
                    <button class="grid-item03">CRM Report</button>
                    <button class="grid-item04">Customer List of the Day</button>
                    <button class="grid-item05">Button -5</button>
                    <button class="grid-item06">Button -6</button>
              
            </div>
            
        
    

        </section><!--Section main area end-->
        <script src = "employee_js.js"> </script>
    </div> <!--Dashboard End-->
    
</body>
</html>