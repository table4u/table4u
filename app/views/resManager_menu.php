<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMmenu.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Menu- Restaurant manager</title>
   
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
                    <li class="menu-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
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
        <div class="menu-topic-main"><h1>Menu</h1></div>

            <div class="search">
                <form action="">
                    <label for="search">Search Here:</label>
                    <input type="text" id ="search" name= "search" ><br>

                </form>
            </div>
            <br>
            <div class="line"></div>
             
            <table class="table-menu">
                <thead>
                <tr>
                
                    <th>Food  Name</th>
                    <th>Price per Servings S</th>
                    <th>Price per Servings M</th>
                    <th>Price per Servings L</th>
                    <th>Ingredients</th>
                    <th>Show</th>
                    <th>      </th> 
                </tr>
             </thead>
             <tbody>
                <tr>
                   
                    <td>Rice and Curry</td>
                    <td>250 /=</td>
                    <td>400 /=</td>
                    <td>600 /=</td>
                    <td>Rice ,dhal,<br> fish,<br> papadam,  </td>
                    <td> <input type="checkbox" id="show" name="show"></td>
                    <td style="color: red;"> <button type="button" class="more_btn" id="more_btn" >More</button> </td>
                    
                </tr>

                <tr>
                   
                   <td>Koththu</td>
                   <td>250 /=</td>
                   <td>400 /=</td>
                   <td>600 /=</td>
                   <td>Chicken ,cheese,<br> fish,<br> Vegitable salad,  </td>
                   <td> <input type="checkbox" id="show" name="show"></td>
                   <td style="color: red;"> <button type="button" class="more_btn" id="more_btn" >More</button> </td>
                   
               </tr>
                </tbody>
            </table>

    
           
        </section><!--Section main area end-->
        <script src = "<?php echo URLROOT ?>/public/js/RMmenu.js"> </script>
    </div> <!--Dashboard End-->
    
</body>
</html>