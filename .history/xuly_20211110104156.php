<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
//
if (isset($_POST['signup'])) {
    $firstname  = trim($_POST['firstname']);
    $lastname   = trim($_POST['lastname']);
    $email      = trim($_POST['email']);
    $password  = trim($_POST['password']);


    if (empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "lastname is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "Two password do not match");
    }

    // Kiểm tra firstname hoặc email có bị trùng hay không
    $sql = "SELECT * FROM `tbl_user` WHERE firstname = '$firstname' OR email = '$email'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="signup.php";</script>';

        // Dừng chương trình
        die();
    } else {

        $sql = "INSERT INTO `tbl_user` (`firstname`, `lastname`, `password`, `email`) 
        VALUES ('$firstname','$lastname','$password','$email')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="signup.php";</script>';
    }
}
