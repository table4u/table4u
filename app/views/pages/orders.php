<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <?php date_default_timezone_set("Asia/Colombo");
    $date=Date("Y-m-d"); ?>
    <?php foreach($data['urgordcount'] as $ord) :  
        $count=$ord->ordcount;
    endforeach;?>
    <div class="class">
    <div class="orders">
    <div class="tab">
            <button  onclick="opentab(event, 'order')" id="defaultOpen">UPCOMING</button>
            <button  onclick="opentab(event, 'ASAP')">URGENT <span class="notf"><?php echo $count; ?></span></button>
            <button  onclick="opentab(event, 'start')">PREPARING</button>
            <button  onclick="opentab(event, 'finished')">FINISHED</button>
    </div>
    <div class="order" id="order">
        <div class="title">Upcoming Orders</div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Time</th>
                <th></th>
            </tr>
            <?php foreach($data['orders'] as $order) : ?>
                 <?php if($order->_date == $date) { ?>
                   <tr>
                    <td class="tdI"><a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $order->orderID; ?>/<?php echo $order->O_status; ?>" class="ID"><?php echo $order->orderID; ?></a></td>
                    <td><?php echo $order->reservationTime; ?></td>
                    <td><form action="<?php echo URLROOT;?>/Pages/ChangeStatus/<?php echo $order->orderID; ?>" method="post">
                        <input type="submit" value="Start Preparation" name="status" class="changeStatus">
                    </form></td>
                </tr>
                <?php } ?> 
            <?php endforeach; ?>
        </table>
    </div>
    <div class="order" id="ASAP">
        <div class="title">Urgent Orders</div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Table No</th>
                <th></th>
            </tr>
            <?php foreach($data['ASAP'] as $order) : 
                $count=$count + 1;?>
                <?php if($order->_date == $date) { ?>
                <tr>
                    <td class="tdI"><a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $order->orderID; ?>/<?php echo $order->O_status; ?>" class="ID"><?php echo $order->orderID; ?></a></td>
                    <td><?php echo $order->O_status; ?></td>
                    <td><?php echo $order->tableNo?></td>
                    <td><form action="<?php echo URLROOT;?>/Pages/ChangeStatus/<?php echo $order->orderID; ?>" method="post">
                        <input type="submit" value="Finished" name="status" class="changeStatus">
                    </form></td>
                </tr>
                <?php } ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="order" id="start">
        <div class="title">Preparing Orders</div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Time</th>
                <th>Table No</th>
                <th></th>
            </tr>
            <?php foreach($data['prep'] as $order) : ?>
                <?php if($order->_date == $date) { ?>
                <tr>
                    <td class="tdI"><a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $order->orderID; ?>/<?php echo $order->O_status; ?>" class="ID"><?php echo $order->orderID; ?></a></td>
                    <td><?php echo $order->reservationTime; ?></td>
                    <td><?php echo $order->tableNo; ?></td>
                    <td><form action="<?php echo URLROOT;?>/Pages/ChangeStatus/<?php echo $order->orderID; ?>" method="post">
                        <input type="submit" value="Finished" name="status" class="changeStatus">
                    </form></td>
            </tr>
            <?php } ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="order" id="finished">
        <div class="title">Finished Orders</div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Table No</th>
            </tr>
            <?php foreach($data['finished'] as $order) : ?>
                <?php if($order->_date == $date) { ?>
                <tr>
                    <td class="tdI"><a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $order->orderID; ?>/<?php echo $order->O_status; ?>" class="ID"><?php echo $order->orderID; ?></a></td>
                    <td><?php echo $order->cusname?></td>
                    <td><?php echo $order->tableNo?></td>
                </tr>
                <?php } ?>
            <?php endforeach; ?>
        </table>
    </div>
    </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>