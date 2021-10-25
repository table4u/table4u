<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="content">
        <div class="reservations">
            <table class="table" id="reservations_table">
                <tr class="table_row">
                    <th class="th">Reservation Id</th>
                    <th class="th">Reservation Time</th>
                    <th class="th">No Of guests</th>
                </tr>
                <?php foreach($data['res'] as $res) : ?>
                    <tr class="table_row">
                        <td><?php echo $res->reservationID; ?>
                        <td><?php echo $res->reservationTime; ?></td>
                        <td><?php echo $res->noOfGuests; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>