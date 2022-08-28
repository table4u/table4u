<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMemployee_style.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Employees- Restaurant manager</title>
   
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
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome/dashboard">DashBoard </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerTable">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li class="employee-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReport"">Reports </a> </li>
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
                <H1 id="total reservation">15<H1>

            </div>
        

            <!-- <div class="matirial02">
                <H1>Free Tables<H1>
                <H1>9<H1>
            </div> -->
            
 
            

            <div class="matirial04">
                <H1>Food Orders<H1>
                <H1 id="total-Orders">7<H1>
            </div>
        </div>
        <br><br><br>
        <div class="topic-employee"><h1>Employees</h1></div>

            <div class="search">
                <form action="<?php echo URLROOT ?>/RestaurantManagerEmployee/searchEmployee"  method="GET">
                
                    <input type="text" id ="search" name= "search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Search Here" ><br>

                </form>
            </div>

            <button type="submit" class="Add_new_employee_btn" id="Add_new_employee_btn">Add New Employee </button>
            <br>
            
           
            
            <br>
            <table class="table-employee">
                <thead>
                <tr>
                   
                    <th>Employee Name</th>
                    <th>Employee Type</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>      </th>
                
                    
                </tr>
                </thead>
                <tbody>
                <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i< $rowcount){
                        echo "<tr>
                        <td>".$data[$i]->name."</td>
                        <td>".$data[$i]->empType."</td>
                        <td>".$data[$i]->mobile."</td>
                        <td>".$data[$i]->email."</td>
                        <td> <a href='".URLROOT."/RestaurantManagerEmployee/seeMoreDetails/".$data[$i]->empID."' class='more-in-table'>More</a></td>
                        </tr>";
                        $i = $i + 1;
                    }
                                   
                ?>
            </tbody>
        
            </table>
           
        
            <script src = "<?php echo URLROOT ?>/public/js/RMemployee.js"> </script>
        </section><!--Section main area end-->

    </div> <!--Dashboard End-->
    
</body>
</html>