<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="content">
        <div class="class">
    <div class="order_details">
        <div class="title">Order Details</div>
            <div class="table_status">
                <?php $arr = array("Upcoming","Preparing","Finished"); ?>
                 <form action="<?php echo URLROOT;?>/Pages/updateStatus/<?php echo $data['id']; ?>" method="post">
                    <select name="status">
                        <?php foreach($arr as $key => $value) : ?>
                            <?php if($value == $data['status']) {
                                echo ('<option selected="selected" value='.$value.'>'.$value.'</option>');
                            } else {
                                echo('<option value='.$value.'>'.$value.'</option>');
                            } ?>
                        <?php endforeach; ?>
                    </select>
                    <input class="submit" type="submit" value="change">
                </form>
            </div>
            <div class="list">
                <?php foreach($data['order_details'] as $order) : ?>
                    <?php if ($order->orderID == $data['id']) { ?> 
                        <div class="f_item">
                            <div class="f_image">
                                <img src="<?php echo URLROOT;?>/images/<?php echo $order->picture;?>" alt="">
                            </div>
                            <div class="f_details">
                                <a href="<?php echo URLROOT;?>/pages/recipe_O/<?php echo $order->menuItemID;?>/<?php echo $order->orderID;?>/<?php echo $data['status'];?>">
                                    <span class="food_item"><?php echo $order->name; ?></span></a>
                                <span class="quantity"><?php echo $order->portionSize; echo "   x"; echo $order->noOfServings; ?></span>
                                <span class="notes"><?php echo $order->specialNotes;?></span>
                            </div>
                        </div> 
                    <?php } ?>
                <?php endforeach; ?>       
            </div>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/orders">Back</a>
        </div>
    </div>
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>