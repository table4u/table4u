<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreservation.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Reservations- Restaurant manager</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
                <div>
                    <ul>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome">DashBoard </a> </li>
                    <li class="reservation-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerTable/tableDisplay/1">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReport"">Reports </a> </li>

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

        <div class="topic-reservation"><h1>Reservations</h1></div>

            <div class="search">
                <form action="">
                    <label for="search">Search Here:</label>
                    <input type="text" id ="search" name= "search" ><br>

                </form>
            </div>
            <br>
            <div class="line"></div>
            
        
            <table class="table_res">
                <thead >
                    <tr>
                  
                    <th>Customer  Name</th>
                    <th>Table Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>  
                    </tr>
                </thead>

                <tbody>
                <tr>
                  
                    <td>Liyanage Suwasana Dammithu</td>
                    <td>07</td>
                    <td>2019/09/23</td>
                    <td>10.00 am</td>
                    <td >Upcoming</td>
                </tr>

                <tr>
                    
                    <td>Liyanage Uthsuka Nayanamadhu</td>
                    <td>05</td>
                    <td>2019/09/23</td>
                    <td>01.00 pm</td>
                    <td>Upcoming</td>
                </tr>
                </tbody>
            </table>
           
        

        </section><!--Section main area end-->

    </div> <!--Dashboard End-->
    
</body>
</html>