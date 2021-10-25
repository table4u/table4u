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
    <div class="popup"> <!--Dashboard start-->

        <div class="popuptopic">
            <h2>Add New Employee</h2>
            
        </div>

    <div class="popupform">
    <form action="<?php echo URLROOT ?>/RestaurantManagerEmployee" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" class="inputfield"><br>

    <label for="username">UserName:</label><br>
    <input type="text" id="username" name="username" class="inputfield"><br>

    <label for="p_word">Password:</label><br>
    <input type="password" id="p_word" name="p_word" class="inputfield"><br>

    <label for="designation">Designation:</label><br>
    <select name="designation" id="designation">
    <option value="Restaurant Manager">Restaurant Manager</option>
    <option value="Cashier">Cashier</option>
    <option value="Kitchen Manager">Kitchen Manager</option>
    <option value="Waiter">Waiter</option>
  </select> <br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" class="inputfield"><br>

    <label for="nic">NIC:</label><br>
    <input type="text" id="nic" name="nic" class="inputfield"><br>

    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" class="inputfield"><br>

    <label for="dob">Date of Birth:</label><br>
    <input type="text" id="dob" name="dob" class="inputfield"><br>

    <label for="mobile_number">Mobile Number:</label><br>
    <input type="text" id="mobile_number" name="mobile_number" class="inputfield"><br>
    <br>
    <label for="emergency_contact">Emergency Contact:</label><br>
    <p>Name</p>
    <input type="text" id="emergency_contact_name" name="emergency_contact_name" class="inputfield"><br>
    <p>Mobile Number</p>
    <input type="text" id="emergency_contact_mobile" name="emergency_contact_mobile" class="inputfield"><br>
    <p>Relation</p>
    <input type="text" id="emergency_contact_relation" name="emergency_contact_relation" class="inputfield"><br>

    <button class="addEmployee" id="addEmployee" type="submit">Add </button>




    </form>
    <br>
    
    
    </div>

    

    </div> <!--Dashboard End-->
  
</body>
</html>