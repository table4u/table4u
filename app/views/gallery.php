<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/gallery.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/home.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="home.html"> Home</a>
            <a href="#food">Our Food</a>
            <a href="#ambience">Ambience</a>
            <a href="#order">Order Food</a>

            <!-- <a href="#gallery">Gallery</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact Us</a> -->
            <a href="<?php echo URLROOT ?>/login">Login</a>
        </nav>
    </header>

    <section class="food" id="food">
        <h1 class="heading">Our Food</h1>
        <hr>
        <div class="gallery">
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g1.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g2.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g3.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g4.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g5.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g6.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g10.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g11.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g12.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g7.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g8.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/g9.jpg" alt="">
            </div>
    </section>

    <section class="ambience" id="ambience">
        <h1 class="heading">Our Ambience</h1>
        <hr>
        <div class="gallery">
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra1.png" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra2.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra3.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra4.jpg" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra5.png" alt="">
            </div>
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/ra6.jpg" alt="">
            </div>
    </section>

    <!-- custom js file  -->
    <script src="<?php echo URLROOT ?>/public/js/script.js"></script>
</body>