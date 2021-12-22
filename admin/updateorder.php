<?php
ob_start();
session_start();
include  '../model/config.php';
include '../model/dbconnect.php';
include '../model/order.php';

$order = new Order;

if (!isset($_SESSION['admin'])) {
    header('location: login.php');
    exit();
}

if (isset($_GET['status']) && isset($_GET['id'])) {
    if ($order->UpdateStatus($_GET['status'], $_GET['id'])) {
        echo true;
    }
    else{
        echo false;
    }
}
