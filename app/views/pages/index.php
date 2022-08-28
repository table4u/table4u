<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="overview"> 
    <?php foreach($data['upordcount'] as $ord) : ?>
        <div class="box" style="background-image: url(<?php echo URLROOT;?>/images/upcomming.jpg);background-size: cover;background-size: 100% 100%;
        background-position:center;">
            <div class="box_topic">Upcoming</div>
            <div class="box_details"><span > Today's Upcoming Orders Count : <br></span></div>
            <div class="number"><span ><?php echo $ord->ordcount?></span></div>
        </div>
    <?php endforeach; ?>
    <?php foreach($data['preordcount'] as $ord) : ?>
        <div class="box" style="background-image: url(<?php echo URLROOT;?>/images/preparation.jpg);background-size: cover;background-size: 100% 100%;
        background-position:center;">
            <div class="box_topic">Preparing</div>
            <div class="box_details"><span >Currently Preparing Orders Count : <br></span></div>
            <div class="number"><span ><?php echo $ord->ordcount?></span></div>
        </div>
    <?php endforeach; ?>
    <?php foreach($data['finordcount'] as $ord) : ?>
        <div class="box" style="background-image: url(<?php echo URLROOT;?>/images/finished.jpg);background-size: cover;background-size: 100% 100%;
        background-position:center;">
            <div class="box_topic">Finished</div>
            <div class="box_details"><span > Finished Orders<br>Count : <br><br></span></div>
            <div class="number"><span ><?php echo $ord->ordcount?></span></div>
        </div>
    <?php endforeach; ?>
    <?php foreach($data['rescount'] as $res) : ?>
        <div class="box" style="background-image: url(<?php echo URLROOT;?>/images/reservation.jpg);background-size: cover;background-size: 100% 100%;
        background-position:center;">
            <div class="box_topic">Reservations</div>
            <div class="box_details"><span > Today's Reservations Count : <br></span></div>
            <div class="number"><span ><?php echo $res->rescount?></span></div>
        </div>
    <?php endforeach; ?> 
    <?php foreach($data['ordcount'] as $ord) : ?>
        <div class="box" style="background-image: url(<?php echo URLROOT;?>/images/orders.jpg);background-size: cover;background-size: 100% 100%;
        background-position:center;">
            <div class="box_topic">Orders</div>
            <div class="box_details"><span> Today's Total Orders Count : <br><br></span></div>
            <div class="number"><span ><?php echo $ord->ordcount?></span></div>
        </div>
    <?php endforeach; ?>
    </div>
 </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
