<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMseemoreEmp.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Employees popup more - Restaurant manager</title>
   
</head>
<body>
    <div class="popup" id="pop-up-emp"> <!--Dashboard start-->

        <div class="popuptopic">
            <h2><?php echo $data->name ?></h2>
            <p><?php echo $data->username ?></p>
        </div>

    <div class="popupcontent">
    <div class="field">  <p class="subtopic">Designation</p>
    <p class="answer"><?php echo $data->empType ?></p>
      </div>

    <div class="field"> <p class="subtopic">Email</p>
    <p class="answer"><?php echo $data->email ?></p> </div>

    <div class="field"> <p class="subtopic">NIC</p>
    <p class="answer"><?php echo $data->NIC ?></p> </div>

    <div class="field">  <p class="subtopic">Address</p>
    <p class="answer"><?php echo $data->address ?></p>  </div>

    <div class="field">  <p class="subtopic">DoB</p>
    <p class="answer"><?php echo $data->dob ?></p>  </div>

    <div class="field">  <p class="subtopic">Mobile Number</p>
    <p class="answer"><?php echo $data->mobile ?></p>  </div>



   <!-- <div class="field"> <p class="subtopic">Emergency Contact</p>
    <p class="answer">mother- 0772990203</p>
    <p class="answer">Father - 0772990204</p>
    <p class="answer">Wife - 0774569824</p>  </div> -->

    
   
    
    
    
    
   

    <br>
    <button class="updateEmployee" id="updateEmployeeEmp" onclick="UpdateEmp()">Update</button>
    <button class="deleteEmployee" id="deleteEmployeeEmp" onclick="DeleteEmp('<?php echo $data->NIC ?>')">Delete</button>
    </div>

    <div class="update-pop-up" id="update-pop-up">


    <form action="<?php echo URLROOT?>/RestaurantManagerEmployee/updateEmployeeData" method="POST">

    <input type="text" id="empID" name="empID" value="<?php echo $data->empID ?>"><br>
  <label class="labal" for="name">Name:</label><br>
  <input class="input" type="text" id="name" name="name" value="<?php echo $data->name ?>"><br>

  <label class="labal" for="username">Username:</label><br>
  <input class="input" type="text" id="username" name="username" value="<?php echo $data->username ?>"><br>

  <label class="labal" for="designation">Designation:</label><br>
    <select name="designation" id="designation">
    <option value="Restaurant Manager">Restaurant Manager</option>
    <option value="Cashier">Cashier</option>
    <option value="Kitchen Manager">Kitchen Manager</option>
  </select> <br>

  <label class="labal" for="email">Email:</label><br>
  <input class="input" type="text" id="email" name="email" value="<?php echo $data->email ?>"><br>

  <label class="labal" for="nic">NIC:</label><br>
  <input class="input" type="text" id="nic" name="nic" value="<?php echo $data->NIC ?>"><br>

  <label  class="labal"for="address">Address:</label><br>
  <input class="input" type="text" id="address" name="address" value="<?php echo $data->address ?>"><br>

  <label class="labal" for="DoB">Date Of Birth:</label><br>
  <input class="input" type="date" id="DoB" name="DoB" value="<?php echo $data->dob ?>"><br>

  <label class="labal" for="mobile">Mobile:</label><br>
  <input class="input" type="text" id="mobile" name="mobile" value="<?php echo $data->mobile ?>"><br><br>

  <button class="update-emp-btn">Update </button>
</form> 

    </div>

    

    </div> <!--Dashboard End-->
    <script src="<?php echo URLROOT?>/public/js/RMseeMoreEmp.js"> </script>
  
</body>
</html>