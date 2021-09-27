<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/home.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- navigation menu -->
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="#home"> Home</a>
            <a href="#popular"> Popular</a>
            <a href="#testimonials">Testimonials</a>
            <a href="<?php echo URLROOT ?>/home/gallery">Gallery</a>
            <a href="#about">About Us</a>
            <a href="#contact">Contact Us</a>
            <a href="<?php echo URLROOT ?>/login">Login</a>
        </nav>
    </header>

    <!-- home -->
    <section class="home" id="home">
        <div class="content">
            <h3>Have <br> a <br> Meal With Us</h3>
            <a href="#" class="btn"> Let's Order Food!</a>
        </div>
        <!-- <div class=" image">
                <img src="../public/images/hero.png" alt="">
        </div> -->
    </section>

    <!-- popular -->
    <section class="popular" id="popular">
        <h1 class="heading">Popular Dishes</h1>
        <hr>
        <div class="container">
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p1.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Fried Rice</h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">Stir fried jasmine rice, egg, prawns and chicken with carrot and
                    spring onion served with chili fish sauce and chilli paste.
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p2.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Pizza</h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">Topped with a combination of chicken bacon, chicken sausage, BBQ chicken and
                    spicy chicken with a double layer of mozzarella cheese.

                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p3.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Spaghetti</h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">Delicious spaghetti with a meeting of the finest tandoori chicken and kochchi
                    chicken sausage meat along with a spicy Italian sauce and mozzarella cheese.
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p4.jpeg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Kottu</h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">A delicious combination of godamba roti strips, vegetables,
                    egg, mixed with accompaniments such as chicken, mutton and its own gravy with a spicy taste.

                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p5.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Burger</h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">Chicken patty with sundried tomato crème cheese
                    in a fresh oven baked sesame bun, green chilli, garlic mayonnaise,
                    coleslaw and fries.

                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/p6.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="content-container">
                    <h3 style="display: inline;">Fried Chicken </h3>
                    <span class="price">Rs 200</span>
                </div>

                <div class="description">Everyone's favourite crispy chicken, baked just the right amount and given the
                    tangy flavour of BBQ sauce to tantalize your tastebuds.
                </div>

                <div style="display: flex; justify-content: center;">
                    <a href="#" class="btn"> Order Now</a>
                </div>
            </div>

        </div>

        <div class="explore-menu">
            <a href="#" class="btn"> Explore Menu</a>
        </div>
    </section>

    <!-- testimonials  -->
    <section class="testimonial" id="testimonials">
        <h1 class="heading">Listen to Our Customers</h1>
        <hr>

        <div class="container">
            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/pic1.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>
                    The servers here are just wonderful and have great memories it seems. We sat on the ocean front
                    patio and enjoyed the view with our delicious wine and lunch. Must try!
                </p>
                <h3>Alice Smith</h3>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/pic2.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Delicious food, waiters are very attentive, and super nice atmosphere. Plus it’s all at an
                    affordable price.
                    Can totally recommend it and will definitely come back again.
                </p>
                <h3>Peter Parker</h3>
            </div>

            <div class="box">
                <img src="<?php echo URLROOT ?>/public/images/pic3.jpg" alt="">

                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>
                    It’s a great experience. The ambiance is very welcoming and charming. Amazing wines, food and
                    service. Staff are extremely knowledgeable and make great recommendations.
                </p>
                <h3>Veronica Lodge</h3>
            </div>
        </div>
    </section>

    <!-- about us -->
    <section class="about" id="about">
        <div class="container">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/staff.jpg" alt="">
            </div>
            <div class="content">
                <h1 class="heading">About Us</h1>
                <hr>
                <p>
                    We are a collection of culinary experiences that deliver authentic food made by genuine people. Our
                    restaurant draw inspiration from the diversity of fresh ingredients readily available, and the
                    tradition of unforgettable but humble family feasts. In short, we create experiences that feel like
                    home – come eat with us!
                    <br>
                    <br>
                    Our mission is to always deliver fresh, high-quality meal at a great value in and in a warm setting.
                    <br>
                    <br>
                <p>We are familiar, comfortable and consistent.</p>

                <br>

                <p> <i class="fas fa-utensils" style="color: var(--orange);"></i> Hotel De Luna is an experience,
                    not just a meal.</p>


                </p>
            </div>
        </div>
    </section>

    <!-- contact us -->
    <footer>
        <div class="parent">
            <div class="container">
                <div class="sect aboutus">
                    <h2>Table4U</h2>
                    <img src="<?php echo URLROOT ?>/public/images/logoN.png" alt="">

                    <p>
                        Table4U is a Restaurant Reservation System and an Order Handling System developed by a group of
                        undergraduates.
                    </p>
                    <ul class="social">
                        <li> <a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li> <a href="#"><i class="fab fa-instagram"></i></a></li>

                    </ul>

                </div>
                <div class="sect link">
                    <h2>Quick Links</h2>
                    <!-- <hr> -->
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="sect contact">
                    <h2>Contact US</h2>
                    <ul class="contact-info">
                        <li>
                            <span><i class="fas fa-phone"></i></span>
                            <p> <a href="tel:94112842968">+94 112 842968</a> </p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <span>65, Park Street, <br> Colombo, <br> Sri Lanka</span>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i></span>
                            <p> <a href="mailto:table4u@gmail.com">table4u@gmail.com</a> </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- copyright -->
    <div class="copyright">
        <p> Copyright © 2021 CS 06. All Rights Reserved.</p>
    </div>
    <!-- custom js file  -->
    <script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>