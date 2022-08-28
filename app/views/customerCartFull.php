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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cutomerCartFull.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerReservations.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/header.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <title>Cart</title>
    <style>
        .checkout {
            background-color: #181818;
            color: whitesmoke;
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            display: inline-block;
            padding: 0.8rem 3rem;
            cursor: pointer;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
            /* margin-left: 2rem; */
            width: 25%;
            margin: 0 auto;

            box-shadow: 0 0 1rem #222222;

        }

        .checkout:hover {
            transform: scale(1.01);
        }

        form {}
    </style>

</head>
<?php
require APPROOT . '/views/customer/header.php';
?>
<?php if (isset($_SESSION['deletedItem'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['deletedItem']; ?>' , 'error')">
    <?php unset($_SESSION['deletedItem']);
else : ?>

        <body>
        <?php endif; ?>
        <section>
            <div class="heading" id="upcoming">
                Your Cart <br>
                <hr style="margin-top: 1rem;">
            </div>
            <table style="width: 100%;">
                <thead style="border: 0;">
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>

                </thead>
                <tbody style="overflow:auto; height:30%; ">
                    <?php $total = 0;
                    $tax = 0; ?>
                    <?php
                    foreach ($_SESSION['cart'] as $p) :
                    ?>
                        <tr>
                            <td>
                                <i style="font-size: 1.5em;" class="fa fa-trash" onclick="deleteItemFromCart('<?php echo $p['product_id'] ?>','<?php echo $p['product_size'] ?>')" aria-hidden="true"></i>
                                <!-- <button onclick="deleteItemFromCart('<?php echo $p['product_id'] ?>','<?php echo $p['product_size'] ?>')"></button> -->
                                <?php echo $p['product_name'] . ' - ' . strtoupper($p['product_size'][0]) ?>
                            </td>
                            <td style=""><?php echo $p['product_price'] ?> LKR
                                <input type="hidden" class='iprice' value="<?php echo $p['product_price'] ?>">
                            </td>
                            <td>
                                <input style="border:none;" readonly onchange="subTotal()" type="number" class='iquantity' min='1' value='<?php echo $p['product_amount'] ?>'>
                            </td>
                            <?php $sTotal = $p['product_amount'] * $p['product_price'];
                            $total = $total + $sTotal;

                            ?>
                            <td class='itotal'><?php echo $sTotal ?> LKR</td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
            <div style="padding-top: 1rem;"></div>
            <div class="total-price">
                <table class='checkoutTable'>
                    <tr>
                        <td>Subtotal</td>
                        <td class="net-total"> <?php echo number_format($total, 2) ?> LKR </td>
                    </tr>
                    <!-- <tr>
                        <td>
                            Redeem Points
                        </td>
                        <td> -->
                            <!-- <form action="<?php echo URLROOT; ?>/customerLoyalty/getLoyaltyPoints" method="POST">
                                            <input type="submit" class="checkout" value="Redeem"></input>
                                        </form> -->

                            <!-- <button></button> -->
                        <!-- </td>
                    </tr> -->
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