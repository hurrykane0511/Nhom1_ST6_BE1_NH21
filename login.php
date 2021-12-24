<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php

include('./Template/head.php');
include './model/config.php';
define("header_here", true);

if (isset($_SESSION['account'])) {
    header("location: account.php");
}

$facebook_output = '';
$fb_helper = $fb->getRedirectLoginHelper();

if (!isset($_GET['code'])) {
    $fb_permission = ['email'];
    $fb_login_url = $fb_helper->getLoginUrl('https://fragranceshop.000webhostapp.com/account.php', $fb_permission);
}

?>

<body>
    <div class="wraper">
        <div class="wrap">

            <div class="visual-page">
                <?php include './Template/header.php' ?>

                <div class="form-container">
                    <form action="./account.php" method="POST" onsubmit="validateMyForm(event)" class="login-form">
                        <h2 class="form-title">Login</h2>
                        <div class="msg-valid    <?= isset($_POST['success']) ? 'show' : '' ?> ">
                            Sign up successfully
                        </div>
                        <?php
                        if (isset($_GET['reset'])) {
                        ?>
                            <div class="msg-valid show">
                                Reset password successfully
                            </div>
                        <?php
                        }
                        ?>
                            <?php
                        if (isset($_POST['verify'])) {
                        ?>
                            <div class="msg-valid show">
                                <?= $_POST['verify'] ?>
                            </div>
                        <?php
                        }
                        ?>
                             <?php
                        if (isset($_POST['sent'])) {
                        ?>
                            <div class="msg-valid show">
                                <?= $_POST['sent'] ?>
                            </div>
                        <?php
                        }
                        ?>
                        
                        <div class="msg-invalid <?= isset($_GET['surs']) ? 'show' : '' ?>"><?= $_GET['surs'] ?></div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email1">
                        </div>
                        <div class="input-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass">
                        </div>
                        <a href="resetpass1.php" class="handle-link forgot">Forgot password?</a>
                        <div class="input-group">
                            <input type="submit" name="signin" class="login-btn" value="Sign In">
                        </div>
                        <a href="signup.php" class="handle-link create">Create account</a>
                        <p style="text-align: center;">-OR-</p>
                    </form>
                    <a href="<?= $fb_login_url ?>" class="loginfb" style="margin-top: 30px;" >Login with facebook</a>
                </div>
            </div>
        </div>
    </div>
    <?php include("./Template/footer.php") ?>
</body>

<script type="module" src="./modules/login.js"></script>
<script>
    function validateMyForm(e) {
        var reemail = /\S+@\S+\.\S+/;
        var repass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        document.querySelector('.msg-valid').classList.remove('show');
        const email = document.querySelector('#email1');
        const invalid = document.querySelector('.msg-invalid');
        const password = document.querySelector('#pass');

        if (!reemail.test(email.value)) {
            e.preventDefault();
            invalid.classList.add('show');
            invalid.textContent = "Invalid email format !!!";
            return;
        }

        if (!repass.test(password.value)) {
            e.preventDefault();
            invalid.classList.add('show');
            invalid.textContent = "Password: minimum eight characters, at least one letter and one number";
            return;
        }
    }
</script>

</html>

<?php include './Template/ajax.php';
 ob_end_flush();
?>