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
if (mysqli_num_rows(mysqli_query("SELECT firstname FROM `tbl_user` WHERE firstname= '$firstname'")) > 0) {

    echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
