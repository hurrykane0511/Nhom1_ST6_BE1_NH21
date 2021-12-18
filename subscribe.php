<?php
if(isset($_GET['subscribe'])){
$to       = $_GET['email'];
$subject  = 'test mail';
$message  = 'Hi, Thank you for subscribing. You will receive a notification from the Fragrange Shop';
$headers  = 'From: shopfragrance0@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";
}

?>