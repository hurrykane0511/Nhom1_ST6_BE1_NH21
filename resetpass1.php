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
    $fb_login_url = $fb_helper->getLoginUrl('http://localhost/Nhom1_ST6_BE1_NH21/account.php', $fb_permission);
}

?>

<body>
    <div class="wraper">
        <div class="wrap">

            <div class="visual-page">
                <?php include './Template/header.php' ?>

                <div class="form-container">
                    <form action="processrepass.php" method="POST" onsubmit="validateMyForm(event)" class="login-form">
                        <h2 class="form-title">Reset password</h2>
                        <div class="msg-valid <?= isset($_GET['reset']) ? 'show' : '' ?> ">
                            Email request to change password has been sent
                        </div>
                        <div class="msg-invalid <?= isset($_GET['surs']) ? 'show' : '' ?>"><?= $_GET['surs'] ?></div>
                        <div class="input-group">
                            <label for="email1">Email</label>
                            <input type="text" name="email" id="email1">
                        </div>
                        <div class="input-group">
                            <input type="submit" name="findemail" class="login-btn" value="Submit">
                        </div>
                    </form>

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
        let email = document.querySelector('#email1')
        if (!reemail.test(email.value)) {
            e.preventDefault();
            invalid.classList.add('show');
            invalid.textContent = "Invalid email format !!!";
            return;
        }
    }
</script>

</html>

<?php include './Template/ajax.php' ?>