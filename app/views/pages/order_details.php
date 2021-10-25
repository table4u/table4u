<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="content">
    <div class="order_details">
        <div class="title">Order Details</div>
            <div class="table_status">
                 <form action="<?php echo URLROOT;?>/Pages/updateStatus/<?php echo $data['id']; ?>" method="post">
                    <select name="status">
                        <option value="upcoming" class="dropdown">Upcoming</option>
                        <option value="start preparation" class="dropdown">Start Preparation</option>
                        <option value="finished" class="dropdown">Finished</option>
                    </select>
                    <input type="submit" value="change">
                </form>
            </div>
            <div class="list">
                <?php foreach($data['order_details'] as $order) : ?>
                    <?php if ($order->orderID == $data['id']) {
                       ?> <div class="f_item">
                            <div class="f_image">
                                <img src="images/#" alt="">
                            </div>
                            <div class="f_details">
                                <a href="<?php echo URLROOT;?>/pages/recipe?title=Recipe&menuItem=<?php echo $order->menuItemID;?>"><span class="food_item"><?php echo $order->name; ?></span></a>
                                <span class="quantity"><?php echo $order->noOfServings; ?></span>
                            </div>
                        </div> 
                    <?php } ?>
                <?php endforeach; ?>       
            </div>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/orders?title=Orders">Back</a>
        </div>
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>