<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- custom styling sheet -->
    <!-- <link rel="stylesheet" href="../public/css/home.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <!-- <link rel="stylesheet" href="../public/css/signup.css"> -->

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<?php if (isset($_SESSION['notVerified'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['notVerified']; ?>' , 'error')">
        <?php unset($_SESSION['notVerified']); ?>
    <?php elseif (isset($_SESSION['successMsg'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['successMsg']; ?>' , 'success')">
        <?php unset($_SESSION['successMsg']); ?>

        <?php else : ?>

            <body>
            <?php endif; ?>
            <!-- navigation menu -->
            <header>
                <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
                <div id="menu-bar" class="fas fa-bars"></div>
                <nav class="navbar">
                    <a href="home.html"> Home</a>
                    <a href="<?php echo URLROOT ?>/register"> Sign Up</a>
                    <a href="<?php echo URLROOT ?>/login">Login</a>
                </nav>
                <style>
                    .errors {
                        /* margin: 0.5rem; */
                        color: #c2262f;
                        font-size: 1.5rem;
                        padding-bottom: 0.5rem;
                        margin-bottom: 0.5rem;

                    }
                </style>
            </header>

            <section>
                <div class="wrapper">
                    <div class="heading">
                        Welcome!
                        <hr>
                    </div>

                    <div class="avatar">
                        <i class="fas fa-user"></i>
                    </div>

                    <form class="form-control" method="POST" action="<?php echo URLROOT; ?>/login/login">
                        <div class="form-group">
                            <label for="">Username: </span></label>
                            <input type="text" required class="input-field" id="" placeholder="Enter username" name="username">
                        </div>
                        <div class="errors">
                            <?php
                            echo $data['username_err'];
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="">Password: </span></label>
                            <input type="password" required class="input-field" id="" placeholder="Enter password" name="password">
                        </div>
                        <div class="errors">
                            <?php
                            echo $data['pw_err'];
                            ?>
                        </div>

                        <div class="forgot-pw">
                            <a href="<?php echo URLROOT; ?>/login/resetPassword">Forgot password?</a>
                        </div>
                        <div class="btn">
                            <label for=""></label>
                            <input type="submit" value="Log in" class="submitBtn" id="" placeholder="">
                        </div>
                    </form>
                    <p>
                        Don't have an account? <a href="<?php echo URLROOT ?>/register"> <br> Join today</a>
                    </p>
                </div>

            </section>
            <!-- custom js file  -->
            <script src="<?php echo URLROOT ?>/public/js/home.js"></script>
            <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>
            </body>

</html>