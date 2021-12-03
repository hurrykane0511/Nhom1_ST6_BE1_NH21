<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
$pf = new Perfume();
if (!isset($_POST['addproduct'])) exit();
$vars = array(
    'itemName',
    'gender',
    'capacity',
    'brand',
    'type',
    'range',
    'regular_price',
    'sales_price',
    'status',
    'create_at',
    'sales_qty',
    'image_src',
    'description'
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
$rs = $pf->InsertPerfume(
    $_POST['itemName'],
    $_POST['gender'],
    $_POST['capacity'],
    $_POST['brand'],
    $_POST['type'],
    $_POST['range'],
    $_POST['regular_price'],
    $_POST['sales_price'],
    $_POST['status'],
    $_POST['create_at'],
    $_POST['sales_qty'],
    $_POST['image_src'],
    $_POST['description']
);

if ($rs) {
    echo "insert thanhcong";
} else {
    echo "insert thatbai";
}
$target_dir = "../assets/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image



$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if (!isset($_POST['addtype'])) exit();
$vars = array(
    'type_name',
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
$rs = $pf->InsertType(
    $_POST['type_name'],
);

if ($rs) {
    echo "insert thanhcong";
} else {
    echo "insert thatbai";
}
