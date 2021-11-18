<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include('./model/user.php');

if (isset($_SESSION['account'])) {
    header('location: login.php');
}
$user = new User;
$rs = true;
$err = "";
if (isset($_POST['signup'])) {
    if (empty($_POST['firstname'])) {
        $err = "Firstname is required";
        $rs = false;
    } elseif (empty($_POST['lastname'])) {
        $err = "Lastname is required";
        $rs = false;
    } elseif (empty($_POST['password'])) {
        $err = "Password is required";
        $rs = false;
    } elseif (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $_POST['email'])) {
        $err = "Invalid email";
        $rs = false;
    } elseif ($user->CheckEmail($_POST['email']) == true) {
        $err = "Email was exist";
        $rs = false;
    }
    if ($rs == true) {
        $rs = $user->AccessAccount($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
        header('location: login.php');
    }
}

?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="form-container">
                    <h2 class="form-title">Create Account</h2>
                    <form class="login-form" method="POST">

                        <form action="./index.php" class="login-form">
                            <?php
                            if (!$rs) {
                            ?>
                                <div class="msg-invalid show"><?= $err ?></div>
                            <?php
                            } else {
                            ?>
                                <div class="msg-invalid">Incorrect email or password.</div>
                            <?php
                            }
                            ?>

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
                                <input type="submit" name="signup" class="login-btn" value="Sign Up">
                            </div>
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