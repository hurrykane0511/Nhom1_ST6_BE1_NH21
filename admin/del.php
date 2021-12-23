<?php
ob_start();
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: product.php?delrs=0');
}
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

if (isset($_GET['deltype']) && !empty($_GET['deltype'])) {
    $rs = $cg->delType($_GET['deltype']);
}

if (isset($_GET['delrange']) && !empty($_GET['delrange'])) {
    $rs = $cg->delRange($_GET['delrange']);
}

if ($rs) {
    header('location: product.php?delrs=1');
} else {
    header('location: product.php?delrs=0');
}
