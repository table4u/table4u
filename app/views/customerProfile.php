<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerProfile.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <!-- navigation menu -->
    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="<?php echo URLROOT ?>/customerHome">Home</a>
            <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
            <a href="<?php echo URLROOT ?>/customerHome/profile"><i class="fas fa-user"></i></a>
        </nav>
    </header>

    <section>
        <div class="container" id="blur">
            <div class="profile">
                <h1 class="heading">
                    Profile
                </h1>
                <hr>
                <div class="info">
                    <?php 
                    // print_r($data);
                    echo $data->name;
                    // echo $data["name"];?>
                    <div>
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter name" value=<?php echo $data->name; ?>>
                        </div>

                        <div class="form-group">
                            <label for="">NIC: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="">Birth Date: </label>
                            <input type="date" readonly class="input-field" id="" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="">House No./ Name: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter house no/ name">
                        </div>
                        <div class="form-group">
                            <label for="">Address Line 1: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter address line 1">
                        </div>
                        <div class="form-group">
                            <label for="">Address Line 2: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter address line 2">
                        </div>
                        <div class="form-group">
                            <label for="">City: </label>
                            <input type="text" readonly class="input-field" id="" placeholder="Enter city">
                        </div>

                        <div class="">
                            <label for=""></label>
                            <button name="" id="" class="edit">Edit</button>

                        </div>

                    </div>
                </div>
            </div>
            <div class="feedback">
                <h1 class="heading">
                    Feedback
                </h1>
                <hr>

                <button class="btn">
                    Let's give feedback
                </button>
            </div>
        </div>

        <div class="feedback-popup" id="popup">
            <div class="content">
                <div class="post">
                    <div class="text">
                        Thanks for rating us!
                    </div>
                    <div class="close fas fa-times"></div>
                </div>
                <div class="feedback-content">
                    <h1 class="heading">Feedback</h1>
                    <p>We value your feedback and it will help us better deliver our services</p>
                    <div class="close fas fa-times" style="top: 2.5rem; right:2.5rem;" id="feedback-close"></div>
                    <form action="">
                        <div class="stars">
                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                        </div>
                        <!--                </form>-->

                        <div>
                            <!--                    <form action="">-->
                            <div class="textarea">
                                <textarea placeholder="Describe your experience" name="" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="submitBtn">
                                <button name="" id="" type="submit">Rate</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
        </div>

        <div class="modal" id="modal-popup">
            <div class="modal-info" id="">
                <div class="close-edit fas fa-times" style="padding-bottom:1rem;top: 2.5rem; right:2.5rem;" id="feedback-close"></div>

                <form action="">
                    <div class="form-group">
                        <label for="">Name: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="">NIC: </label>
                        <input type="text" readonly class="input-field" id="" placeholder="Enter NIC number">
                    </div>
                    <div class="form-group">
                        <label for="">Birth Date: </label>
                        <input type="date" readonly class="input-field" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Email: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="">House No./ Name: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter house no/ name">
                    </div>
                    <div class="form-group">
                        <label for="">Address Line 1: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter address line 1">
                    </div>
                    <div class="form-group">
                        <label for="">Address Line 2: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter address line 2">
                    </div>
                    <div class="form-group">
                        <label for="">City: </label>
                        <input type="text" class="input-field" id="" placeholder="Enter city">
                    </div>

                    <div class="">
                        <label for=""></label>
                        <input type="submit" value="Submit" class="edit" id="" placeholder="">
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script src="<?php echo URLROOT ?>/public/js/customerProfile.js"></script>

</body>

</html>