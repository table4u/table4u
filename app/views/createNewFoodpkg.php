<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Package</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/newFoodpkg.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerCart.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php if (isset($_SESSION['itemAlreadyIn'])) : ?>



    <body onload="Toast.show('<?php echo $_SESSION['itemAlreadyIn']; ?>' , 'error')">
        <?php unset($_SESSION['itemAlreadyIn']); ?>
    <?php elseif (isset($_SESSION['success'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['success']; ?>' , 'success')">
            <?php unset($_SESSION['success']); ?>
        <?php else : ?>

            <body onload=''>
            <?php endif; ?>

            <!-- navigation menu -->
            <?php
            require APPROOT . '/views/customer/header.php';
            ?>

            <section>
                <div class="heading">
                    Create a New Food Package
                </div>
                <hr>
                <div class="search">
                    <form action="" class="form-control">

                        <div class="form-group">
                            <input id='search-bar' type="text" class="input-field" id="" placeholder="Search Menu" name="username">
                        </div>
                    </form>
                    <div>
                        <?php if (isset($_SESSION['foodPackage'])) : ?>
                            <table id="foodPackageTable">
                                <thead>
                                    <th>Item Name</th>
                                    <th>Portion Size</th>
                                    <th>No of Servings</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['foodPackage'] as $p) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $p['product_name']; ?>

                                            </td>
                                            <td>
                                                <?php echo $p['product_size']; ?>

                                            </td>
                                            <td>
                                                <?php echo $p['product_amount']; ?>

                                            </td>
                                            <td>
                                                <?php echo $p['product_price']; ?>

                                            </td>
                                            <td>
                                                <?php echo $p['product_amount'] * $p['product_price']; ?>

                                            </td>
                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    <div id="result">
                        <!-- <div class="box">
                    <img src="../public/images/a1.jpg" alt="">

                    <div class="content-container">
                        <h3 style="display: inline;">Fried Rice</h3>
                    </div>

                    <div class="sizes">

                        <input class="hidebtn" type="radio" class='product_size' name='product_size' id="small" value='small' required>
                        <label for="small" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Small
                                </div>
                                <div class="price">50 LKR</div>
                            </div>
                        </label>

                        <input class="hidebtn" type="radio" class='product_size' name='product_size' id="medium" value='medium' required>
                        <label for="medium" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Medium
                                </div>
                                <div class="price">100 LKR</div>
                            </div>
                        </label>

                        <input class="hidebtn" type="radio" class='product_size' name='product_size' id="large" value='large' required>
                        <label for="large" class="lbl-radio">
                            <div class="display-box">
                                <div class="size">
                                    Large
                                </div>
                                <div class="price">200 LKR</div>
                            </div>
                        </label>
                    </div>
                    <div id="amount" class="amount">
                        <label for="quant">Amount: </label>
                        <input type="number" value='1' min='1' max='10'>
                    </div>
                    <div id='addToCart'>
                        <button style="background-color:white;" class="btn addToCart" type="submit" value="Add to Cart"> Add to Food Package </button>
                    </div>
                </div> -->
                    </div>

                    <form method="POST" action="<?php echo URLROOT ?>/CustomerFoodpackage/createNewPackage" class="form-control">
                        <div class="form-group">
                            <label for="">Food Package Name: </span></label>
                            <input required type="text" class="input-field" id="" placeholder="Enter package name" name="pkgname">
                            <input class='checkout' type="submit" value="Create Food Package">
                        </div>
                    </form>
                </div>
            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="<?php echo URLROOT ?>/public/js/customerCreateFoodPkg.js"></script>
            <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

            </body>

</html>