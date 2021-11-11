<!DOCTYPE html>
<html lang="en">
<?php include('./Template/head.php') ?>

<body>
    <div class="wraper">
        <div class="wrap">

            <div class="visual-page">
                <?php include './Template/header.php' ?>

                <div class="form-container">
                    <form action="./index.php" class="login-form">
                        <h2 class="form-title">Login</h2>
                        <div class="msg-invalid">Incorrect email or password.</div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="input-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass">
                        </div>
                        <a href="signup.php" class="handle-link forgot">Forgot password?</a>
                        <div class="input-group">
                            <input type="submit" name="signin" class="login-btn" value="Sign In">
                        </div>
                        <a href="signup.php" class="handle-link create">Create account</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>

<?php include './Template/ajax.php' ?>
<?php if (isset($_POST['signup'])) {
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
?>