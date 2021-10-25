<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT ?>/public/css/RMmenumore.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
    <title>Menu popup more - Restaurant manager</title>
   
</head>
<body>
    <div class="popup"> <!--Dashboard start-->

        <div class="popuptopic">
            <h2>Rice And Curry</h2>
            <p>Breakfast</p>
        </div>

    <div class="popupcontent">
    <div class="field">  <p class="subtopic">Name</p>
    <p class="answer">Rice and Curry</p>  </div>

    <div class="field"> <p class="subtopic">Display</p>
    <input type="checkbox" id="display" name="display"> </div>

    <div class="field"> <p class="subtopic">Veg/Non Veg</p>
    <p class="answer">Non Veg</p> </div>

    <div class="field">  <p class="subtopic">Description</p>
    <p class="answer">rice is good</p>  </div>

    <div class="field">  <p class="subtopic">Ingredients</p>
    <p class="answer">rice,dhal, papadam, fish</p>  </div>

    <div class="field">  <p class="subtopic">Price per Serving Small</p>
    <p class="answer">250 /=</p>  </div>

    <div class="field"> <p class="subtopic">Price per Serving Medium</p>
    <p class="answer">400 /=</p>  </div>

    <div class="field"> <p class="subtopic">Price per Serving Large</p>
    <p class="answer">600 /=</p>  </div>

    
   
    
    
    
    
   

    <br>
    <button class="updateEmployee" id="updateEmployee" type="submit">Update</button>
    <button class="deleteEmployee" id="deleteEmployee" type="submit">Delete</button>
    </div>

    

    </div> <!--Dashboard End-->
  
</body>
</html>