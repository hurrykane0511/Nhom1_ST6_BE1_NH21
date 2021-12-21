<?php
session_start();
include './model/config.php';
include './model/dbconnect.php';
include './model/order.php';

if (isset($_POST['placeorder'])) {
    $cart;
    $acc;
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        var_dump($cart);
    } else {
        exit();
    }
    if (isset($_SESSION['account'])) {
        $acc = $_SESSION['account'];
    } else {
        exit();
    }
    $var =
        [
            'fname',
            'lname',
            'company',
            'country',
            'houseadd',
            'apartment',
            'city',
            'state',
            'zipcode',
            'phone',
            'email',
            'paymethod'
        ];

    foreach ($var as $fields) {
        if (!isset($_POST[$fields])) {
            echo 'Post that bai';
            exit();
        }
        echo $_POST[$fields] . '<br>';
    }

    $address = empty($_POST['apartment']) ? $_POST['houseadd'] : $_POST['houseadd'] . ', ' . $_POST['apartment'];

    $order = new Order();
    $rs = $order->Checkout($_POST['fname'], $_POST['lname'], $address, $_POST['city'], $_POST['state'], $_POST['zipcode'], $_POST['phone'], $_POST['email'], $acc['user_id'], $_POST['paymethod']);
    if ($rs) {
        echo 'thanh cong';
    } else {
        echo 'order that bai';
    }
    
    $newid = $order->getOrder_Id($acc['user_id']);

    echo '<br>'. $newid[0]['order_id'];

    foreach ($cart as $id => $item) {
        echo $order->OrderItem($item['quantity'], $newid[0]['order_id'], $id, $item['regular_price'] - (($item['regular_price'] / 100) * $item['sales_price']));
    }
}
echo '<script>window.onbeforeunload = function() { return "Your work will be lost."; };</script>';
unset($_SESSION['cart']);
header_remove();
header('location: account.php');
