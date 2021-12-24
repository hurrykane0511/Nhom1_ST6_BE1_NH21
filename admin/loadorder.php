<?php

session_start();

include  '../model/config.php';
include '../model/dbconnect.php';
include '../model/order.php';

$order = new Order;

if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

if (isset($_GET['order_id']) && isset($_GET['stt'])) {
    $id = $_GET['order_id'];
    $stt = $_GET['stt'];
    $orders;

    if ($id == '' && $stt == '') {
        $orders = $order->getAllOrder4();
    } elseif ($stt != '' && $id != '') {
        $orders = $order->getAllOrder3($id, $stt);
    } elseif ($stt != '' && $id == '') {
       $orders = $order->getAllOrder2($stt);
    }
    elseif ($stt == '' && $id != ''){
        $orders = $order->getAllOrder1($id);
    }

    $order = new Order;
    foreach ($orders as $row) {
?>
        <tr>
            <th class="mobile-header">Order ID</th>
            <td><?= $row['order_id'] ?></td>
            <th class="mobile-header">Customer's ID</th>
            <td><?= $row['user_id'] ?></td>
            <th class="mobile-header">Customer's Name</th>
            <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
            <th class="mobile-header">Phone contact</th>
            <td><a href="tel:+<?= $row['phone'] ?>"><?= $row['phone'] ?></a></td>
            <th class="mobile-header">Email</th>
            <td><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
            <th class="mobile-header">Order date</th>
            <td><?= $row['ordered_at'] ?></td>
            <th class="mobile-header">Items</th>
            <td>
                <?php
                foreach ($order->getAllItemByIdOrder($row['order_id']) as $item) {
                ?>
                    -<?= $item['pf_name'] ?> (x <?= $item['quantity'] ?>)<br>
                <?php
                }
                ?>
            </td>
            <th class="mobile-header">Total price</th>
            <td>£<?= $order->sumPriceOrder($row['order_id'])['SumPrice'] ?></td>
            <th class="mobile-header">Status</th>
            <td>
                <Select name="status" class="<?= $row['status'] ?>" onchange="updatestatus(this)">
                    <option value="Pending-<?= $row['order_id'] ?>" <?= $row['status'] == 'Pending' ? 'selected' : '' ?> style="background:#2dccff;">Pending</option>
                    <option value="Confirm-<?= $row['order_id'] ?>" <?= $row['status'] == 'Confirm' ? 'selected' : '' ?> style="background:#fce83a;">Confirm</option>
                    <option value="Delivery-<?= $row['order_id'] ?>" <?= $row['status'] == 'Delivery' ? 'selected' : '' ?> style="background:#ffb302;">Delivery</option>
                    <option value="Delivered-<?= $row['order_id'] ?>" <?= $row['status'] == 'Delivered' ? 'selected' : '' ?> style="background:#56f000;">Delivered</option>
                    <option value="Cancelled-<?= $row['order_id'] ?>" <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?> style="background:#ff3838;">Cancelled</option>
                </Select>
            </td>
        </tr>
<?php
    }
}
?>