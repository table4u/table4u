<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerCart.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/header.css">
    <title>Cart</title>

    <style>
        .container .box2 form .last .count {
            margin-top: 1rem;
            display: flex;
        }

        .addToCart:hover {
            color: #fff;
            background: var(--orange) !important;

        }


        #quantityCounter .value-button {
            display: inline-block;
            font-size: 1.5rem;
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            padding: 11px 0;
            background: red;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #quantityCounter.value-button:hover {
            cursor: pointer;
        }

        #quantityCounter #decrease {
            font-size: 1.5rem;
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
        }


        #quantityCounter #increase {
            font-size: 1.5rem;
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
        }

        #quantityCounter #input-wrap {
            margin: 0px;
            padding: 0px;
        }

        #quantityCounter input#number {
            text-align: center;
            border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.15);
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);

            margin: 0px;
            width: 40px;
            height: 40px;
        }

        #quantityCounter input[type=number]::-webkit-inner-spin-button,
        #quantityCounter input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<?php
require APPROOT . '/views/customer/header.php';
?>
<!-- initializing the cart  -->
<?php if (isset($_SESSION['unsuccessmsg'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['unsuccessmsg']; ?>' , 'error')">
        <?php unset($_SESSION['unsuccessmsg']); ?>



    <?php elseif (isset($_SESSION['deletedItem'])) : ?>

        <body onload="Toast.show('<?php echo $_SESSION['deletedItem']; ?>' , 'error')">
        <?php unset($_SESSION['deletedItem']);
    else : ?>

            <body>
            <?php endif; ?>
            <div class="bg inactive"></div>

            <section>
                <div class="container">
                    <div class="box">
                        <img src="<?php echo '../public/images/' . $data['product_picture'] ?>" alt="">

                        <div class="content-container">
                            <h3 style="display: inline;"><?php echo $data['product_name'] ?></h3>
                        </div>

                        <div class="description"><?php echo $data['product_description'] ?>

                        </div>

                    </div>

                    <div class="box box2">
                        <!-- <form method='POST' action="" class="form-submit"> -->
                        <form method='POST' action="<?php echo URLROOT; ?>/customerCart/addToCart">

                            <input type='hidden' class='product_id' name='product_id' value="<?php echo $data['product_id'] ?>">
                            <input type='hidden' class='order_id' name='order_id' value="<?php echo $_SESSION['order_id'] ?>">
                            <input type='hidden' class='product_name' name='product_name' value="<?php echo $data['product_name'] ?>">
                            <input type='hidden' name='product_small' value="<?php echo $data['product_small'] ?>">
                            <input type='hidden' name='product_medium' value="<?php echo $data['product_medium'] ?>">
                            <input type='hidden' name='product_large' value="<?php echo $data['product_large'] ?>">
                            <input type='hidden' name='product_description' value="<?php echo $data['product_description'] ?>">
                            <input type='hidden' name='product_picture' value="<?php echo $data['product_picture'] ?>">
                            <h2 class="title">
                                Choose the Portion Size <span class="star">*</span>
                            </h2>
                            <div class="sizes">

                                <input class="hidebtn" type="radio" class='product_size' name='product_size' id="small" value='small' required>
                                <label for="small" class="lbl-radio">
                                    <div class="display-box">
                                        <div class="size">
                                            Small
                                        </div>
                                        <div class="price"><?php echo $data['product_small'] ?> LKR</div>
                                    </div>
                                </label>

                                <input class="hidebtn" type="radio" class='product_size' name='product_size' id="medium" value='medium' required>
                                <label for="medium" class="lbl-radio">
                                    <div class="display-box">
                                        <div class="size">
                                            Medium
                                        </div>
                                        <div class="price"><?php echo $data['product_medium'] ?> LKR</div>
                                    </div>
                                </label>

                                <input class="hidebtn" type="radio" class='product_size' name='product_size' id="large" value='large' required>
                                <label for="large" class="lbl-radio">
                                    <div class="display-box">
                                        <div class="size">
                                            Large
                                        </div>
                                        <div class="price"><?php echo $data['product_large'] ?> LKR</div>
                                    </div>
                                </label>

                            </div>

                            <h2 class="title">
                                Special Notes
                            </h2>
                            <div class="sp-instructions">
                                <div class="input-field">
                                    <textarea class="special_instructions" name="instructions" id="" cols="30" rows="5">
                                </textarea>
                                </div>
                            </div>
                            <div class="last">

                                <span class="count" id="quantityCounter">

                                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" min='1' value="1" name='amount' class='amount' />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                </span>
                                <span id='addToCart'>
                                    <button style="background-color:white;" class="btn addToCart" type="submit" value="Add to Cart"> Add to Cart </button>
                                </span>
                            </div>
                        </form>

                    </div>

                    <!-- cart -->
                    <div class="box">
                        <h2 class="title">
                            Your Cart
                        </h2>
                        <div class="small-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php $total = 0;
                                $tax = 0; ?>
                                <tbody>
                                    <?php if (isset($_SESSION['cart'])) :
                                        // print_r($_SESSION['cart']);
                                        foreach ($_SESSION['cart'] as $p) : ?>
                                            <!-- <?php print_r($p); ?> -->
                                            <tr>
                                                <td>
                                                    <i style="font-size: 1.5em;" class="fa fa-trash" onclick="deleteItemFromCart('<?php echo $p['product_id'] ?>','<?php echo $p['product_size'] ?>')" aria-hidden="true"></i>

                                                    <!-- <button onclick="deleteItemFromCart('<?php echo $p['product_id'] ?>','<?php echo $p['product_size'] ?>')"></button> -->
                                                    <?php echo $p['product_name'] . ' - ' . strtoupper($p['product_size'][0]) ?>
                                                </td>
                                                <td style="text-align: right;padding-right:3rem;"><?php echo $p['product_price'] ?> LKR
                                                    <input type="hidden" class='iprice' value="<?php echo $p['product_price'] ?>">
                                                </td>
                                                <td style="text-align: right;padding-right:3rem;">
                                                    <input readonly onchange="subTotal()" type="number" class='iquantity' min='1' value='<?php echo $p['product_amount'] ?>'>
                                                </td>
                                                <?php $sTotal = $p['product_amount'] * $p['product_price'];
                                                $total = $total + $sTotal;

                                                ?>
                                                <td class='itotal'><?php echo $sTotal ?> LKR</td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </tbody>

                            </table>

                            <div class="total-price">
                                <table>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="net-total"> <?php echo number_format($total, 2) ?> LKR </td>
                                    </tr>
                                    <tr>
                                        <!-- <td>
                                            Redeem Points
                                        </td>
                                        <td> -->
                                            <!-- <form action="<?php echo URLROOT; ?>/customerLoyalty/getLoyaltyPoints" method="POST">
                                            <input type="submit" class="checkout" value="Redeem"></input>
                                        </form> -->

                                            <!-- <button></button> -->
                                        <!-- </td> -->
                                    </tr>
                                    <tr>
                                        <td>Tax (5%)</td>
                                        <td class="tax"><?php $tax = $total * 0.05;
                                                        echo number_format($tax, 2); ?> LKR </td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable</td>
                                        <td class="grand-total"><?php echo number_format($total + $tax, 2); ?> LKR </td>
                                    </tr>
                                </table>
                            </div>

                            <form method="POST" action="<?php echo URLROOT; ?>/customerCheckout/checkTableReservation">
                                <input type='submit' class="checkout" value='Proceed to Checkout'>
                                </input>
                            </form>

                        </div>
                    </div>
                </div>
            </section>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>
            <script src="<?php echo URLROOT ?>/public/js/customerCart.js"></script>

            <script>
                let iprice = document.getElementsByClassName('iprice')
                let iquantity = document.getElementsByClassName('iquantity')
                let itotal = document.getElementsByClassName('itotal')

                function subTotal() {
                    for (i = 0; i < iprice.length; i++) {
                        itotal[i].innerText = iprice[i].value * iquantity[i].value;
                        itotal[i].innerText += " LKR";
                    }
                }
                subTotal();

                function increaseValue() {
                    var value = parseInt(document.getElementById('number').value, 10);
                    value = isNaN(value) ? 1 : value;
                    value++;
                    document.getElementById('number').value = value;
                }

                function decreaseValue() {
                    var value = parseInt(document.getElementById('number').value, 10);
                    value = isNaN(value) ? 1 : value;
                    value < 2 ? value = 2 : '';
                    value--;
                    document.getElementById('number').value = value;
                }
            </script>
            </body>

</html>