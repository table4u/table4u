<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="class">
    <div class="menu_item">
    <form action="<?php echo URLROOT;?>/Pages/add_menu_item" method="POST" enctype="multipart/form-data">
        <div class="details">
            <div class="image_upload">
                <span class="topic_1">Upload image:</span><br><br>
                <label for="file-input">
                      <img src="<?php echo URLROOT;?>/images/addimage.png"/>
                    </label>
                    <input id="file-input" name="image" type="file" value="" required/>
            </div>
            <div class="food_details">
                <span class="topic"><br>
                    <span class="topic_1">Name:</span><br>
                    <input type="text" name="I_name" placeholder="menu item name.." required>  
                </span>
                <div class="ingredients">
                    <span class="topic_1">Ingredients:</span><br><br>
                    <textarea name="I_ingredients" placeholder="add ingredients list..." required></textarea>
                </div>
            </div>
        </div>
        <div class="recipe">
            <span class="topic_1">Recipe:</span><br><br>
            <textarea placeholder="add recipe..." name="I_recipe" required></textarea>
        </div>
        <div class="info">
            <div class="veg">
                <span class="topic_1">Veg or Not :</span>
                <select class="select_menu" name="I_veg">
                    <option value="Veg">Veg</option>
                    <option value="NonVeg">Non Veg</option>
                </select>
            </div><br><br>
            <div class="menu_type">
                <span class="topic_1">Menu Type :</span>
                <select class="select_menu" name="I_menuT">
                    <?php foreach($data['menuT'] as $menuT): ?>
                        <option value="<?php echo $menuT->menuID; ?>"><?php echo $menuT->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <span class="topic_1">Availability :
            <label class="switch">
                <input type="checkbox" name="I_avail" value="1">
                <span class="slider round"></span>
            </label>
            </span><br> -->
            <span class="topic_1">Cost :</span>
            <div class="column">
                    <div class="cell">Small : <input type="text" name="I_cost_s" placeholder="Cost" required></div>
                    <div class="cell">Medium : <input type="text" name="I_cost_m" placeholder="Cost" required></div>
                    <div class="cell">Large : <input type="text" name="I_cost_l" placeholder="Cost" required></div>
                </div>
                
        </div>
        <div class="edit">
                <button type="=submit" class="button">save changes</button>
        </div>
        </form>
        <div class="cancel">
            <a href="<?php echo URLROOT;?>/pages/menu">Back</a>
        </div>
    </div> 
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>