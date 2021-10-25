<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="menu_item">
    <form action="<?php echo URLROOT;?>/Pages/add_menu_item" method="POST">
        <div class="details">
            <div class="image_upload">
                <label for="file-input">
                      <img src="<?php echo URLROOT;?>/images/addimage.png"/>
                    </label>
                    <input id="file-input" type="file" />
            </div>
            <div class="food_details">
                <span class="topic">
                    <input type="text" name="I_name" placeholder="menu item name..">  
                </span>
                <div class="ingredients">
                    <span class="topic_1">Ingredients:</span><br><br>
                    <textarea name="I_ingredients" placeholder="add ingredients list..."></textarea>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <textarea placeholder="add recipe..." name="I_recipe"></textarea>
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
                <button type="=submit" class="button">save changes</button>
        </div>
        </form>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/menu?title=Menu">Back</a>
        </div>
    </div> 
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>