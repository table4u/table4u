<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerMenu.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <title>Menu</title>


</head>
<style>
    * {
        font-family: sans-serif;
    }

    /* tab link  */
    .tab {
        overflow: hidden;
        /* border: 1px solid #ccc; */
        background-color: #fff;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);

    }

    .tab button {
        background-color: inherit;
        border: 1px solid #ccc;
        float: left;
        border: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        width: fit-content;
        font-size: 2rem;
        color: rgb(102, 102, 102);
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #fff;
    }

    .tab button.active {
        background-color: #FF6000;
        color: white;
    }
</style>
<?php if (isset($_SESSION['itemAlreadyIn'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['itemAlreadyIn']; ?>' , 'error')">
        <?php unset($_SESSION['itemAlreadyIn']); ?>

    <?php elseif (isset($_SESSION['notAvailable'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['notAvailable']; ?>' , 'error')">
            <?php unset($_SESSION['notAvailable']); ?>
        <?php elseif (isset($_SESSION['success'])) : ?>

            <body onload="Toast.show('<?php echo $_SESSION['success']; ?>' , 'success')">
                <?php unset($_SESSION['success']); ?>


            <?php else : ?>

                <body onload="getMenuItems()">
                <?php endif; ?>
                <div class="bg inactive"></div>

                <?php
                require APPROOT . '/views/customer/header.php';
                ?>
                <section>
                    <div class="filter">
                        <div class="search">
                            <form action="">
                                <input type="text" id="search" name="search" spellcheck='false' placeholder="Search..." autocomplete="off">
                                <button type="submit" class="searchButton">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- <div class="filters">
                            <ul>
                                <li class='active' id="all">All</li>
                                <li id="veg">Veg</li>
                                <li id="nonveg">Non Veg</li>
                            </ul>
                        </div> -->

                    </div>
                    <div class="container">
                        <div class="tab">
                            <button id="menu-search" class="defaultOpen tablink active" onclick="loadAll(event)">All</button>
                            <?php
                            // print_r($data);
                            foreach ($data as $d) : ?>
                                <button id="<?php str_replace(' ', '', $d->name) ?>" class="tablinks" onclick="opentab(event, '<?php echo $d->name ?>')"> <?php echo $d->name ?></button>
                            <?php endforeach; ?>
                        </div>
                        <div id="all" class="menu-container order allItems"></div>
                        <?php
                        foreach ($data as $d) : ?>
                            <div class="menu-container order" id="<?php echo $d->name ?>">

                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="cart">
                <h3 class="heading">Your cart</h3>
                <hr>
                <div class="small-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                    </table>

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td class="net-total">Rs 0</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td class="tax">Rs 0</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="grand-total">Rs 0</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <a href=" <?php echo URLROOT ?>/customerMenu/payment" class="checkout" id="checkoutBtn">
                    Proceed to Checkout
                </a>
            </div> -->

                        <div id='result' class="menu-container">

                        </div>
                        <div class="hoverDetails">

                        </div>
                </section>
                <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

                <script src="<?php echo URLROOT ?>/public/js/customerMenu.js"></script>
                </body>


</html>