<?php
ob_start();
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include('./model/user.php');
include './model/order.php';

if (isset($_GET['order_id'])) {
    $order = new Order;
    $order->UpdateStatus('Cancelled', $_GET['order_id']);
}
header('location: account.php');