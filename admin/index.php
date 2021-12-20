<?php
session_start();

include './template/header.php';
include '../model/user.php';
include '../model/order.php';

$user;
if (!isset($_SESSION['admin'])) {
  if (isset($_POST["admin-login"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
      header("location: login.php?rs=2");
    } else {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $user = new User();
      $admin = $user->adminLogin($username, $password);
      if ($admin) {
        $_SESSION['admin'] = $admin;
      } else {
        header("location: login.php?rs=1");
      }
    }
  } else {
    header('location: login.php?rs=3');
  }
}

?>

<div class="wraper">
  <div class="cardBox">
    <div class="card">
      <div>
        <div class="numbers">1,504</div>
        <div class="cardName">Daily views</div>
      </div>
      <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers">10,890</div>
        <div class="cardName">Total orders</div>
      </div>
      <div class="iconBx">
        <ion-icon name="cart-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers">340</div>
        <div class="cardName">Customers</div>
      </div>
      <div class="iconBx">
        <ion-icon name="people-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers"><?= $pf->getSales()[0]['sum(sales_qty)'] ?></div>
        <div class="cardName">Sold</div>
      </div>
      <div class="iconBx">
        <ion-icon name="pricetags-outline"></ion-icon>
      </div>
    </div>
  </div>

  <!-- Dashboard_innfor -->
  <!-- <div class="dashboard_infor"> -->

    <!-- Revenue -->
    <!-- <div class="revenue-chart">
      <div class="title-chart">
        <h2>Revenue</h2>
      </div>
      <canvas id="myChart"></canvas>
    </div> -->

    <!-- calendar -->
    <!-- <div class="calendar">

    </div>

  </div> -->
  <!-- End dashboard_infor -->


  <!-- orders details -->
  <div class="details">
  
  </div>
</div>

<?php include './template/footer.php' ?>