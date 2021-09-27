<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/register.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sign Up</title>
</head>

<body>
    <!-- navigation menu -->
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="<?php echo URLROOT ?>/home"> Home</a>
            <a href="<?php echo URLROOT ?>/register"> Sign Up</a>
            <a href="<?php echo URLROOT ?>/login">Login</a>
        </nav>
    </header><!-- custom js file  -->

    <section>
        <div class="wrapper">
            <div class="heading">
                Welcome!
                <hr>
            </div>
            <p>
                Already have an account? <a href="<?php echo URLROOT ?>/login"> Log in</a>
            </p>
            <div class="form-control">
                <form action="<?php echo URLROOT; ?>/register/register" method="POST">

                    <div class="form-group">
                        <label for="">First Name: <span class="star">*</span></label>
                        <input name="fName" type="text" required class="input-field" id="" placeholder="Enter first name">

                    </div>
                    <div style="margin:0.5rem; padding-bottom: 0.5rem; color:red; font-weight:800;">
                        <?php

                        ?>
                    </div>

                    <div class="form-group">
                        <label for="">Last Name: <span class="star">*</span></label>
                        <input name="lName" type="text" required class="input-field" id="" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="">NIC: <span class="star">*</span></label>
                        <input name="nic" type="text" required class="input-field" id="" placeholder="Enter NIC number">
                    </div>
                    <div class="form-group">
                        <label for="">Birth Date: </label>
                        <input name="dob" type="date" class="input-field" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Email: <span class="star">*</span></label>
                        <input name="email" type="email" required class="input-field" id="" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="">House No./ Name: </label>
                        <input name="houseNo" type="text" class="input-field" id="" placeholder="Enter house no/ name">
                    </div>
                    <div class="form-group">
                        <label for="">Address Line 1: </label>
                        <input name="line1" type="text" class="input-field" id="" placeholder="Enter address line 1">
                    </div>
                    <div class="form-group">
                        <label for="">Address Line 2: </label>
                        <input name="line2" type="text" class="input-field" id="" placeholder="Enter address line 2">
                    </div>
                    <div class="form-group">
                        <label for="">City: </label>
                        <input name="city" type="text" class="input-field" id="" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label for="">Username: <span class="star">*</span></label>
                        <input name="username" type="text" required class="input-field" id="" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="">Password: <span class="star">*</span></label>
                        <input name="pw" type="password" required class="input-field" id="" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password: <span class="star">*</span></label>
                        <input name="confirm_pw" type="password" required class="input-field" id="" placeholder="Enter confirm password">
                    </div>

                    <div class="form-group terms">
                        <label for="" class="check">
                            <input type="checkbox" name="" id="" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>Agreed to <a href="#">Terms & Conditions</a> and <a href="#">Privacy
                                Policy.</a></p>
                    </div>
                    <div class="">
                        <label for=""></label>
                        <input type="submit" value="Register" class="submitBtn" id="" placeholder="">
                    </div>

                </form>
            </div>
        </div>


    </section>
    <script src="../public/js/script.js"></script>
</body>

</html>