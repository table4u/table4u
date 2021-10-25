<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="content">
    <div class="orders">
    <div class="title">Orders</div>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Notes</th>
                <th>Status</th>
            </tr>
            <?php foreach($data['orders'] as $order) : ?>
            <tr>
                    <td><a href="<?php echo URLROOT;?>/pages/order_details/<?php echo $order->orderID; ?>?title=Order Details"><?php echo $order->orderID; ?></a></td>
                    <td><?php echo $order->note; ?></td>
                    <td><?php echo $order->status; ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>