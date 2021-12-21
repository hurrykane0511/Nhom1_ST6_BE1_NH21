<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/categories.php';
include '../model/user.php';
include '../model/brand.php';
require '../phpmailer/PHPMailerAutoload.php';
include '../model/subscribe.php';


if (!isset($_SESSION['admin'])) {
    header('location: login.php?rs=3');
}

$cg = new categories();
$pf = new Perfume();
$brands = new Brand;
$sb = new Subscriber;

if (isset($_POST['addproduct'])) {

    $vars = array(
        'pf_name',
        'gender',
        'capacity',
        'brand',
        'type',
        'range',
        'regular_price',
        'sales_price',
        'description'
    );

    $verified = TRUE;

    foreach ($vars as $v) {
        if (!isset($_POST[$v])) {
            $verified = FALSE;
            echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
           
            exit();
        }
    }


    $target_dir = "../assets/images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (file_exists($target_file)) {
        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
        exit();
    }


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
        $uploadOk = 0;
        exit();
    }



    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
        $uploadOk = 0;
        exit();
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif"
    ) {

        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
        $uploadOk = 0;
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        } else {
            echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
            exit();
        }
    }

    $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $type = pathinfo($_FILES['image']['type'], PATHINFO_FILENAME);

    $pf = new Perfume();

    $rs = $pf->InsertPerfume(
        $_POST['pf_name'],
        $_POST['gender'],
        $_POST['capacity'],
        $_POST['brand'],
        $_POST['type'],
        $_POST['range'],
        $_POST['regular_price'],
        $_POST['sales_price'],
        $filename . '.' . $type,
        $_POST['description']
    );

    if ($rs) {

        $subject  = 'Notifiction';
        $message  = 'Hi, ' . "don't forget about us.. We just got a new product: " . $_POST['pf_name'] . "<br>";
        $mail = new PHPMailer;
        $sb = new Subscriber();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = EMAILID;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom(EMAILID, "Thai Son");
        $mail->IsSMTP(true);
        $mail->addReplyTo(EMAILID);
        $mail->SMTPDebug = 3;
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        foreach ($sb->getSubscriber()  as $row) {
            $mail->addAddress($row['email']);
            if (!$mail->send()) {
            } else {
            }
        }

        $user = new User;
        foreach ($user->getAllUser() as $row) {
            $mail->addAddress($row['email']);
            if (!$mail->send()) {
            } 
            else {
                
            }
        }
    } 
    else {
        echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
    }
    echo "<script>window.location.replace('http://localhost/Nhom1_ST6_BE1_NH21/admin/product.php?addrs=0');</script>";
}

if (isset($_POST['addbrand'])) {

    $verified = TRUE;

    if (!isset($_POST['brand_name']) || empty($_POST['brand_name'])) {
        echo "<script>alert('Empty field's name.');history.go(-1);</script>";
        exit();
    }

    $target_dir = "../assets/images/brands/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (file_exists($target_file)) {
        echo "<script>alert('Sorry, file not exists.');history.go(-1);</script>";
        exit();
    }


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');history.go(-1);</script>";
        $uploadOk = 0;
        exit();
    }



    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large !!!');
        history.go(-1);</script>";
        $uploadOk = 0;
        exit();
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif"
    ) {

        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed !!!');
        history.go(-1);</script>";
        $uploadOk = 0;
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Upload file failed !!!');
        history.go(-1);</script>";
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            header("location: index.php");
        } else {
            // echo "<script>alert('Sorry, there was an error uploading your file !!!');
            // history.go(-1);</script>";
            exit();
        }
    }

    $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
    $type = pathinfo($_FILES['image']['type'], PATHINFO_FILENAME);

    $rs = $brands->InsertBrand(
        $_POST['brand_name'],
        $filename . '.' . $type
    );
    if ($rs) {
        header('location: product.php?addrs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}


if (isset($_POST['addtype'])) {
    $verified = TRUE;

    if (!isset($_POST['type_name']) || empty($_POST['type_name'])) {
        $verified = FALSE;
    }

    $rs = $cg->InsertType(
        $_POST['type_name'],
    );

    if ($rs) {
        header('location: product.php?addrs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}


if (isset($_POST['addrange'])) {
    $verified = TRUE;

    if (!isset($_POST['range_name']) || empty($_POST['range_name'])) {
        $verified = FALSE;
    }

    $rs = $cg->InsertRange(
        $_POST['range_name'],
    );

    if ($rs) {
        header('location: product.php?addrs=1');
    } else {
        echo "<script>alert('Upload data failed !!!');
        history.go(-1);</script>";
    }
}
