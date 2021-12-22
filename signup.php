<?php 
ob_start();
session_start();
define("header_here", true);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include('./model/user.php');

if (isset($_SESSION['account'])) {
    header('location: account.php');
}

?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="form-container">
                    <h2 class="form-title">Create Account</h2>
                    <form action="./loadsignup.php" class="login-form" method="POST" onsubmit="return validateMyForm(event)">

                        <div class="msg-invalid <?= isset($_GET['surs']) ? 'show' : '' ?>"><?= $_GET['surs'] ?></div>

                        <div class="input-group">
                            <label for="firstname">First name</label>
                            <input type="text" name="firstname" id="firstname">
                        </div>
                        <div class="input-group">
                            <label for="lastname">Last name</label>
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div class="input-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email1">
                        </div>
                        <div class="input-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass">
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
<script>
    function validateMyForm(e) {
        var reemail = /\S+@\S+\.\S+/;

        var repass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        const email = document.querySelector('#email1');
        const invalid = document.querySelector('.msg-invalid');
        const lastname = document.querySelector('#lastname');
        const firstname = document.querySelector('#firstname');
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
<script type="module" src="./modules/login.js"></script>

</html>

<?php include './Template/ajax.php' ?>