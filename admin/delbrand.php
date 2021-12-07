<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/brand.php';
$pf = new Perfume();
$brands = new Brand();
if(isset($_GET['brand_id'])){
   
    echo $_GET['brand_id'];
   /* $rs=$brands->delBrand($_GET['brand_id']);
    if ($rs) {
        echo "insert thanhcong";
    } else {
        echo "insert thatbai";
    }
    */
    
 }
