<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table4U</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierReservationDetails.css">
    <title>Table4U</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h7>Table 4U<br> Cashier Panel</h7>
         </div>
                <div>
                    <ul>
                    <!-- <li class="reservation-navigation"> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
                    <li> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierPayment/showCompletedpayments">Payments </a> </li>
                
                    <br><br>
                    <!-- <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li> -->

                    </ul>
                </div>
                <a class="logout" a href="<?php echo URLROOT ?>/Login/logout">Log Out</a>
                
        </section><!--Section navigation end-->

        
        <section class="main_area"> <!--Section main area start-->
        <div class="login_name"><p>Cashier</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/profile.png" width="30px" height="30px">  </div>

        <div class="topic-customer"><h7>Orders</h7></div>

        <form class="search1" action="<?php echo URLROOT ?>/CashierGuests/searchcustomersReg"  method="GET">
          <input type="text" placeholder="Search.." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
        </form>
            <br>
            <div class="btns">
                <div class="grid-container-customer">
                    <a class="grid-item" href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations">Ongoing</a>
                    <a class="grid-item"  href="<?php echo URLROOT ?>/CashierReserveTable/showCompletedReservations">Finished</a>
                    <a class="grid-item"  id="clickedBtn"href="<?php echo URLROOT ?>/CashierReserveTable/showCancelledReservations">Cancelled</a>
                </div>
            </div>
    
            <table class="table-orders">
                    <thead>
                    <tr>
                    
                        <th>Customer  Name</th>
                        <th>Order Id</th>
                        <th>Price</th>
                        <th>Order Details</th>
                        
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td colspan="4">
                        <div class="scrollit">
                            <table>
                                <?php foreach($data as $d ): ?>
                                <tr class="detailrow">
                                    <td><?php echo $d->name; ?></td>
                                    <td><?php echo $d->NIC; ?></td>
                                    <td><?php echo $d->address; ?></td>
                                    <td><?php echo $d->mobile; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        </tr>    
                    </tbody>
                </table>

        
        <script src="<?php echo URLROOT?>/public/js/cashierReserveTable.js"> </script>

    </div> <!--Dashboard End-->
        
    
</body>
</html>