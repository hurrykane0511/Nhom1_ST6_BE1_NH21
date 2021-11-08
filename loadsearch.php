<?php
include './model/dbconnect.php';
include './model/config.php';
include './model/perfume.php';

$pf = new Perfume();

if (isset($_GET['kw'])) {
    $result = $pf->getPerfumeSearch($_GET['kw']);
?>

<?php
} ?>