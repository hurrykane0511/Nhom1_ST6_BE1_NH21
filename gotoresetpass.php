<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';
$user = new User();
if (isset($_POST['email']) && isset($_POST['confirmpass']) && isset($_POST['token']) && isset($_POST['password'])) {
    if ($user->CheckResetPass($_POST['email'], $_POST['token'])) {
        if ($user->UpdatePass($_POST['email'], $_POST['confirmpass'])) {
            header('location: login.php?reset=1');
        }
        else{
            die("Link Expires !!!");
        }
    }
    else{
        die("Link Expires !!!");
    }
}