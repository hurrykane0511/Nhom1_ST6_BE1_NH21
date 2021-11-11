<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include './model/perfume.php';
$pf = new Perfume;
?>

<body>

    <?php
    if (isset($_SESSION['account'])) {
        echo "Hello" . $_SESSION['account'];
    }
    ?>

</body>

</html>