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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierReserveTables.css">
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
                    <li class="table-navigation"> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
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
       
        <!-- <?php 
        
        echo $_SESSION['error_01'];

        ?>
        </div> -->

       
        <!-- <div class="topic_floor" id="floor-plan-id"><h1>Floor Plan</h1></div> -->
    

        <?php

        if(isset($_SESSION['table_err'])) {
            echo $_SESSION['table_err'];

        }
        ?>
        
        <div class="layout" id="layout">
            <!-- <form method="GET"> -->
            <!--  This is the start of table layout -->
                <?php
                
                $j=0;
               
                $rowcount = count($data);
                
                $rowcountD = $rowcount;
                $TotalTables = 25;
                for($j=1; $j <= $TotalTables ; $j++){
                    $loopcheck = 0;
                    $i = 0;

                    while($i < $rowcountD){
                        if($data[$i]->tableID == "TL-".$j & $data[$i]->availability == 0 )
                        {   echo "<button type='submit' class='table-layout-btn active_btn' name='table' value='table-".$data[$i]->tableNo."' id ='table-".$data[$i]->tableNo."' onclick = 'table_table(".$data[$i]->tableNo.")'/>".$data[$i]->tableNo."</button>"; 
                            $loopcheck = $loopcheck +1;  
                        }
                        if($data[$i]->tableID == "TL-".$j & $data[$i]->availability == 1)
                        {   echo "<button type='submit' class='table-layout-btn2 active_btn' name='table' value='table-".$data[$i]->tableNo."' id ='table-".$data[$i]->tableNo."'  onclick = 'table_table(".$data[$i]->tableNo.")'/>".$data[$i]->tableNo."</button>"; 
                            $loopcheck = $loopcheck +1;  
                        }
                        $i = $i+1;
                    }
                    if($loopcheck == 0){
                        echo "<div class='non-display-table'>Available  </div>";
                    }
                   // echo 'TL-'.$j;

                }

                 ?>
        <!-- </form>            -->
        <?php $rowcount = count($data);
                $rowcountD = $rowcount;
            $a = 0;  
        
        ?>
        </div>
        
        <div class="table_details" id="table-detail-id">
        <!-- <h2> Table Details </h2> -->
        <br>
            <h3 id="TableDetail-header"> Table 5 </h3>
            <br>
            <p id="TableDetail-status">status - available</p><br>
            <p id="TableDetail-maxCovers"> max covers : 5 </p>
            <p id="TableDetail-minCovers"> min covers : 1 </p>
            <!-- <button class="edit_table" id="edit_table" onclick="openEdit()">Edit Table</button> -->
            <br>
            <div class="delete-update-btn" id="delete-update-btn"> 

            <button class="update-done-table" id="delete-table-display" onclick="reservedisplay()">Reserve </button><br><br>
            <!-- <button class="available-btn" href="<?php echo URLROOT ?>/CashierReserveTable/unavailableTable()">Unvailable </button> -->
            <button class="unavailable-btn" onclick="unavailabledisplay()">Unvailable</button>
            <button class="available-btn"  onclick="availabledisplay()">Available </button>
            <!-- <button class="update-done-table" id="update-done-table" onclick="doneUpdate()">Done</button> -->
            </div>
            <br>
            <p>Upcoming reservations</p>
            <p>R02 - 8.00 am</p>
            <p>R05 - 1.00 pm</p>
            <br> <br>
            
        </div>

        <div class="chooseDate" id="popup-reserve">

            <?php if (isset($_SESSION['error'])) : ?>
                <div style="color: #FF0000; margin-top:20%;margin-left:10%;margin-right:10%;padding: 2%; width:20%; font-weight:8%; font-size:80%;text-align:center;">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

                    <form method="POST" id="reservationForm" action="<?php echo URLROOT ?>/CashierReserveTable/makeReservation">
                      

                    </form> 
        </div>

        

        <div class="reservedMessage" id="popup-reserved">
            <div class="quest1">All ready reserved !!!</div>
        </div>

        <!-- <div class="chooseDate" id="popup-available">

            <?php if (isset($_SESSION['error'])) : ?>
                <div style="color: #FF0000; margin-top:20%;margin-left:10%;margin-right:10%;padding: 2%; width:20%; font-weight:8%; font-size:80%;text-align:center;">
                    <?php echo $_SESSION['error'];
                    unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

        </div> -->

        <div class="chooseDate" id="popup-unavailable">
            <form method="POST" id="unavailableForm" action="<?php echo URLROOT ?>/CashierReserveTable/makeReservation">
                      

            </form> 
        
        </div>

        <div class="chooseDate" id="popup-available">
            <form method="POST" id="availableForm" action="<?php echo URLROOT ?>/CashierReserveTable/makeReservation">
                      

            </form> 
        
        </div>
            
        </section><!--Section main area end-->

        
            <div class="layout-in-input" id="layout-in-input">
     <!--  This is the displayed layout for input tables for table layout -->

        <script src="<?php echo URLROOT?>/public/js/cashierReserveTable.js"> </script>

    </div> <!--Dashboard End-->
        
    
</body>
</html>
