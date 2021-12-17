<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin panel</title>
  <link rel="stylesheet" href="./assets/sass/admin.css" />
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
        <li class="hovered">
          <a href="index">
            <span class="icon">
              <ion-icon name="color-palette-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="people-outline"></ion-icon>
            </span>
            <span class="title">Customers</span>
          </a>
        </li>
        <li>
          <a href="javascript:goto('product.php');">
            <span class="icon">
              <ion-icon name="paw-outline"></ion-icon>
            </span>
            <span class="title">Products</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="chatbox-outline"></ion-icon>
            </span>
            <span class="title">Messenger</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Settings</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="keypad-outline"></ion-icon>
            </span>
            <span class="title">Password</span>
          </a>
        </li>
        <li>
          <a href="#">
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