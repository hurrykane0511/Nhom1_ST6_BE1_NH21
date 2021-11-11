<?php

class User extends Db
{
}
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
if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
    echo "Email này không hợp lệ. Vui long nhập email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

//Kiểm tra email đã có người dùng chưa
if (mysqli_num_rows(mysqli_query("SELECT email FROM `tbl_user` WHERE email='$email'")) > 0) {
    echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
@$addmember = mysql_query("
        INSERT INTO member (
            username,
            password,
            email,
            fullname,
            birthday,
            sex
        )
        VALUE (
            '{$username}',
            '{$password}',
            '{$email}',
            '{$fullname}',
            '{$birthday}',
            '{$sex}'
        )
    ");

//Thông báo quá trình lưu
if ($addmember)
    echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
