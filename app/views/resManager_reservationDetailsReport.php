<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel='stylesheet' type='text/css' href='<?php echo URLROOT?>/public/css/RMreservationDetailsReport.css' >   
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=poppins">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Reservation Details Report - Restaurant manager</title>
   
</head>
<body>
    <div class="out-line">
    <div class="dashboard"> <!--Dashboard start-->
    <div>
    <img src="<?php echo URLROOT ?>/public/images/logoN.png"  class="logo-image">  
    </div>

      <div class="topic-report"><p>Table4U<br> Reservation Details Report</p>
    </div>

    <form action="<?php echo URLROOT ?>/RestaurantManagerReport/reservationReport01" method="POST">
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

            <div>Reservation content</div>
            <!-- <div>
            <canvas id="myChart"  class="bar-chart01"></canvas>

            </div> -->
           
            <div>
            <br>
                <h1>Reservation Details</h1>
                <table>
               
                    <tr>
                        <th>Date</td>
                        <th>Table Number</td>
                        <th>Customer Name</td>
                        <th>Reservation Time</td>
                        <th>Status</th>
                       
                  </tr>
                  <?php 
                  $sum = 0;
                  foreach($data as $d): ?>
                <tr>
                        <td> <?php echo $d->_date ?></td>
                        <td><?php echo $d->tableNo ?></td>
                        <td><?php echo $d->name ?></td>
                        <td><?php echo $d->reservationTime ?></td>
                        <td><?php echo $d->status ?></td>
            
                    </tr>
                    <?php endforeach; 
                       // echo($sum);
                    ?>
            
        

                </table>

                <?php //print_r($data); 

                
                ?>
            </div>

            <script src="<?php echo URLROOT?>/public/js/RMreservationDetailsReport.js"> </script>

    </div> <!--Dashboard End-->
    </div>
    
</body>
</html>