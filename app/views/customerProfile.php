<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerProfile.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .loyalty,
        .feedback-box {
            height: fit-content;
            background: white;
            width: 100%;
            box-shadow: 0.5rem .5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin: 1rem;
        }
    </style>
</head>
<?php if (isset($_SESSION['editSuccessMsg'])) : ?>


    <body onload="Toast.show('<?php echo $_SESSION['editSuccessMsg']; ?>' , 'success')">
        <?php unset($_SESSION['editSuccessMsg']); ?>

    <?php elseif (isset($_SESSION['unsuccessMsg'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['unsuccessMsg']; ?>' , 'error')">
            <?php unset($_SESSION['unsuccessMsg']); ?>

        <?php elseif (isset($_SESSION['successFeedback'])) : ?>


            <body onload="Toast.show('<?php echo $_SESSION['successFeedback']; ?>' , 'success')">
                <?php unset($_SESSION['successFeedback']); ?>

            <?php elseif (isset($_SESSION['unsuccessFeedback'])) : ?>

                <body onload="Toast.show('<?php echo $_SESSION['unsuccessFeedback']; ?>' , 'error')">
                    <?php unset($_SESSION['unsuccessFeedback']); ?>

                <?php else : ?>

                    <body>
                    <?php endif; ?>


                    <!-- navigation menu -->
                    <?php
                    require APPROOT . '/views/customer/header.php';
                    ?>

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
                                    // $_SESSION['name'] = $data->name;
                                    // $_SESSION['address'] = $data->address;
                                    // $_SESSION['nic'] = $data->NIC;
                                    // $_SESSION['mobile'] = $data->mobile;
                                    // $_SESSION['dob'] = $data->dob;
                                    // echo $data["name"];
                                    $dob = date('Y-m-d', strtotime($data->dob));

                                    ?>
                                    <div>

                                    </div>
                                    <form method="POST" action="<?php echo URLROOT; ?>/customerProfile/edit">
                                        <div class="form-group">
                                            <label for="">Name: </label>
                                            <input name="name" type="text" class="input-field" id="" placeholder="Enter name" value="<?php echo $data->name; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">NIC: </label>
                                            <input name="nic" type="text" class="input-field" id="" placeholder="Enter NIC number" value="<?php echo $data->NIC; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Birth Date: </label>
                                            <input name="dob" type="date" class="input-field" id="" placeholder="" value="<?php echo date('Y-m-d', strtotime($data->dob)); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mobile: </label>
                                            <input name="mobile" type="text" class="input-field" id="" placeholder="Enter mobile" value="<?php echo $data->mobile; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email: </label>
                                            <input name="email" type="text" class="input-field" id="" placeholder="Enter email" value="<?php echo $data->email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address: </label>
                                            <input name="address" type="text" class="input-field" id="" placeholder="Enter address" value="<?php echo $data->address; ?>">
                                        </div>

                                        <div class="" style="padding:1.5rem; display: flex; justify-content: space-around">
                                            <input type="submit" class="edit" value="Edit">
                                            <input type="reset" value="Reset" class="edit" id="" placeholder="" onclick="Toast.show('No changes were made' , 'normal')">

                                        </div>

                                    </form>
                                </div>
                                <!-- <div class="pw-reset">
                            <a href=""> <i class="fas fa-lock"></i> Password Reset</a>
                        </div> -->
                            </div>
                            <!-- <div class="feedback">
                        <div class="loyalty">
                            <h1 class="heading">
                                Loyalty Points
                            </h1>
                            <hr>
                            <div class="points">
                                <div class="group">
                                    <p style="font-weight: 600; font-size:1.75rem;">Redeemable Points </p>
                                    <p style=" font-size:1.5rem;">100</p>
                                </div>
                                <div class="group">
                                    <p style="font-weight: 600; font-size:1.75rem;">Expiry Date </p>
                                    <p style=" font-size:1.5rem;">2022-10-01</p>
                                </div>
                                <div>
                                    <button class="redeem">
                                        Redeem Now
                                    </button>
                                </div>
                            </div>
                        </div> -->
                            <div class="feedback-box">
                                <h1 class="heading">
                                    Feedback
                                </h1>
                                <hr>
                                <button class="btn" style="border-bottom-width: 0px;border-bottom-style: solid;border-top-width: 0px;border-top-style: solid;border-left-width: 0px;border-left-style: solid;border-right-width: 0px;border-right-style: solid;">
                                    Let's give feedback
                                </button>
                            </div>



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
                                    <form method="POST" action="<?php echo URLROOT; ?>/customerFeedback/addFeedback">
                                        <div>
                                            <div class="textarea">
                                                <textarea placeholder="Describe your experience" name="comment" id="" cols="30" rows="10" required></textarea>
                                            </div>
                                            <div class="submitBtn">
                                                <button name="" id="" type="submit">Rate</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>




                    </section>

                    <script src="<?php echo URLROOT ?>/public/js/customerProfile.js"></script>
                    <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

                    </body>

</html>