<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMtable_style.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Tables- Restaurant manager</title>
   
</head>
<body>
   
        <div class="dashboard"> <!--Dashboard start-->

       <section class="navigation" id="navigation-id"> <!--Section navigation start-->
            <div class="logo">
            <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

            <h1>Table 4U<br> Admin Panal</h1>
            </div>
                <div>
                    <ul>
                 <li> <a href="<?php echo URLROOT ?>/RestaurantManagerHome">DashBoard </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReservation"> Reservation</a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerOrder">Orders </a> </li>
                    <li class="table-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerTable">Tables </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReport">Reports </a> </li>
                    <br>
                    <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li>

                    </ul>
                </div>
            

             
           

        </section><!--Section navigation end-->


        <section class="main_area" id="main-area-id"> <!--Section main area start-->
        <div class="login_name"><p>Restaurant Manager</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/restaurant_user.png" width="30px" height="30px">  </div>
        
        <div class="topic">
            <h1>OverView</h1>
        </div>
        <div class="details-total">
        <div class="matirial01">
                <H1>Total Reservation <H1>
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
     
        <div class="topic_floor" id="floor-plan-id"><h1>Floor Plan</h1></div>


        <button class="add-tablebtn" id="add-tablebtn" onclick="addNewTable()">Add New Table</button>
        <div class="layout" id="layout">

        
            <!--  This is the start of table layout -->
           
                 <!--   tables in layout -->
                
                <?php
                
                $j=0;
               
                $rowcount = count($data);
                $rowcountD = $rowcount;
                $TotalTables = 20;
                for($j=1; $j <= $TotalTables ; $j++){
                    $loopcheck = 0;
                    $i = 0;

                    while($i < $rowcountD){
                        if($data[$i]->tableID == "TL-".$j)
                        {echo "<button class='table-layout-btn' id ='table-".$data[$i]->tableNo."' onclick = 'table_table(".$data[$i]->tableNo.")'/>".$data[$i]->tableNo."</button>"; 
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
                    
        <?php $rowcount = count($data);
                $rowcountD = $rowcount;
            $a = 0;  
        
        ?>
        </div>
        
        <div class="table_details" id="table-detail-id">
        <h2> Table Details </h2>
            <h3 id="TableDetail-header"> Header </h3>
            <p id="TableDetail-maxCovers"> max covers </p>
            <p id="TableDetail-minCovers"> min covers </p>
            <button class="edit_table" id="edit_table" onclick="openEdit()">Edit Table</button>
            <br>
            <div class="delete-update-btn" id="delete-update-btn"> 

            <button class="delete_table" id="delete-table-display" onclick="deletedisplay()">Delete Table </button>
            <button class="update-done-table" id="update-done-table" onclick="doneUpdate()">Done</button>
            </div>
            
            <br>
            <p>Upcoming reservations</p>
            <p class="reservation-details-display"
            id="reservation-details">R02 - 8.00 am</p>
            <br>
            
        </div>


        <div class="popup-delete" id="popup-delete">
            
    
                <h1>Do you Want to Delete <br>Table </h1><br>
                <button class="delete_table" id="delete_table" onclick="delete_table()" >Yes</button>
                <button class="update-done-table" id="No-btn" onclick="no_delete()">No</button>
    
    
        	</div>


            <div class="popup-success-message" id="popup-success-message">
            
            <h1 id="deleteSec">Successfully Deleted </h1><br>
            <a class="update-done-table" id="delete-ok-btn" href="<?php echo URLROOT ?>/RestaurantManagerTable" >Ok</a>


        </div>

            
        

        

        <script src="<?php echo URLROOT?>/public/js/RMtable.js"> </script>
        </section><!--Section main area end-->

        
            <div class="layout-in-input" id="layout-in-input">
     <!--  This is the displayed layout for input tables for table layout -->
    <?php
    
    $j=0;
   
    $rowcount = count($data);
    $rowcountD = $rowcount;
    $TotalTables = 20;
    for($j=1; $j <= $TotalTables ; $j++){
        $loopcheck = 0;
        $i = 0;

        while($i < $rowcountD){
            if($data[$i]->tableID == "TL-".$j)
            {echo "<a class='table-layout-btn-in-input' href=".URLROOT."/RestaurantManagerTable/tableDisplay/".$data[$i]->tableNo."/>".$data[$i]->tableNo."</a>"; 
                $loopcheck = $loopcheck +1;
                
            }
            $i = $i+1;
        }
        if($loopcheck == 0){
            echo "<div class='non-display-table-in-input'>".$j." </div>";
        }
       // echo 'TL-'.$j;

    }

     ?>
        <div class="description-in-layout-grid-main">
            <div class="text-in-layout-below"> Available Slots </div>  
            <div class="green-box"></div>

        </div>
     
         </div>    
            

    
        <!-- Input layout -->
        <!-- form -->
        <div class="Add_table" id="add-table-id">
            <button class="close-btn" id="clode-btn-id" onclick="closeme()">x</button>
        <h2>Add new Table</h2>
        <br>
       <!-- <p>Select the Shape</p> -->
  
        <label for="table_number">Enter Table Number:</label><br>
        <input type="text" id="table_number"  name="table_number"><br>
        <label for="max_covers">Enter Maximum covers:</label><br>
        <input type="text" id="max_covers" name="max_covers"><br>
        <label for="min_covers">Enter Minimum covers:</label><br>
        <input type="text" id="min_covers" name="min_covers"><br>
        <label for="area">Enter The Area of Layout:</label><br>
        <input type="text" id="area" name="area"><br><br>
        <button class="add_table_button" id="add_table_button" onclick="AddNewTableAjax()">Add New Table</button>
         


        </div>

        <div class="error-section" id="error-section">
        <p class="error01" id="error01">This is a error</p>
        <button class="error-close" id="error-close" onclick="go_back_to_table()">Try Again</button>

        </div>
    

        

        
        <script src="<?php echo URLROOT?>/public/js/RMtable.js"> </script>

    </div> <!--Dashboard End-->
        
    
</body>
</html>