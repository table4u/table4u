<div class="sidebar">
    <div class="logo">
        <img src="<?php echo URLROOT;?>/images/logo.png">
    </div>
    <h1>Table 4U<br> Admin Panel</h1>
    <ul class="links">
        <!-- <li> <a href="<?php echo URLROOT;?>/pages/index" class="active">Dashboard</a> </li>
        <li> <a href="<?php echo URLROOT;?>/pages/reservations"> Reservations</a> </li>
        <li> <a href="<?php echo URLROOT;?>/pages/orders"> Orders </a> </li>
        <li> <a href="<?php echo URLROOT;?>/pages/menu"> Menu </a> </li>
        <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li> -->
        <?php switch($data['title']){
            case "Dashboard": ?>
                <li> <a href="<?php echo URLROOT;?>/pages/index" class="active">Dashboard</a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/orders"> Orders </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/menu"> Menu </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/reservations"> Reservations</a> </li>
                <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li>
                <?php break;
            case "Orders": ?>
                <li> <a href="<?php echo URLROOT;?>/pages/index">Dashboard</a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/orders" class="active"> Orders </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/menu"> Menu </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/reservations"> Reservations</a> </li>
                <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li>
                <?php break;
            case "Menu": ?>
                <li> <a href="<?php echo URLROOT;?>/pages/index">Dashboard</a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/orders"> Orders </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/menu" class="active"> Menu </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/reservations"> Reservations</a> </li>
                <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li>
                <?php break;
            case "Reservations": ?>
                <li> <a href="<?php echo URLROOT;?>/pages/index">Dashboard</a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/orders"> Orders </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/menu"> Menu </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/reservations" class="active"> Reservations</a> </li>
                <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li>
                <?php break;
            default : ?>
                <li> <a href="<?php echo URLROOT;?>/pages/index">Dashboard</a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/orders"> Orders </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/menu"> Menu </a> </li>
                <li> <a href="<?php echo URLROOT;?>/pages/reservations"> Reservations</a> </li>
                <li class="logout"> <a href="<?php echo URLROOT;?>/Login/logout">Log Out</a></li>
                <?php break;
        }?>
    </ul>
</div>