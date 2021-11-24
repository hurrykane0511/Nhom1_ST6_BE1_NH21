<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include('./model/user.php');
$user = new User;
$rs = true;
$err = "";
if (!isset($_SESSION['account'])) {
    if (isset($_POST['signin'])) {
        if (empty($_POST['email'])) {
            $err = "Email is required";
            $rs = false;
        } elseif (empty($_POST['password'])) {
            $err = "Password is required";
            $rs = false;
        } else {

            if ($user->Login($_POST['email'], $_POST['password']) == null) {
                $err = "Invalid Email or PassWord";
                $rs = false;
            } else {
                $_SESSION['account'] = $user->Login($_POST['email'], $_POST['password']);
            }
        }
    }
} else {
    echo "Hello" . $_SESSION['account']['firstname'];
    header("location: login.php?err=$err");
}
if ($rs == false) {
    header("location: login.php?err=$err");
}


$pf = new Perfume;
?>

<body>

    <?php
    if (isset($_SESSION['account'])) {
        echo "Hello" . $_SESSION['account'];
    }
    ?>

</body>

</html>