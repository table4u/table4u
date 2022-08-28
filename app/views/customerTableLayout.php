<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customerTable.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .res-details .form-group input[type=submit]:focus {
            border: none;
        }

        .res-details .form-group input[type=submit]:hover {
            box-shadow: 0 0 0.5rem #222222;
        }
    </style>
    <title>Table Layout</title>

</head>

<?php if (isset($_SESSION['invlaidTime'])) : ?>

    <body onload="Toast.show('<?php echo $_SESSION['invlaidTime']; ?>' , 'error')">
        <?php unset($_SESSION['invlaidTime']); ?>

    <?php else : ?>

        <body>
        <?php endif; ?>

        <?php
        require APPROOT . '/views/customer/header.php';
        ?>

        <form class="res-details" method="POST" action="<?php echo URLROOT ?>/customerReservations/verifyDateAndTime">
            <div class="form-group">
                <label for="">Date </label>
                <input required name="date" class="date" type="date" class="input-field" id="" placeholder="" value="<?php echo $data['date']; ?>">
            </div>
            <div class="form-group">
                <label for="">Time </label>
                <input required name="time" class="time" type="time" class="input-field" id="" placeholder="" value="<?php echo $data['time']; ?>">
            </div>
            <div class="form-group">
                <input name="submit" class="btn btn-check" type="submit" value="Check" id="" placeholder="" style="color: white; padding-left: 2rem; padding-right:  2rem;">
            </div>
        </form>

        <section>

            <div class="table-main">
                <h3 class="heading">Table Layout</h3>
                <hr>
                <div class="table-layout">
                    <?php
                    $j = 0;

                    $rowcount = count($data['tableDetails']);
                    $rowcountD = $rowcount;
                    $TotalTables = 20;
                    // print_r($data);

                    for ($j = 1; $j <= $TotalTables; $j++) {
                        $loopcheck = 0;
                        $i = 0;

                        while ($i < $rowcountD) {
                            // print_r($data['tableDetails'][$i]->tableNo);
                            // echo '<br>';
                            if ($data['tableDetails'][$i]->tableID == "TL-" . $j) {

                                if ($data['tableDetails'][$i]->availability == 1) {
                                    // echo $data['time'];
                                    echo "<button class = 'table available' id = 'table-" . $data['tableDetails'][$i]->tableNo . "'
                                     onclick = 'tableDetails(" . $data['tableDetails'][$i]->tableNo . ",  \" " . $data['date'] . "\",\"" . $data['time'] . "\")'> 
                                        
                                      Table " . $data['tableDetails'][$i]->tableNo .
                                        "<div class = 'covers'>
                                      Max: " . $data['tableDetails'][$i]->maxCover . "<br>
                                      Min: " . $data['tableDetails'][$i]->minCover . "</div></button>";
                                } else if ($data['tableDetails'][$i]->availability == 0) {

                                    echo "<button class = 'table unavailable' id = 'table-" . $data['tableDetails'][$i]->tableNo . "'
                                     onclick = 'tableDetails(" . $data['tableDetails'][$i]->tableNo . ",  \" " . $data['date'] . "\",\"" . $data['time'] . "\",\"" . $data['tableDetails'][$i]->nextAvailableTime . "\")'> 
                                    Table " . $data['tableDetails'][$i]->tableNo .
                                        "<div class = 'covers'>
                                      Max: " . $data['tableDetails'][$i]->maxCover . "<br>
                                      Min: " . $data['tableDetails'][$i]->minCover . "</div></button>";
                                }

                                $loopcheck = $loopcheck + 1;
                            }
                            $i = $i + 1;
                        }
                        if ($loopcheck == 0) {
                            echo "<div class='table'></div>";
                        }
                        // echo 'TL-'.$j;

                    }

                    ?>

                    <?php $rowcount = count($data);
                    $rowcountD = $rowcount;
                    $a = 0;

                    ?>
                </div>

            </div>
            <div class="">
                <h3 class="heading">Table Details</h3>
                <hr>
                <div class="table-det-main">
                    <div class="t1 table-det inactive">
                        <h3 id='table-heading' class='table-heading'>
                            <!-- Table 1 -->
                        </h3>
                        <div class="table-info">
                            <div>
                                <span class="label">Maximum Covers </span>
                                <span class="val" id='max-cover'>
                                    <!-- 5 -->
                                </span>
                            </div>
                            <div>
                                <span class="label">Minimum Covers </span>
                                <span class="val" id='min-cover'>
                                    <!-- 2 -->
                                </span>
                            </div>
                            <div>
                                <span class="label">Availability </span>
                                <span class="val" id='table-availability'>
                                    <!-- Available -->
                                </span>
                            </div>
                        </div>
                        <div id='bookNowBtn'>
                            <button class="btn bookNow">
                                Book Now
                            </button>
                        </div>

                    </div>


                </div>
            </div>


        </section>

        <div class="bg inactive"></div>

        <div class="modal inactive">
            <div class="close fas fa-times"></div>
            <h3 class="heading">Reserve Table</h3>
            <hr>
            <form action="<?php echo URLROOT ?>/customerReservations/makeReservations" method="POST">
                <div class="form-group" id="clickedTable"></div>
                <div class="form-group">
                    <label for="">Date: </label>
                    <input name="date" type="date" readonly class="input-field" id="" placeholder="" value="<?php echo $data['date']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Time: </label>
                    <input name="time" type="time" readonly class="input-field" id="" placeholder="" value="<?php echo $data['time']; ?>">
                </div>
                <div class="form-group" id='covers'>
                    <!-- <label for="">Covers: <span class="star">*</span></label>
                    <input name="covers" type="number" min=2 max=6 required class="input-field" id="" placeholder="Covers" value=""> -->

                </div>
                <div class="form-group">
                    <label for="">Purpose: </label>
                    <select name="purpose" id="purpose">
                        <option class="input-field" value="other">Select</option>
                        <option class="input-field" value="family">Friends & Family</option>
                        <option class="input-field" value="business">Business</option>
                        <option class="input-field" value="other">Other</option>
                    </select>
                </div>
                <!-- <div class="form-group" style="width:  115%;">
                    <label for="">Food Ordering? <span class="star">*</span></label>
                    <input name="food" type="radio" required class="radio-btn" id="yes" class="radio-btn" placeholder="" value="Yes"> <label for="yes" style="margin-left: 0.25rem;">Yes</label>
                    <input name="food" type="radio" required class="radio-btn" id="no" class="radio-btn" placeholder="" value="No"> <label for="no" style="margin-left: 0.5rem;">No</label>
                </div> -->
                <button class="btn" id="confirm-btn" type=submit>
                    Confirm
                </button>
                <div id="tableID">
                </div>
            </form>
        </div>
        <script src="<?php echo URLROOT ?>/public/js/customerTable.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/toast.js"></script>

        </body>

</html>