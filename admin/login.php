<?php
ob_start();
session_start();
if (isset($_SESSION['admin'])) {
    header('location: index.php');
}

if(isset($_GET['rs'])){
    if($_GET['rs'] == 1)
    {
       echo '<script>alert("User account or password incorrect !!!")</script>';
    }
    elseif($_GET['rs'] == 2){
        echo '<script>alert("Both field is required !!!")</script>';
    }else{
        echo '<script>alert(" login required !!!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/sass/admin.css">
</head>

<body>

    <div id="admin-login-form">

        <form action="index.php" method="POST">

            <h2>Admin Login</h2>

            <input type="text" name="username" class="text-field" placeholder="Username" />
            <input type="password" name="password" class="text-field" placeholder="Password" />
            <input type="submit" name="admin-login" class="button" value="Log In" />

        </form>

    </div>
</body>

</html>