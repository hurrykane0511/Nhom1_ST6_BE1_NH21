<?php

ob_start();
session_start();

include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';
require './phpmailer/PHPMailerAutoload.php';

$user = new User;

if (isset($_POST['signup'])) {
    $var =
        [
            'firstname',
            'lastname',
            'email',
            'password'
        ];

    foreach ($var as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            header('location: signup.php?surs=' . $field . ' cannot be empty');
            exit();
        }
    }

    if (!$user->CheckEmail($_POST['email'])) {
        $token = md5(random_bytes(20));
        $email = base64_encode($_POST['email']);
        $password = base64_encode($_POST['password']);
        if ($user->ResetPassword($email, $token)) {

            $to       = $_POST['email'];
            $subject  = 'Thanks you';
            $message  = 'Hi, Thank you for your contact, link to reset password here: '
            .'<br>- <a href="https://fragranceshop.000webhostapp.com/verify.php?em='.$email.'&token='.$token.'&password='.$password.'&firstname='.$_POST['firstname'].'&lastname='.$_POST['lastname'].'">Verify account</a>'
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
                    header('location: signup.php?surs=Email failed !');
                    exit();
                } else {
                   
                }
            } 
            catch (Exception $th) {
                header('location: signup.php?surs=Email failed !');
                exit();
            }
        }
    } 
    else 
    {
        header('location: signup.php?surs=Email was exists !');
        exit();
    }
  
?>
        <form id="myForm" action="login.php" method="post">
            <input type="hidden" name="sent" value="Sent a confirmation message to email">;
            
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
        </script>
<?php
}
else
{
     header('location: signup.php');
        exit();
}
?>
