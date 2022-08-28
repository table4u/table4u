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

      <div class="topic-report"><p>Table4U<br> Customer Details Report</p>
      <h2> </h2>
    </div>

        
            <div class="line"></div> <br>

            <div>Customer content</div>
            <!-- <div>
            <canvas id="myChart"  class="bar-chart01"></canvas>

            </div> -->
           
            <div>
            <br>
                <h1>Self Customer Details</h1>
                <table>
               
                    <tr>
                        <th>Customer Name</td>
                        <th>NIC</td>
                        <th>address</td>
                        <th>mobile</td>
                        
                        <th>dob</th>
                        <th>email</th>
                        <th></th>
                       
                  </tr>
                  <?php 
                  $sum = 0;
                  foreach($data as $d):
                    if($d->cust_type == "SR"):
                  ?>
                <tr>
                        <td><?php echo $d->name ?></td>
                        <td><?php echo $d->NIC ?></td>
                        <td><?php echo $d->address ?></td>
                        <td><?php echo $d->mobile ?></td>
                        
                        <td><?php echo $d->dob ?></td>
                        <td><?php echo $d->email ?></td>
            
                    </tr>
                    <?php 
                    endif;    
                endforeach; 
                       // echo($sum);
                    ?>
            
        

                </table>

                <?php //print_r($data); 

                
                ?>
            </div>

            <div>
            <br>
            <?php ?>
                <h1>Cashier Registered Customer Details</h1>
                <table>
               
                    <tr>
                        <th>Customer Name</td>
                        <th>NIC</td>
                        <th>address</td>
                        <th>mobile</td>
                        <th>dob</th>
                        <th>email</th>
                        <th></th>
                       
                  </tr>
                  <?php 
                  $sum = 0;
                  foreach($data as $d):
                  if($d->cust_type == "CR"):
                  ?>
                <tr>
                        <td> <?php echo $d->name ?></td>
                        <td><?php echo $d->NIC ?></td>
                        <td><?php echo $d->address ?></td>
                        <td><?php echo $d->mobile ?></td>
                    
                        <td><?php echo $d->dob ?></td>
                        <td><?php echo $d->email ?></td>
            
                    </tr>
                    <?php 
                endif;    
                endforeach; 
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