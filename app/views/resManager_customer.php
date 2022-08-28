<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMcustomer.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Customers- Restaurant manager</title>
   
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
                    <li class="customer-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
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
        <br><br><br>

        <div class="topic-customer"><h1>Customers</h1></div>

            <div class="search">
                <form action="<?php echo URLROOT ?>/RestaurantManagerCustomer/searchCustomer"  method="GET">
                    
                    <input type="text" id ="search" name= "search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Search Here"><br>

                </form>
            </div>
            <br>
            <div class="grid-container-customer">
                <button class="grid-item" id="regCustBtn-id" onclick="registerCustomerDetails()">Registered</button>
                <button class="grid-item" id="unregCustBtn-id" onclick="unregisterCustomerDetails()">UnRegistered</button>
            </div>
    
            <table class="table-customers" id="register-customer-table">
                <thead>
                <tr>
                
                    <th>Customer  Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>DoB</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    
                    
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i < $rowcount ){
                        if($data[$i]->cust_type =="SR"){

                        echo "<tr>     <td>".$data[$i]->name."</td>  <td>".$data[$i]->NIC." </td> <td> ".$data[$i]->address." </td> <td> ".$data[$i]->dob."</td> <td> ".$data[$i]->mobile."</td> <td> ".$data[$i]->email."</td>  </tr>";
                        }
                        $i = $i+1;
                    }
                    
                    ?>
                 
                </tbody>
            </table >

            <br>

        
                <table class="table-customers" id="unregister-customer-table">
                    <thead>
                <tr>
                   
                    <th>Customer  Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    
                </tr>
                </thead>

                <tbody>
                <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i < $rowcount ){
                        if($data[$i]->cust_type =="CR"){

                        echo "<tr>     <td>".$data[$i]->name."</td>  <td>".$data[$i]->NIC." </td> <td> ".$data[$i]->address." </td> <td> ".$data[$i]->mobile."</td>   </tr>";
                        }
                        $i = $i+1;
                    }
                    
                    ?>
                </tbody>
            </table>

            


           
            <script src=" <?php echo URLROOT?>/public/js/RMcustomer.js"></script>
        </section><!--Section main area end-->

    </div> <!--Dashboard End-->
    
</body>
</html>