<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMtable_style.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Tables- Restaurant manager</title>
   
</head>
<body>
   
        <div class="dashboard"> <!--Dashboard start-->

       <section class="navigation"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
                <div>
                    <ul>
                 <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome/dashboard">DashBoard </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li class="table-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerTable/tableDisplay/1">Tables </a> </li>
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
        <div class="container01">
            <div>Reservation</div>
            <div>Tables</div>
            <div>Loyalty customers</div>
            <div>Employees</div>
        </div>
        <div class="container02">
            <div>A</div>
            <div>B</div>
            <div>C</div>
            <div>D</div>
        </div>

       
        <div class="topic_floor"><h3>Floor Plan</h3></div>
        <div class="layout" id="layout">

        <?php $rowcount = count($data);
                $rowcountD = $rowcount;
            $a = 0;

            while($rowcount>0){
                echo " <a onclick='changeColor()' class='table_' href='".URLROOT."/RestaurantManagerTable/tableDisplay/".$data[$a]->tableNo."/'>".$data[$a]->tableNo." </a>";
                $a = $a +1;
                $rowcount = $rowcount - 1;

                if(!is_object($data[$a])){
                    break;
                }
            }
        
        
        
        ?>

        </div>

        <div class="table_details">
        <h2> Table Details </h2>
            <h3><?php echo "Table ".$data[$data[$rowcountD-1]-1]->tableNo?></h3>
            <p>status - unavailable</p>
            <p><?php echo "Maximum Covers - ".$data[$data[$rowcountD-1]-1]->maxCover?></p>
            <p><?php echo "Minimum Covers - ".$data[$data[$rowcountD-1]-1]->minCover?></p>
            <button class="edit_table" id="edit_table">Edit Table</button>
            <br><br>
            <p>Upcoming reservations</p>
            <p>R02 - 8.00 am</p>
            <p>R05 - 1.00 pm</p>
        </div>

        <div class="Add_table">
        <h2>Add new Table</h2>
        <br>
       <!-- <p>Select the Shape</p> -->
        <br>
    <form action="<?php echo URLROOT?>/RestaurantManagerTable/addNewTable" method="POST">
        <label for="table_number">Enter Table Number:</label><br>
        <input type="text" id="table_number" name="table_number"><br>
        <label for="max_covers">Enter Maximum covers:</label><br>
        <input type="text" id="max_covers" name="max_covers"><br>
        <label for="min_covers">Enter Minimum covers:</label><br>
        <input type="text" id="min_covers" name="min_covers"><br><br>
        <button class="add_table_button" id="add_table_button" type="submit">Add New Table</button>
        </form>
        
         





        </div>

        <script src="<?php echo URLROOT?>/public/js/RMtable.js"> </script>
        </section><!--Section main area end-->

    </div> <!--Dashboard End-->
        
    
</body>
</html>