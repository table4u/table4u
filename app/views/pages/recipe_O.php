<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
<div class="class">
<?php foreach($data['menu_item'] as $menu_item) : ?>
    <?php if ($menu_item->menuItemID == $data['id']) {?>
    <div class="menu_item">
        <div class="food_name"><?php echo $menu_item->name; ?></div>
        <div class="details">
            <div class="image">
                <img src="<?php echo URLROOT;?>/images/<?php echo $menu_item->picture; ?>" alt="">
            </div>
            <div class="food_details">
                <div class="ingredients">
                    <span class="topic_1">Ingredients:</span><br><br>
                    <?php $temp = nl2br($menu_item->ingredients); ?>
                    <span><?php echo $temp; ?></span>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <?php $temp = nl2br($menu_item->recipe); ?>
            <span><?php echo $temp; ?></span>
        </div>
        <!-- <div class="price">
            <span class="topic">Price</span>
            <div class="price_1">
                <div class="column">
                    <div class="cell">Small</div>
                    <div class="cell">Mediam</div>
                    <div class="cell">Large</div>
                    <div class="cell">Extra Large</div>
                </div>
                <div class="column">
                    <div class="cell">400/=</div>
                    <div class="cell">500/=</div>
                    <div class="cell">600/=</div>
                    <div class="cell">700/=</div>
                </div>
            </div>
        </div> -->
        
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $data['OID']; ?>/<?php echo $data['Ostatus']; ?>">Back</a>
        </div>
    </div>
    <? break 1;?>
    <?php } ?>
    <?php endforeach; ?> 
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>