<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="content">
        <div class="class">
        <div class="reservations">
            <table class="table" id="reservations_table">
                <tr class="table_row">
                    <th class="th">Customer</th>
                    <th class="th">Reservation Time</th>
                    <th class="th">No Of guests</th>
                    <th class="th">Table No</th>
                    <th class="th">Orders</th>
                </tr>
                <?php foreach($data['res'] as $res) : ?>
                    <tr class="table_row">
                        <td><?php echo $res->cusname?></td>
                        <td><?php echo $res->reservationTime; ?></td>
                        <td><?php echo $res->noOfGuests; ?></td>
                        <td><?php echo $res->tableNo?></td>
                        <td class="tdI"><?php foreach($data['resOrd'] as $resOrd) :
                            if($res->reservationID == $resOrd->reservationID){ ?>
                                <a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $resOrd->orderID; ?>/<?php echo $resOrd->O_status; ?>" class="ID"><?php echo $resOrd->orderID; ?></a>
                                <?php
                            }
                            endforeach; ?></td>
                        <!-- <td><?php echo $res->orderID;?></td> -->
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
                </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>