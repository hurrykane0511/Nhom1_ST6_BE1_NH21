<?php
include('account.php');
$firstname   = addslashes($_POST['firstname']);
$lastname   = addslashes($_POST['lastname']);
$email      = addslashes($_POST['email']);
$password  = addslashes($_POST['password']);
if (!$firstname || !$lastname || !$email || $password) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
$password = md5($password);
