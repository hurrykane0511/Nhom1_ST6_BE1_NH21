<?php
include('account.php');
$firstname   = addslashes($_POST['firstname']);
$lastname   = addslashes($_POST['lastname']);
$email      = addslashes($_POST['email']);
$password  = addslashes($_POST['password']);
function checkfirstname($firstname)
{
    $firstname   = addslashes($_POST['firstname']);
    $sql = self::$connection->prepare("SELECT firstname FROM `tbl_user` WHERE firstname = ?");
    $sql->bind_param("i", $firstname);
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
}
$checkfirstname = $xuly->checkfirstname($firstname);
function checkemail($firstname)
{
    $firstname   = addslashes($_POST['email']);
    $sql = self::$connection->prepare("SELECT email FROM `tbl_user` WHERE email = ?");
    $sql->bind_param("i", $firstname);
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
}
$getAllProducts = $xuly->getAllProducts($firstname);
if (!$firstname || !$lastname || !$email || $password) {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}
$password = md5($password);
if ($checkfirstname > 0) {

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
$addmember = mysqli_query("
INSERT INTO `tbl_user`(`user_id`, `firstname`, `lastname`, `password`, `email`) 
VALUES (['$user_id'],[$firstname],[$lastname],[$password],[$email])");
if ($addmember)
    echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
