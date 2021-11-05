<!DOCTYPE html>
<html lang="en">
<?php include('./Template/head.php') ?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-login">
                <?php 
                if (isset($_GET["signin"])) {
                    include("./Template/header.php");
                ?>
                    <div class="form-container">
                        <h2 class="form-title">Login</h2>
                        <form action="./index.php" class="login-form">
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email">
                            </div>
                            <div class="input-group">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass">
                            </div>
                            <div class="input-group">
                                <input type="submit" name="signin" class="login-btn" value="Sign In">
                            </div>
                            <a href="login.php?signup" class="create-account">Create account</a>
                        </form>
                    </div>
                <?php
                } 
                elseif (isset($_GET["signup"])) {
                    include("./Template/header.php");
                ?>
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
                        </form>
                    </div>
                <?php
                }
                else{
                    header('location: index.php');
                }
                ?>

            </div>
        </div>
    </div>
    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>