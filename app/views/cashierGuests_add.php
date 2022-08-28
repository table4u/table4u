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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierGuests.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <title>Table4U</title>
   
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Cashier Panel</h1>
         </div>
                <div>
                    <ul>
                    <!-- <li> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
                    <li> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
                    <li class="customer-navigation"> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
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

        <div class="topic-customer"><h1>Customers</h1></div>

            <br>
            <div class="btns_addcust">
                <div class="grid-container-customer">
                    <a class="grid-item" id="clickedBtn" href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Add Customer</a>
                    <a class="grid-item"  href="<?php echo URLROOT ?>/CashierGuests/showRegisterCustomers">Registered</a>
                    <a class="grid-item" href="<?php echo URLROOT ?>/CashierGuests/showUnregisterCustomers">UnRegistered</a>
                </div>
            </div>

                    
            <div class="pageBackground">
            <!-- Start Section1 -->
            <div class="addCustomer" id="addcust">
                <!-- <div class="title">Add Customer</div> -->
                <div class="heading">
                    Add Customer
                    <hr>
                </div>

                <?php if (isset($_SESSION['error'])) : ?>
                <div style="color: #9b0606; margin-top:-2%;margin-left:7%;margin-right:10%;padding: 2%; width:80%; font-weight:8%; font-size:80%;text-align:center;  background-color: #f7858f; ">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

            

            

                <form class="addForm" method="POST" action="<?php echo URLROOT ?>/CashierGuests/addCustomer">
                <div class="row">
                    <div class="labelname">
                    <label for="custName">Customer name</label>
                    </div>
                    <div class="inputrow">
                    <input type="text" id="custName" name="custName" value="<?php echo $data['custName'];?>" required></br></br>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="labelname">
                    <label for="telNo">Contact No</label>
                    </div>
                    <div class="inputrow">
                    <input type="tel" id="telNo" name="telNo" value="<?php echo $data['telNo'];?>" required></br></br>
                    </div>
                </div>

                <div class="row">
                    <div class="labelname">
                    <label for="NIC">NIC No</label>
                    </div>
                    <div class="inputrow">
                    <input type="text" id="NIC" name="NIC" value="<?php echo $data['NIC'];?>" ></br></br>
                    </div>
                </div>

                <div class="row">
                    <div class="labelname">
                    <label for="custAddress">Address</label>
                    </div>
                    <div class="inputrow">
                    <input type="text" id="custAddress" name="custAddress" value="<?php echo $data['custAddress'];?>" required></br></br>
                    </div>
                </div>
                    
                <div class="Submit">
                    <input type="submit" value="OK">
                </div>
                <div class="Cancel">
                    <input type="reset" value="Cancel">
                </div>
                
                </form> 
                </div>
            </div>  
                    
           
            <script src=" <?php echo URLROOT?>/public/js/cashierGuests.js"></script>
        </section><!--Section main area end-->

    </div> <!--Dashboard End-->
    
</body>
</html>