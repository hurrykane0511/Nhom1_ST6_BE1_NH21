<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('./Template/head.php') ?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="form-container">
                    <h2 class="form-title">Create Account</h2>
                    <<<<<<< HEAD <form action="signup.php" class="login-form" method="GET">
                        =======
                        <form action="./index.php" class="login-form">
                            <div class="msg-invalid">Incorrect email or password.</div>
                            >>>>>>> ea91ed1af100a2e1ed6afd6814642582de17fb9c
                            <div class="input-group">
                                <label for="firstname">First name</label>
                                <input type="text" name="firstname" id="firstname" require>
                            </div>
                            <div class="input-group">
                                <label for="lastname">Last name</label>
                                <input type="text" name="lastname" id="lastname" require>
                            </div>
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" require>
                            </div>
                            <div class="input-group">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass" require>
                            </div>
                            <div class="input-group">
                                <input type="submit" name="signup" class="login-btn" value="Sign Up" require>
                            </div>
                        </form>
                        <?php
                        if (isset($_GET['submit'])) {
                            //   $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
                            header('location:http://localhost:8080/Nhom1_ST6_BE1_NH21/login.html');
                        }
                        ?>

                </div>
            </div>
        </div>
    </div>

    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>

<?php include './Template/ajax.php' ?>
<?php if (isset($_GET['signup'])) {
    $firstname  = trim($_GET['firstname']);
    $lastname   = trim($_GET['lastname']);
    $email      = trim($_GET['email']);
    $password  = trim($_GET['password']);
    $user = new User($_GET['firstname'], $_GET['lastname'], $_GET['email'], $_GET['password']);

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