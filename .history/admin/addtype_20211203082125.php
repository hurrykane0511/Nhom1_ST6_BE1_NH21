<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/categories.php';
$cg = new categories();
$pf = new Perfume();
if (!isset($_POST['addtype'])) exit();
$vars = array(
    'type_name'
);
$verified = TRUE;

foreach ($vars as $v) {
    if (!isset($_POST[$v]) || empty($_POST[$v])) {
        $verified = FALSE;
    }
    echo $_POST[$v] . '<br>';
}

if (!$verified) {
    echo "Invalid input";
    exit();
}
$rs = $cg->InsertType(
    $_POST['type_name'],
);

if ($rs) {
    echo "insert thanhcong";
} else {
    echo "insert thatbai";
}
