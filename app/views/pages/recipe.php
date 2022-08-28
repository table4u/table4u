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
                    <span><?php echo $temp ; ?></span>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <?php $temp = nl2br($menu_item->recipe); ?>
            <span><?php echo $temp ; ?></span>
        </div>
        <div class="price">
            <span class="topic">Price: </span>
            <div class="column">
                    <div class="cell">Small : <span><?php echo $menu_item->priceSmall ; ?></span></div>
                    <div class="cell">Medium : <span><?php echo $menu_item->priceMedium ; ?></span></div>
                    <div class="cell">Large : <span><?php echo $menu_item->priceLarge ; ?></span></div>
                </div>
        </div>
        <div class="edit">
        <a href="<?php echo URLROOT;?>/pages/update_menu_item/<?php echo $menu_item->menuItemID;?>">Update</a>
        <form action="<?php echo URLROOT; ?>/Pages/delete/<?php echo $menu_item->menuItemID; ?>" method="post">
            <button type="submit" class="button">Delete</button>
        </form>
        </div>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/menu">Back</a>
        </div>
    </div>
    <?php } ?>
    <?php endforeach; ?> 
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>