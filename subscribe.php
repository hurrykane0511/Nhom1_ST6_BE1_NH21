<?php
ob_start();
include './model/config.php';
require './phpmailer/PHPMailerAutoload.php';
include './model/dbconnect.php';
include './model/subscribe.php';

$sb = new Subscriber;

if (isset($_POST['subscribe'])) {
    try {
        $sb->InsertSB($_POST['email']);
    } catch (Exception $th) {
    }
}


if (isset($_POST['subscribe'])) {

    $to       = $_POST['email'];
    $subject  = 'Thanks you';
    $message  = 'Hi, Thank you for subscribing. You will receive a notification from the Fragrange Shop';
    $mail = new PHPMailer;

    // Enable verbose debug output

    try {
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
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = $headers;  
        
        if (!$mail->send()) {
            header('location: index.php');
            exit();
        } else {
            header('location: index.php?rp=thank for your subscribe');
            exit();
        }
    } catch (Exception $th) {

    }
}
