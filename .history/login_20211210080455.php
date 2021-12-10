<!DOCTYPE html>
<html lang="en">
<?php
include('./Template/head.php');
define("header_here", true);
if (isset($_SESSION['account'])) {
    header("account.php");
}
$rs = true;
$err = "";
?>

<body>
    <div class="wraper">
        <div class="wrap">

            <div class="visual-page">
                <?php include './Template/header.php' ?>

                <div class="form-container">
                    <form action="./account.php" method="POST" class="login-form">
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
                        <h2 class="form-title">Login</h2>

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