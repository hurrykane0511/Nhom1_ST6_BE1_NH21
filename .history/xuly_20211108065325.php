<?php
include('account.php');
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
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="sigup.php";</script>';

        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO `tbl_user` (username, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="sigup.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên đăng nhập: " . $_POST['firstname'] . "<br/>";
            echo "Mật khẩu: " . $_POST['lastname'] . "<br/>";
            echo "Email đăng nhập: " . $_POST['email'] . "<br/>";
            echo "Mật khẩu: " . $_POST['password'] . "<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
        }
    }
}
