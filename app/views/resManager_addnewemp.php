<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMaddnewEmp.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Employees Add new - Restaurant manager</title>
   
</head>
<body>

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


        <div class="login_name"><p>Restaurant Manager</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/restaurant_user.png" width="30px" height="30px">  </div>

    <div class="popup"> <!--Dashboard start-->
    

        <div class="popuptopic">
            <h2>Add New Employee</h2>
            
        </div>

    <div class="popupform">
    <form action="<?php echo URLROOT ?>/RestaurantManagerEmployee/enterEmployeeData" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" class="inputfield"><br>
    <p><?php echo $data['name_err']?></p><br>

    <label for="username">UserName:</label><br>
    <input type="text" id="username" name="username" class="inputfield"><br>
    <p><?php echo $data['username_err']?></p><br>

    <label for="p_word">Password:</label><br>
    <input type="password" id="p_word" name="p_word" class="inputfield"><br>
    <p><?php echo $data['pw_err']?></p><br>

    <label for="designation">Designation:</label><br>
    <select name="designation" id="designation">
    <option value="Restaurant Manager">Restaurant Manager</option>
    <option value="Cashier">Cashier</option>
    <option value="Kitchen Manager">Kitchen Manager</option>
  </select> <br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" class="inputfield"><br>
    <p><?php echo $data['email_err']?></p><br>

    <label for="nic">NIC:</label><br>
    <input type="text" id="nic" name="nic" class="inputfield"><br>
    <p><?php echo $data['nic_err']?></p><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" class="inputfield"><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" class="inputfield"><br>
    <p><?php echo $data['dob_err'] ?></p><br>

    <label for="mobile_number">Mobile Number:</label><br>
    <input type="text" id="mobile_number" name="mobile_number" class="inputfield"><br>
    <p><?php echo $data['mobile_err']?></p><br>
    
   <!-- <label for="emergency_contact">Emergency Contact:</label><br>
    <p>Name</p>
    <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="inputfield"><br>
    <p>Mobile Number</p>
    <input type="text" id="emergency_contact_mobile" name="emergency_contact_mobile" class="inputfield"><br>
    <p>Relation</p>
    <input type="text" id="emergency_contact_relation" name="emergency_contact_relation" class="inputfield">  --> <br>

    <button class="addEmployee" id="addEmployee" type="submit">Add </button>




    </form>
    <br>
    
    
    </div>

    

    </div> <!--Dashboard End-->
  
</body>
</html>