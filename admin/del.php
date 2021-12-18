<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/categories.php';
include '../model/brand.php';

$cg = new categories();
$pf = new Perfume();
$brands = new Brand();
$rs = false;

if (isset($_GET['delpf']) && !empty($_GET['delpf'])) {
    $rs = $pf->delproduct($_GET['delpf']);
}

if (isset($_GET['delbr']) && !empty($_GET['delbr'])) {
    $rs = $brands->delBrand($_GET['delbr']);
}

if ($rs) {
    header('location: product.php?delrs=1');
} else {
    header('location: product.php?delrs=0');
}
