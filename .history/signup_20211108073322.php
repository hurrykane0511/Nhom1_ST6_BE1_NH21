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
                    <form action="./index.php" class="login-form">
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
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="input-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass">
                        </div>
                        <div class="input-group">
                            <input type="submit" name="signup" class="login-btn" value="Sign Up">
                        </div>
                        <?php require 'xuly.php'; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>