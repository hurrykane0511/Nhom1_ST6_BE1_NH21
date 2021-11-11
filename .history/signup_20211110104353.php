<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('./Template/head.php') ?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-login">
                <?php include './Template/header.php' ?>
                <div class="form-container">
                    <h2 class="form-title">Create Account</h2>
                    <form action="signup.php" class="login-form" method="POST">
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
                        <?php require 'xuly.php'; ?>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
                        header('location:http://localhost:8080/Nhom1_ST6_BE1_NH21/login.php?signin');
                    }
                    ?>
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>