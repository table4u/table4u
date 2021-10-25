<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">

<?php foreach($data['menu_item'] as $menu_item) : ?>
    <?php if ($menu_item->menuItemID == $data['id']) {
    ?><div class="menu_item">
        <div class="details">
            <div class="image">
                <img src="images/#" alt="">
            </div>
            <div class="food_details">
                <span class="topic"><?php echo $menu_item->name; ?></span>
                <div class="ingredients">
                    <span class="topic_1">Ingredients:</span><br><br>
                    <span><?php echo $menu_item->ingredients; ?></span>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <span><?php echo $menu_item->description; ?></span>
        </div>
        <div class="price">
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
        </div>
        <div class="edit">
        <a href="<?php echo URLROOT;?>/pages/update_menu_item/<?php echo $menu_item->menuItemID;?>">Update</a>
        <form class="button" action="<?php echo URLROOT; ?>/Pages/delete/<?php echo $menu_item->menuItemID; ?>?title=Update" method="post">
            <input type="submit" value="Delete" >
        </form>
        </div>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/menu?title=Menu">Back</a>
        </div>
    </div>
    <?php } ?>
    <?php endforeach; ?> 
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>