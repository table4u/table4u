<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerTable.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Table Layout</title>

</head>

<body>

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
        <div class="table-main">
            <h3 class="heading">Table Layout</h3>
            <hr>
            <div class="table-layout">
                <div class="table" id="t1">
                    Table 1
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
                <div class="table" id="t2">
                    Table 2
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
                <div class="table" id="t3">
                    Table 3
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
                <div class="table" id="t4">
                    Table 4
                    <div class="covers">
                        Max: 16
                        <br>
                        Min: 10
                    </div>
                </div>
                <div class="table" id="t5">
                    Table 5
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
                <div class="table" id="t6">
                    Table 6
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
                <div class="table" id="t7">
                    Table 7
                    <div class="covers">
                        Max: 5
                        <br>
                        Min: 2
                    </div>
                </div>
            </div>


        </div>
        <div class="">
            <h3 class="heading">Table Details</h3>
            <hr>
            <div class="table-det-main">
                <div class="t1 table-det inactive">
                    <h3>
                        Table 1
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Available</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t2 table-det inactive">
                    <h3>
                        Table 2
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Available</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t3 table-det inactive">
                    <h3>
                        Table 3
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Available</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t4 table-det inactive">
                    <h3>
                        Table 4
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">16</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">10</span></div>
                        <div><span class="label">Availability </span><span class="val">Unvailable</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t5 table-det inactive">
                    <h3>
                        Table 5
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Available</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t6 table-det inactive">
                    <h3>
                        Table 6
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Available</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>

                <div class="t7 table-det inactive">
                    <h3>
                        Table 7
                    </h3>
                    <div class="table-info">
                        <div><span class="label">Maximum Covers </span><span class="val">5</span></div>
                        <div><span class="label">Minimum Covers </span><span class="val">2</span></div>
                        <div><span class="label">Availability </span><span class="val">Unavailable</span></div>
                    </div>
                    <button class="btn">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo URLROOT ?>/public/js/customerTable.js"></script>

</body>

</html>