<?php
include('account.php');
$username   = addslashes($_POST['firstname']);
$lastname   = addslashes($_POST['lastname']);
$email      = addslashes($_POST['email']);
$password  = addslashes($_POST['password']);
if (!$username || !$password || !$email || !$fullname || !$birthday || !$sex) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
