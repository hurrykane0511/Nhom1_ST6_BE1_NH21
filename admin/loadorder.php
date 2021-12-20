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
    if ($id == '') {
        $orders = $order->getAllOrder2($stt);
    } else {
        $orders = $order->getAllOrder3($id,$stt);
    }

    $order = new Order;
    foreach ($orders as $row) {
?>
        <tr>
            <th class="mobile-header">Order ID</th>
            <td><?= $row['order_id'] ?></td>
            <th class="mobile-header">Customer's ID</th>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['firstname'] . ' ' . $row['lastname'] ?></td>
            <th class="mobile-header">Phone contact</th>
            <td><?= $row['phone'] ?></td>
            <th class="mobile-header">Email</th>
            <td><?= $row['email'] ?></td>
            <th class="mobile-header">Order date</th>
            <td><?= $row['ordered_at'] ?></td>

            <th class="mobile-header">Status</th>
            <td>
                <Select name="status" class="<?= $row['status'] ?>" onchange="updatestatus(this)">
                    <option value="Pending-<?= $row['order_id'] ?>" <?=  $row['status'] == 'Pending' ? 'selected': '' ?> style="background:#2dccff;">Pending</option>
                    <option value="Confirm-<?= $row['order_id'] ?>" <?=  $row['status'] == 'Confirm' ? 'selected': '' ?> style="background:#fce83a;">Confirm</option>
                    <option value="Delivery-<?= $row['order_id'] ?>" <?=  $row['status'] == 'Delivery' ? 'selected': '' ?> style="background:#ffb302;">Delivery</option>
                    <option value="Delivered-<?= $row['order_id'] ?>" <?=  $row['status'] == 'Delivered' ? 'selected': '' ?> style="background:#56f000;">Delivered</option>
                    <option value="Cancelled-<?= $row['order_id'] ?>" <?=  $row['status'] == 'Cancelled' ? 'selected': '' ?> style="background:#ff3838;">Cancelled</option>
                </Select>
            </td>
        </tr>
<?php
    }
}
?>