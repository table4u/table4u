<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerPayment.css">
    <title>Payment Page</title>


</head>

<body>
    <div class="modal modal-container inactive">
        <h1 class="heading">Confirm Your Payment</h1>
        <hr>
        <div class="first-row">
            <div class="owner">
                <h3>Owner</h3>
                <div class="input-field">
                    <input type="text" placeholder="Name">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" placeholder="cvv">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" placeholder="XXXX-XXXX-XXXX-XXXX">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiry Date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                    <select name="years" id="years">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
                <div class="cards">
                    <img src="<?php echo URLROOT ?>/public/images/mc.png" alt="">
                    <img src="<?php echo URLROOT ?>/public/images/vi.png" alt="">
                </div>
            </div>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <a href="<?php echo URLROOT ?>/customerHome" class="btn">Cancel</a>
            <a href="" class="btn">Confirm</a>
        </div>
    </div>
    <script src="<?php echo URLROOT ?>/public/js/customerMenu.js"></script>
</body>


</html>