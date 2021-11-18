<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
include('./model/user.php');

if (!isset($_SESSION['account'])) {
    $user = new User;
    $err = "";
    if (isset($_POST['signin'])) {
        if (empty($_POST['email'])) {
            $err = "Email is required";
        } elseif (empty($_POST['password'])) {
            $err = "Password is required";
        } else {

            if ($user->Login($_POST['email'], $_POST['password']) == null) {
            } else {
                $_SESSION['account'] = $user->Login($_POST['email'], $_POST['password']);
            }
        }
    } else {
        header("location: login.php?err=$err");
    }
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