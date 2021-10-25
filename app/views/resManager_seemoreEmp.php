<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMseemoreEmp.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Employees popup more - Restaurant manager</title>
   
</head>
<body>
    <div class="popup"> <!--Dashboard start-->

        <div class="popuptopic">
            <h2><?php echo $data->name ?></h2>
            <p>username</p>
        </div>

    <div class="popupcontent">
    <div class="field">  <p class="subtopic">Designation</p>
    <p class="answer"><?php echo $data->empType ?></p>  </div>

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
    <button class="updateEmployee" id="updateEmployee">Update</button>
    <button class="deleteEmployee" id="deleteEmployee">Delete</button>
    </div>

    

    </div> <!--Dashboard End-->
  
</body>
</html>