<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="overview">
    <?php foreach($data['rescount'] as $res) : ?>
        <div class="box">
            <div class="box_topic">Reservations</div>
            <div class="box_details"> Today's Reservations count : <br></div>
            <div class="number"><?php echo $res->rescount?></div>
        </div>
    <?php endforeach; ?> 
    <?php foreach($data['ordcount'] as $ord) : ?>
        <div class="box">
            <div class="box_topic">Orders</div>
            <div class="box_details"> Today's Orders count : <br></div>
            <div class="number"><?php echo $ord->ordcount?></div>
        </div>
    <?php endforeach; ?> 
    </div>
 </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
