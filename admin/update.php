<?php
ob_start();
session_start();
if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}

include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/categories.php';
include '../model/brand.php';

$cg = new categories();
$pf = new Perfume();
$brands = new Brand;

if (isset($_POST['updateproduct'])) {
    $vars = array(
        'pf_name',
        'gender',
        'capacity',
        'brand',
        'type',
        'range',
        'regular_price',
        'sales_price',
        'description',
        'status',
        'pf_id'
    );

    $verified = TRUE;

    foreach ($vars as $v) {
        if (!isset($_POST[$v])) {
            $verified = FALSE;
            header('location: product.php?uprs=0');
            exit();
        }
    }


    $target_dir = "../assets/images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (file_exists($target_file)) {
        
    }


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
 
        $uploadOk = 1;
    } else {

        $uploadOk = 0;
    }



    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
      
        $uploadOk = 0;
        exit();
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif"
    ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // header("location: product.php");
        } else {
        }
    }
    $imgsrc = $pf->getPerfumeByID($_POST['pf_id'])['image'];
    $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $type = pathinfo($_FILES['image']['type'], PATHINFO_FILENAME);

    $final = '';

    if (empty($filename)) {
        $final = $imgsrc;
    }
    else{
        $final = $filename . '.' . $type;
    }

    $pf = new Perfume();

    $rs = $pf->UpdatePerfume(
        $_POST['pf_name'],
        $_POST['gender'],
        $_POST['capacity'],
        $_POST['brand'],
        $_POST['type'],
        $_POST['range'],
        $_POST['regular_price'],
        $_POST['sales_price'],
        $final,
        $_POST['description'],
        $_POST['status'],
        $_POST['pf_id']
    );

    if ($rs) {
        header('location: product.php?uprs=1');
    } else {
        header('location: product.php?uprs=0');
    }
}

if (isset($_POST['updatebrand'])) {
    if (!isset($_POST['brand_name']) || empty($_POST['brand_name'])) {
        header('location: product.php?uprs=0');
        exit();
    }



    $target_dir = "../assets/images/brands/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    if (file_exists($target_file)) {
        header('location: product.php?uprs=0');
        exit();
        $uploadOk = 0;
    }


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        header('location: product.php?uprs=0');
        exit();
        $uploadOk = 0;
    }



    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        header('location: product.php?uprs=0');
        exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif"
    ) {

        echo "<script>alert(' !!!');
        history.go(-1);</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            header("location: index.php");
        } else {
            echo "<script>alert('Upload data failed !!!');
            history.go(-1);</script>";
        }
    }

    $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $type = pathinfo($_FILES['image']['type'], PATHINFO_FILENAME);

    $rs = $brands->InsertBrand(
        $_POST['brand_name'],
        $filename . '.' . $type
    );
    if ($rs) {
        header('location: product.php?uprs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}


if (isset($_POST['updatetype'])) {
    $verified = TRUE;

    if (!isset($_POST['type_name']) || empty($_POST['type_name'])) {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
        exit();
    }
    if (!isset($_POST['type_id']) || empty($_POST['type_id'])) {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
        exit();
    }
    $rs = $cg->UpdateType(
        $_POST['type_name'],
        $_POST['type_id']
    );

    if ($rs) {
        header('location: product.php?uprs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}


if (isset($_POST['updaterange'])) {
    $verified = TRUE;

    if (!isset($_POST['range_name']) || empty($_POST['range_name'])) {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
    if (!isset($_POST['range_id']) || empty($_POST['range_id'])) {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }

    $rs = $cg->InsertRange(
        $_POST['range_name'],
        $_POST['range_id']
    );

    if ($rs) {
        header('location: product.php?uprs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}
