<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Profile</title> -->
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/foodPkg.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Food Package</title>

</head>
<?php if (isset($_SESSION['unsuccess'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['unsuccess']; ?>' , 'error')">
        <?php unset($_SESSION['unsuccess']); ?>
    <?php elseif (isset($_SESSION['success'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['success']; ?>' , 'success')">
            <?php unset($_SESSION['success']); ?>
        <?php elseif (isset($_SESSION['unsuccessDelete'])) : ?>

            <body onload="Toast.show('<?php echo $_SESSION['unsuccessDelete']; ?>' , 'error')">
                <?php unset($_SESSION['unsuccessDelete']); ?>
            <?php elseif (isset($_SESSION['successDelete'])) : ?>

                <body onload="Toast.show('<?php echo $_SESSION['successDelete']; ?>' , 'success')">
                    <?php unset($_SESSION['successDelete']); ?>
                <?php else : ?>

                    <body>
                    <?php endif; ?>

                    <?php
                    require APPROOT . '/views/customer/header.php';
                    ?>


                    <section>
                        <a class="btn" href="<?php echo URLROOT ?>/customerFoodpackage/loadAdd">
                            Create New FoodPackage
                        </a>
                        <div>
                            <hr>
                        </div>
                        <div>
                            <h2 class="heading">Food Packages</h2>
                            <hr class="hrule">
                        </div>
                        <div style="width: 100%; position: relative">
                            <table style="width: 100%;">
                                <thead style="border: 0">
                                    <th>Food Package Name</th>
                                    <th>Food Item</th>
                                    <th>Number of Servings</th>
                                    <!-- <th>Price</th> -->
                                    <th></th>
                                </thead>
                                <?php if ($data['createdfoodpackage'] != 0) :  ?>
                                    <tbody>
                                        <?php foreach ($data['createdfoodpackage'] as $k => $d) : $id = $k; ?>
                                            <tr>
                                                <?php foreach ($d as $r => $v) : ?>

                                                    <td>
                                                        <?php echo $v->packageName;
                                                        ?>
                                                    </td>

                                                <?php break;
                                                endforeach; ?>
                                                <td>
                                                    <ul>
                                                        <?php foreach ($d as $r) : ?>
                                                            <li>
                                                                <?php echo $r->ItemName . ' - ' . strtoupper($r->portionSize[0]) ?>
                                                            </li>
                                                        <?php
                                                        endforeach; ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <?php foreach ($d as $r) : ?>
                                                            <li>
                                                                <?php echo $r->noOfServings ?>
                                                            </li>
                                                        <?php
                                                        endforeach; ?>
                                                    </ul>
                                                </td>

                                                <td style="display:flex" class="buttons">
                                                    <!-- <?php echo $id; ?> -->
                                                    <form action="<?php echo URLROOT?>/CustomerFoodpackage/addToCart" method='POST'>
                                                        <button type='submit' class="button edit">Add To Cart</button>
                                                        <input type="hidden" name="packageID" value="<?php echo $id; ?>">
                                                    </form>

                                                    <button onclick="deleteFoodPackage('<?php echo $id; ?>')" class="button delete">Delete</button>
                                                </td>

                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                <?php endif; ?>


                            </table>
                        </div>
                    </section>

                    <div class="bg inactive"></div>

                    <div class="cancel-modal inactive" id="cancelRes"></div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>
                    <script src="<?php echo URLROOT ?>/public/js/foodPkg.js"></script>

                    </body>

</html>