<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="class">
<?php foreach($data['menu_item'] as $menu_item) : ?>
    <?php if ($menu_item->menuItemID == $data['id']) {
    ?> <div class="menu_item">
        <div class="food_name"><?php echo $menu_item->name; ?></div>
        <form action="<?php echo URLROOT;?>/Pages/update/<?php echo $data['id'];?>/<?php echo $menu_item->availability;?>" method="POST" enctype="multipart/form-data">
        <div class="details">
            <div class="image">
                <span class="topic_1">Change image:</span><br><br>
                <label for="file-input">
                      <img src="<?php echo URLROOT;?>/images/<?php echo $menu_item->picture;?>"/>
                    </label>
                    <input id="file-input" name="I_image" type="file" value=""/>
            </div>
            <div class="food_details">
                <div class="ingredients">
                    <span class="topic_1">Ingredients:</span><br><br>
                    <textarea name="I_ingredients"><?php echo $menu_item->ingredients; ?></textarea>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <textarea name="I_recipe"><?php echo $menu_item->recipe; ?></textarea>
        </div>
        <div class="info">
            <div class="veg">
                <span class="topic_1">Veg or Not :</span>
                <?php $arr = array("Veg","NonVeg"); ?>
                <select class="select_menu" name="I_veg">
                    <?php foreach($arr as $key => $value) : ?>
                        <?php if($value == $menu_item->veg_NonVeg) {
                            echo ('<option selected="selected" value='.$value.'>'.$value.'</option>');
                        } else {
                            echo('<option value='.$value.'>'.$value.'</option>');
                        } ?>
                    <?php endforeach; ?>
                </select>
            </div><br><br>
            
            <div class="menu_type">
                <span class="topic_1">Menu Type :</span>
                <?php foreach($data['menu_type'] as $menu_type):
                    $arr = $menu_type->name;
                endforeach; ?>
                <select class="select_menu" name="I_menuT">
                    <?php foreach($data['menuT'] as $menuT) : ?>
                        <?php if($menuT->name == $arr) {
                            echo ('<option selected="selected" value='.$menuT->menuID.'>'.$menuT->name.'</option>');
                        } else {
                            echo('<option value='.$menuT->menuID.'>'.$menuT->name.'</option>');
                        } ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <span class="topic_1">Availability : </span>
            <label class="lable">
                <?php if($menu_item->availability == "1") { ?>
                    <label class="container">Available
                        <input type="radio" name="I_avail" value="1" checked>
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Unavailable
                        <input type="radio" name="I_avail" value="0">
                        <span class="checkmark"></span>
                    </label>
                <?php } else { ?>
                    <label class="container">Available
                        <input type="radio" name="I_avail" value="1">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Unavailable
                        <input type="radio" name="I_avail" value="0" checked>
                        <span class="checkmark"></span>
                    </label>
                <?php } ?>
                <!-- <span class="slider round"></span> -->
                </label><br>
            
            <div class="column">
            <span class="topic_1">Cost :</span>
                    <div class="cell">Small : <input type="text" name="I_cost_s" value="<?php echo $menu_item->costSmall; ?>"></div>
                    <div class="cell">Medium : <input type="text" name="I_cost_m" value="<?php echo $menu_item->costMedium; ?>"></div>
                    <div class="cell">Large : <input type="text" name="I_cost_l" value="<?php echo $menu_item->costLarge; ?>"></div>
                </div>
                <input type="text" name="img" value="<?php echo $menu_item->picture; ?>" hidden>
        </div>
        
        <div class="edit">
            <button type="submit" class="button">save changes</button>
        </div>
        </form>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/recipe/<?php echo $menu_item->menuItemID;?>">Back</a>
        </div>
    </div>
    <?php } ?>
    <?php endforeach; ?> 
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>