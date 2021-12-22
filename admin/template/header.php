<?php
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/brand.php';
include '../model/categories.php';

$pf = new Perfume();
$pf = new Perfume();
$ct = new categories();
$brands = new Brand();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin panel</title>
  <link rel="stylesheet" href="./assets/sass/admin.css" />
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>

<body>

  <div class="container">
    <!-- Navigation -->
    <div class="navigation active">
      <!-- Screen list -->
      <ul>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="cloudy-outline"></ion-icon>
            </span>
            <span class="title logo">Shop</span>
          </a>
        </li>
        <li class="<?=  curr_page("index.php") ? "hovered" : "" ?>">
          <a href="index.php">
            <span class="icon">
              <ion-icon name="color-palette-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li class="<?=  curr_page("user.php") ? "hovered" : "" ?>">
          <a href="user.php">
            <span class="icon">
              <ion-icon name="people-outline"></ion-icon>
            </span>
            <span class="title">Customers</span>
          </a>
        </li>
        <li class="<?=  curr_page("product.php") ? "hovered" : "" ?>">
          <a href="product.php">
            <span class="icon">
              <ion-icon name="paw-outline"></ion-icon>
            </span>
            <span class="title">Products</span>
          </a>
        </li>
     
        <li>
          <a href="logout.php">
            <span class="icon">
              <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">Sign out</span>
          </a>
        </li>
      </ul>
      <!-- End screen list -->
    </div>
    <!-- End navigation -->

    <!-- Main -->
    <div class="main active">

      <!-- Top bar -->
      <div class="topbar">
        <!-- toggle-sidebar -->
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>



        <!-- user-box -->
        <!-- <div class="user">
          <img src="./assets/image/admin.jpg" alt="admin" />
        </div> -->
      </div>
      <!-- end top bar -->