<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/categories.php';
$cg = new categories();
$pf = new Perfume();
# code...
$rs = $cg->delProduct($_GET['id']);
header('location:products.php');
