<?php
ob_start();
session_start();
include './model/config.php';
include './model/dbconnect.php';
include './model/order.php';
require './phpmailer/PHPMailerAutoload.php';
include './model/perfume.php';

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
        echo 'thanh cong'.'<br>';
    } else {
        echo 'order that bai';
    }

    $newid = $order->getOrder_Id($acc['user_id']);

    echo '<br>' . $newid[0]['order_id'];
    $pf = new Perfume;
    foreach ($cart as $id => $item) {
        $order->OrderItem($item['quantity'], $newid[0]['order_id'], $id, $item['regular_price'] - (($item['regular_price'] / 100) * $item['sales_price']));
        echo $item['quantity'] . 'va' . $id . '<br>';
        $pf->UpdateQty($id, $item['quantity']);
    }
}
echo '<script>window.onbeforeunload = function() { return "Your work will be lost."; };</script>';
unset($_SESSION['cart']);
try {
    $mail = new PHPMailer;
    $to = $_POST['email'];
    $subject  = 'Notifiction';
    $message  = 'Hi, ' . "Thanks for your order, track order here:"."<br>" . 
    '<a href="https://fragranceshop.000webhostapp.com/account.php">Visit your order</a>';
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = EMAILID;                 // SMTP username
    $mail->Password = PASSWORD;                           // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->setFrom(EMAILID, "Thai Son");
    $mail->addAddress($to);     // Add a recipient
    $mail->IsSMTP(true);
    $mail->addReplyTo(EMAILID);
    $mail->SMTPDebug = 3;
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
        
    if (!$mail->send()) {
        
    } else {
        header('location: account.php');
        exit;
    }
} catch (Exception $th) {
    header('location: account.php');
    exit;
}
ob_end_flush();
