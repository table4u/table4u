<header>
    <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
    <div id="menu-bar" class="fas fa-bars"></div>
    <nav class="navbar">
        <a href="<?php echo URLROOT ?>/customerHome">Home</a>
        <a href="<?php echo URLROOT ?>/customerMenu/menu">Menu</a>
        <a href="<?php echo URLROOT ?>/customerReservations/reservationDetails">Reservations</a>
        <a href="<?php echo URLROOT ?>/customerFoodpackage/index">Food Package</a>
        <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
        <!-- <a href="#"><i class="fas fa-bell"></i></a> -->
        <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
        <a href="<?php echo URLROOT ?>/customerCart/displayCart"><i class="fas fa-shopping-cart"></i>
            <!-- <a href=""><i class="fas fa-shopping-cart"></i> -->
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<sup id=\"card_count\">$count</sup>";
            } else {
                echo "<sup id=\"card_count\">0</sup>";
            }
            ?>
        </a>
    </nav>
</header>