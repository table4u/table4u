<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="content">
        <div class="search_box">
            <form action="">
                <input type="text" onkeyup="searchMenu()" id ="search" placeholder="Search..." autocomplete="off">
                <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
            </form>
        </div>
        <div class="class">
            <div class="menu">
                <div class="buttons">
                    <div class="filters">
                    <!-- <select class="select_menu" id="select_menu" Oninput="filterMenu_mt()">
                        <option value="All">All </option>
                        <?php foreach($data['menuT'] as $menuT): ?>
                            <option value="<?php echo $menuT->name; ?>"><?php echo $menuT->name; ?></option>
                        <?php endforeach; ?>
                    </select> -->
                    <!-- <select class="select_menu" id="selectmenu" Oninput="filter_Menu_veg()">
                        <option value="All">Veg or Non Veg </option>
                        <option value="Veg">Veg</option>
                        <option value="Non Veg">Non Veg</option>
                    </select> -->
                    </div>
                    <div class="add_item">
                        <a href="<?php echo URLROOT;?>/pages/add_menu_item">ADD</a>
                    </div>
                </div>
                <div class="tab">
                    <button  onclick="opentabmenu(event, 'available')" id="defaultOpen">AVAILABLE</button>
                    <button  onclick="opentabmenu(event, 'unavailable')">UNAVAILABLE</button>
                </div>
                <div class="avl" id="available">
                <div class="mn" id="ALL">
                <table class="table" id="menu_table">
                    <tr class="table_row">
                        <th class="th">Menu Item name</th>
                        <th class="th"><select class="select_menu" id="selectmenu" Oninput="filter_Menu_veg()">
                        <option value="All" class="listI">Veg or Non Veg </option>
                        <option value="Veg" class="listI">Veg</option>
                        <option value="Non Veg" class="listI">Non Veg</option>
                    </select></th>
                        <th class="th"><select class="select_menu" id="select_menu" Oninput="filterMenu_mt()">
                        <option value="All" class="listI">Menu name</option>
                        <?php foreach($data['menuT'] as $menuT): ?>
                            <option value="<?php echo $menuT->name; ?>" class="listI"><?php echo $menuT->name; ?></option>
                        <?php endforeach; ?>
                    </select></th>
                        <th class="th"></th>
                    </tr>
                    <?php foreach($data['menu'] as $menu) : ?>
                        <?php if( $menu->veg_NonVeg == "NonVeg"){
                            $veg = "Non Veg"; ?>
                            <tr>
                        <?php } else {
                            $veg = $menu->veg_NonVeg; ?>
                            <tr class="tablerow">
                        <?php } ?>
                        <?php if($menu->availability == "1") { ?>
                            <td class="tdI"><a href="<?php echo URLROOT;?>/Pages/recipe/<?php echo $menu->menuItemID;?>" class="food_n" ><?php echo $menu->menu_item_name; ?></a></td>
                            <td><?php echo $veg; ?></td>
                            <!-- <form action="<?php echo URLROOT;?>/Pages/updateAvail/<?php echo $menu->menuItemID;?>" method="POST" id="avail">
                            <td><label class="switch">
                                    <?php if($menu->availability == "1") { ?>
                                        <input type="checkbox" name="I_avail" id="i_avail" checked disabled>
                                    <?php } else { ?>
                                        <input type="checkbox" name="I_avail" id="i_avail" disabled>
                                    <?php } ?>
                                    <span class="slider round"></span>
                                </label></td></form> -->
                            <td><?php echo $menu->menu_name; ?></td>
                            <td><form action="<?php echo URLROOT;?>/Pages/updateAvail/<?php echo $menu->menuItemID; ?>" method="post">
                            <input type="submit" value="Make Unavailable" name="I_avail" class="changeavl">
                            </form></td>
                            <?php } ?>    
                        </tr>
                    <?php endforeach; ?>
                </table>
                </div>
                </div>
                <div class="avl" id="unavailable">
                <div class="mn" id="ALL">
                <table class="table" id="menu_table_ua">
                    <tr class="table_row">
                        <th class="th">Menu Item name</th>
                        <th class="th"><select class="select_menu" id="selectmenu_ua" Oninput="filter_Menu_veg_ua()">
                        <option value="All" class="listI">Veg or Non Veg </option>
                        <option value="Veg" class="listI">Veg</option>
                        <option value="Non Veg" class="listI">Non Veg</option>
                    </select></th>
                        <th class="th"><select class="select_menu" id="select_menu_ua" Oninput="filterMenu_mt_ua()">
                        <option value="All" class="listI">Menu name</option>
                        <?php foreach($data['menuT'] as $menuT): ?>
                            <option value="<?php echo $menuT->name; ?>" class="listI"><?php echo $menuT->name; ?></option>
                        <?php endforeach; ?>
                    </select></th>
                        <th class="th"></th>
                    </tr>
                    <?php foreach($data['menu'] as $menu) : ?>
                        <?php if( $menu->veg_NonVeg == "NonVeg"){
                            $veg = "Non Veg"; ?>
                            <tr>
                        <?php } else {
                            $veg = $menu->veg_NonVeg; ?>
                            <tr class="tablerow">
                        <?php } ?>
                        <?php if($menu->availability == "0") { ?>
                            <td class="tdI"><a href="<?php echo URLROOT;?>/Pages/recipe/<?php echo $menu->menuItemID;?>" class="food_n" ><?php echo $menu->menu_item_name; ?></a></td>
                            <td><?php echo $veg; ?></td>
                            <td><?php echo $menu->menu_name; ?></td>
                            <td><form action="<?php echo URLROOT;?>/Pages/updateAvail/<?php echo $menu->menuItemID; ?>" method="post">
                        <input type="submit" value="Make Available" name="I_avail" class="changeunavl">
                    </form></td>
                    <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>