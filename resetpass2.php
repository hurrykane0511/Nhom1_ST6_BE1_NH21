<?php
include './model/config.php';
include './model/dbconnect.php';
include './model/user.php';
$user = new User();

if (isset($_GET['em']) && isset($_GET['token'])) {
    if ($user->CheckResetPass($_GET['em'], $_GET['token'])) {
    } else {
        die('Link expired');
    }
} else {
    die('Link not available !!!');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include './Template/head.php' ?>
<body>
    <div class="resetpassform">
        <div class="panel">
            <img class="panel__avatar" src="http://icons.iconarchive.com/icons/jonathan-rey/simpsons/256/Bart-Simpson-01-icon.png" alt="avatar" />
            <form action="gotoresetpass.php" method="post" onsubmit="validateMyForm(event)" class="inputs">
                <div class="inputs__item">
                    <label for="previous-password" class="inputs__label">Password</label>
                    <input type="password" class="inputs__input" name="password" id="password" placeholder="Password" value="" require/>
                </div>
                <input type="hidden" name="email" value="<?= $_GET['em'] ?>">
                <input type="hidden" name="token" value="<?= $_GET['token']?>">
                <div class="inputs__item inputs__item--new">
                    <label for="confirm" class="inputs__label">Confirm password</label>
                    <input type="password" class="inputs__input" name="confirmpass" id="confirm" placeholder="Confirm" value="" require/>
                </div>
                <div class="inputs__item inputs__item--cta">
                    <input type="submit" class="btn" name="resetpass" value="RESET" />
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function validateMyForm(e) {

        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        let confirm = document.querySelector('#confirm');
        let pass = document.querySelector('#password');
        if (pass.value !== confirm.value) {
            e.preventDefault();
            alert("Confirm password isnot matching");
            return;
        }

        if (!regex.test(confirm.value)) {
            e.preventDefault();
            alert("Minimum eight characters, at least one letter and one number");
            return;
        }
    }
</script>

</html>