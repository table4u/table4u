<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreport_menuPerformance.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Menu Performance Report- Restaurant manager</title>
   
</head>
<body>
    <div class="out-line">
    <div class="dashboard"> <!--Dashboard start-->
    <div>
    <img src="<?php echo URLROOT ?>/public/images/logoN.png"  class="logo-image">  
    </div>

      <div class="topic-report"><p>Table4U<br> Menu Performance Report</p>
    
    </div>
    <form action="<?php echo URLROOT ?>/RestaurantManagerReport/menuPerformance02" method="POST">
    <label for="Month">Choose the Month:</label>
    <select id="Month" name="month">
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select><br><br>
  <input type="submit" >
</form>

        
            <div class="line"></div> <br>

            <div>Menu content</div>
            <!-- <div>
            <canvas id="myChart"  class="bar-chart01"></canvas>

            </div> -->
           
            <div>
            <br>
                <h1>Menu Details</h1>
                <table>
               
                    <tr>
                        <th>Menu Item Name</td>
                        <th>portion Size</td>
                        <th>No of Servings</td>
                        <th>Price per Small</td>
                        <th>Price per medium</td>
                        <th>Price Per Large</td>
                        <th>Total income of the item</td>
                       
                  </tr>
                  <?php 
                  $sum = 0;
                  foreach($data as $d): ?>
                <tr>
                        <td> <?php echo $d->name ?></td>
                        <td><?php echo $d->portionSize ?></td>
                        <td><?php echo $d->sumofServings ?></td>
                        <td><?php echo $d->priceSmall ?></td>
                        <td><?php echo $d->priceMedium ?></td>
                        <td><?php echo $d->priceLarge ?></td>
                        <td><?php 
                         if($d->portionSize =='small'){
                            echo (($d->sumofServings)*($d->priceSmall));
                            $sum = $sum + (($d->sumofServings)*($d->priceSmall));
                        }else if($d->portionSize =='medium')  {
                            echo (($d->sumofServings)*($d->priceMedium));
                            $sum = $sum + (($d->sumofServings)*($d->priceMedium));
                        }else if($d->portionSize =='large'){
                            echo (($d->sumofServings)*($d->priceLarge));
                            $sum = $sum + (($d->sumofServings)*($d->priceLarge));
                        }?></td>
                        


                    </tr>
                    <?php endforeach; 
                        
                    ?>
            
        

                </table>
<br>
                <H1>The Total Income Of the Month </H1>
                <h1 id="total-income"><?php echo($sum)."/="; ?></h1>

                <?php //print_r($data); 

                
                ?>
            </div>

            <script src="<?php echo URLROOT?>/public/js/RMmenuPerformancereport.js"> </script>

    </div> <!--Dashboard End-->
    </div>
    
</body>
</html>