<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreservation.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Reservations- Restaurant manager</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
                </div>
                <div>
                    <ul>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome">DashBoard </a> </li>
                    <li class="reservation-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerTable">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
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
        <br><br>

        <div class="topic-reservation"><h1>Reservations</h1></div>

            <div class="search">
                <form action="<?php echo URLROOT ?>/RestaurantManagerReservation/searchReservation" method="GET">
                    <input type="text" id ="search" name= "search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>"  placeholder="Search Here" ><br>

                </form>
            </div>
            <br>
            
           
            <div class="grid-container">
                
                 <button type="button" class="all-btn" id="upcoming-btn" onclick="upcomingreservationDetails()">Pending</button>
                   <button type="button" class="all-btn" id="completed-btn" onclick="completedreservationDetails()">Completed</button>
                <button type="button" class="all-btn" id="cancelled-btn" onclick="cancelledreservationDetails()">Cancelled</button>
                <button type="button" class="all-btn" id="all-btnID" onclick="allreservationDetails()">All</button>
        
            </div>
        
            <table class="table_res" id="all-details-table">
           
                <thead >
                    <tr>
                  
                    <th>Customer  Name</th>
                    <th>Table Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>  
                    <th>Order Details</th>  

                    </tr>
                </thead>

                <tbody>
        
                <?php 
                    $rowcount = count($data); 
                    $i = 0;
                    while($i< $rowcount){
                        echo "<tr>
                        <td>".$data[$i]->name."</td>
                        <td>".$data[$i]->tableNo."</td>
                        <td>".$data[$i]->_date."</td>
                        <td>".date("g:i A ", strtotime($data[$i]->reservationTime))
                        ."</td>
                         <td>".$data[$i]->status."</td>
                        <td> <button class = 'see-more-reservation' onclick = 'getOrderDetails(".$data[$i]->reservationID.")'> see more <button> </td>
                        </tr>";
                        $i = $i + 1;
                    }
                                   
                ?>
                </tbody>
            </table>

            <table class="table_res" id="upcoming-table">
                <thead >
                    <tr>
                  
                    <th>Customer  Name</th>
                    <th>Table Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Order Details</th>  
                    </tr>
                </thead>

                <tbody>
        
                <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i< $rowcount){
                        if($data[$i]->status == 'Pending'){
                            echo "<tr>
                        <td>".$data[$i]->name."</td>
                        <td>".$data[$i]->tableNo."</td>
                        <td>".$data[$i]->_date."</td>
                        <td>".date("g:i A ", strtotime($data[$i]->reservationTime))."</td>
                        <td> <button class = 'see-more-reservation' onclick = 'getOrderDetails(".$data[$i]->reservationID.")'> see more <button> </td>
                        </tr>";
                        }
                        
                        $i = $i + 1;
                    }
                                   
                ?>
                </tbody>
            </table>
           
            <table class="table_res" id="completed-table">
                <thead >
                    <tr>
                  
                    <th>Customer  Name</th>
                    <th>Table Number</th>
                    <th>Date</th>
                    <th>Time</th> 
                    <th>Order Details</th>  
                    </tr>
                </thead>

                <tbody>
        
                <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i< $rowcount){
                        if($data[$i]->status == 'Done'){
                            echo "<tr>
                        <td>".$data[$i]->name."</td>
                        <td>".$data[$i]->tableNo."</td>
                        <td>".$data[$i]->_date."</td>
                        <td>".date("g:i A ", strtotime($data[$i]->reservationTime))."</td>
                        <td> <button class = 'see-more-reservation' onclick = 'getOrderDetails(".$data[$i]->reservationID.")'> see more <button> </td>
                        </tr>";
                        }
                        
                        $i = $i + 1;
                    }
                                   
                ?>
                </tbody>
            </table>

            <table class="table_res" id="cancel-table">
                <thead >
                    <tr>
                  
                    <th>Customer  Name</th>
                    <th>Table Number</th>
                    <th>Date</th>
                    <th>Time</th> 
                    <th>Order Details</th>  
                    </tr>
                </thead>

                <tbody>
        
                <?php 
                    $rowcount = count($data);
                    $i = 0;
                    while($i< $rowcount){
                        if($data[$i]->status == 'Cancel'){
                            echo "<tr>
                        <td>".$data[$i]->name."</td>
                        <td>".$data[$i]->tableNo."</td>
                        <td>".$data[$i]->_date."</td>
                        <td>".date("g:i A ", strtotime($data[$i]->reservationTime))."</td>
                        <td> <button class = 'see-more-reservation' onclick = 'getOrderDetails(".$data[$i]->reservationID.")'> see more <button> </td> 
                        </tr>";
                        }
                        
                        $i = $i + 1;
                    }
                                   
                ?>
            
                </tbody>

                
            </table>
            <div class='popup-seemore' id="pop-up-see-more-id">

                        <div id='orderID'> This is the order ID </div>
                        <div id='order-status'> This is order status </div>
                        <div id='order-note'> This is order note </div>
                        <br>
                        <br>

                        <button class="cancel-btn in see more" id="cancel-btn-id-in-see-more " onclick="cancel_close_in_see_more()">Cancal</button>
            
            
            
                            </div>

     


          
            <script src = "<?php echo URLROOT ?>/public/js/RMreservation.js"> </script>
            
        

        </section><!--Section main area end-->
        



       
       

    </div> <!--Dashboard End-->
    
</body>
</html>