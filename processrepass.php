<?php
ob_start();
session_start();
include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';

$user = new User();
if (isset($_POST['email'])) {
    if ($user->CheckEmail($_POST['email'])) {
        $token = md5(random_bytes(20));
        $email = base64_encode($_POST['email']);
        if ($user->ResetPassword($email, $token)) {

            $to       = $_POST['email'];
            $subject  = 'Thanks you';
            $message  = 'Hi, Thank you for your contact, link to reset password here: '
            .'<br>- <a href="https://fragranceshop.000webhostapp.com/resetpass2.php?em='.$email.'&token='.$token.'">Go to reset password</a>'
            ;
            $mail = new PHPMailer;

            // Enable verbose debug output

            try {
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;                           
                $mail->Username = EMAILID;               
                $mail->Password = PASSWORD;                       
                $mail->SMTPSecure = 'tls';                         
                $mail->Port = 587;                                   
                $mail->setFrom(EMAILID, "Thai Son");
                $mail->addAddress($to);    
                $mail->IsSMTP(true);
                $mail->addReplyTo(EMAILID);
                $mail->SMTPDebug = 3;
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $message;
                // $mail->AltBody = $headers;  

                if (!$mail->send()) {
                    
                    header('location: resetpass1.php?surs=Email failed !');
                    exit();
                } else {
                    header('location: resetpass1.php?reset=1');
                    exit();
                }
            } catch (Exception $th) {
                header('location: resetpass1.php?surs=Email failed !');
            }
        } else {
            header('location: resetpass1.php?surs=Email isnot exists !');
        }
    } else {
        header('location: resetpass1.php?surs=Email isnot exists !');
    }
} else {
    header('location: resetpass1.php?surs=Email isnot exists !');
    ob_end_flush();
}
