<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="content">
        <div class="menu">
            <div class="buttons">
        <select class="select_menu" id="select_menu">
            <option value="all">All </option>
            <?php foreach($data['menu'] as $menu): ?>
                <option value="<?php echo $menu->menu_name; ?>"><?php echo $menu->menu_name; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="add_item">
            <a href="<?php echo URLROOT;?>/pages/add_menu_item?title=Add Menu Item">ADD</a>
        </div>
        </div>
            <table class="table" id="menu_table">
                <tr class="table_row">
                    <th class="th">Menu Item name</th>
                    <th class="th">veg or non_veg</th>
                    <th class="th">availability</th>
                    <th class="th">Menu Name</th>
                </tr>
                <?php foreach($data['menu'] as $menu) : ?>
                    <tr class="table_row">
                        <td><a href="<?php echo URLROOT;?>/Pages/recipe/<?php echo $menu->menuItemID;?>?title=Recipe"><?php echo $menu->menu_item_name; ?></a></td>
                        <td><?php echo $menu->veg_NonVeg; ?>
                        <td><?php echo $menu->availability; ?></td>
                        <td><?php echo $menu->menu_name; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>