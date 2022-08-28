<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMacceptmenu.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>AcceptMenu- Restaurant manager</title>
   
</head>
<body>
    <div class="dashboard"> <!--Dashboard start-->

        <section class="navigation" id="navigation-area"> <!--Section navigation start-->
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
                    <li class="menu-navigation"> <a href="<?php echo URLROOT ?>/RestaurantManagerMenu">Menu </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerCustomer">Customers </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerEmployee">Employees </a> </li>
                    <li> <a href="<?php echo URLROOT ?>/RestaurantManagerReport">Reports </a> </li>
                    <br>
                    <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li>

                    </ul>
                </div>
            

           

        </section><!--Section navigation end-->


        <section class="main_area" id="main-area"> <!--Section main area start-->
        <div class="login_name"><p>Restaurant Manager</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/restaurant_user.png" width="30px" height="30px">  </div>
        
        <div class="topic">
            <h1>OverView</h1>
        </div>
        <div class="details-total">
            <div class="matirial01" >
                <H1> Total Reservation<H1>
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
        <div class="menu-topic-main"><h1>Menu Requests</h1></div>

            <div class="search">
                <form action="">
                    
                    <input type="text" id ="search" name= "search" placeholder="Search Here" ><br>

                </form>
            </div>
            <br>
            <div class="line"></div>

            <div class="grid-container-menuAccept">
                <?php 
                
                $lenght = count($data);
                //echo $lenght;
                //for loop for print menu item
                for($i=0;$i<$lenght;$i++){
                    echo " <button class='grid-item' onclick='menumore2(".$data[$i]->menuItemID.")'>".$data[$i]->name."</button>";

                }
                
                ?>
                 

         </div>
         </section><!--Section main area end-->
         <div class="popup" id="pop-up"> <!--popup start-->

        <div class="popuptopic" id="popup-topic">
        <button class="close-btn" id="close-btn-id" onclick="closePopup()">x</button>
            <h2 id="Accept-topic">Rice And Curry</h2>
            <p id = "Accept-meal-type">Breakfast</p>
        </div>

    <div class="popupcontent" id="popUp-content">
    <div class="field">  <p class="subtopic">Name</p>
    <p class="answer" id="Accept-name">Rice and Curry</p>  </div>


    <div class="field"> <p class="subtopic">Veg/Non Veg</p>
    <p class="answer" id="Accept-veg">Non Veg</p> </div>

    <div class="field">  <p class="subtopic">Description</p>
    <p class="answer" id="Accept-description">rice is good</p>  </div>

    <div class="field">  <p class="subtopic">Ingredients</p>
    <p class="answer" id="Accept-ingredients">rice,dhal, papadam, fish</p>  </div>

    <div class="field">  <p class="subtopic">Cost per Serving Small</p>
    <p class="answer" id="Accept-cost-small">250 /=</p> 
    <p>Enter the Price for small</p>
     <input type="text" id="small-price" name="small-price" placeholder="Enter Price for Small Item">   
    </div>


    <div class="field"> <p class="subtopic">Cost per Serving Medium</p>
    <p class="answer" id="Accept-cost-medium">400 /=</p> 
    <p>Enter the Price for Medium</p>
    <input type="text" id="medium-price" name="medium-price" placeholder="Enter Price for Medium Item">  </div>

    <div class="field"> <p class="subtopic">Cost per Serving Large</p>
    <p class="answer" id="Accept-cost-large">600 /=</p> 
    <p>Enter the Price for Large</p>
    <input type="text" id="large-price" name="large-price" placeholder="Enter Price for Large Item">  </div>

    <br>
    <button class="updateEmployee" id="updateEmployee" onclick="Accept_for_button()">Accept Menu</button>
    <button class="deleteEmployee" id="deleteEmployee" onclick="Reject_for_button()">Reject Menu</button>

    </form>
   

    </div>

    </div> <!--popup End-->

    <div class="popUp-to-update-delete" id="popUp-to-update-delete">
        <p class="Msg" id="Msg">This is the Message</p>
        <br>
        <button class="Delete-update" id="delete-update-btn">BTN</button>
        

    </div>

    

                        
           

 
        
        <script src = "<?php echo URLROOT ?>/public/js/RMmenuAccept.js"> </script>
    </div> <!--Dashboard End-->
    
</body>
</html>