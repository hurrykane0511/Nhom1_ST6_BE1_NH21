<?php
ob_start();
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
$user = new User;
$order = new Order;
?>

<div class="wraper">
  <div class="cardBox">
    <div class="card">
      <div>
        <div class="numbers">£ <?= number_format($order->sumAllPriceOrder()['SumPrice']) ?></div>
        <div class="cardName">Revenue</div>
      </div>
      <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers"><?= $order->CountOrder() ?></div>
        <div class="cardName">Total orders</div>
      </div>
      <div class="iconBx">
        <ion-icon name="cart-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers"><?= $user->CountUser()['num'] ?></div>
        <div class="cardName">Customers</div>
      </div>
      <div class="iconBx">
        <ion-icon name="people-outline"></ion-icon>
      </div>
    </div>

    <div class="card">
      <div>
        <div class="numbers"><?= $pf->getSales()['sumQty'] ?></div>
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
    <div class="filter">
      <label>Search Order: <input type="text" name="order_id" onkeyup="loadorder()"></label>
      <label><input type="radio" name="stt" value="" onchange="loadorder()" checked> All</label>
      <label><input type="radio" name="stt" value="Pending" onchange="loadorder()"> Pending</label>
      <label><input type="radio" name="stt" value="Confirm" onchange="loadorder()"> Confirm</label>
      <label><input type="radio" name="stt" value="Delivery" onchange="loadorder()"> Delivery</label>
      <label><input type="radio" name="stt" value="Delivered" onchange="loadorder()"> Delivered</label>
      <label><input type="radio" name="stt" value="Cancelled" onchange="loadorder()"> Cancelled</label>
    </div>
    <table>
      <thead>
        <tr class="table-headers">
          <th>Order ID</th>
          <th>Customer's ID</th>
          <th>Customer's Name</th>
          <th>Phone contact</th>
          <th>Email</th>
          <th>Order date</th>
          <th>Items</th>
          <th>Total price</th>

          <th>Update</th>
        </tr>
      </thead>
      <tbody id="orderbody">


      </tbody>
    </table>
  </div>
</div>
<script>
  loadorder();
  function loadorder() {
    var xhttp = new XMLHttpRequest();
    const order_id = document.querySelector('input[name="order_id"]').value;
    const stt = document.querySelector('input[name="stt"]:checked').value;
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("orderbody").innerHTML = this.responseText;

      }
    };
    xhttp.open("GET", "loadorder.php?order_id=" + order_id +"&stt=" + stt, true);
    xhttp.send();
  }

  function updatestatus(opt) {

    let text = opt.options[opt.selectedIndex].value;
    let id = text.split('-')[1];
    opt.className = '';
    let status = text.split('-')[0];
    opt.classList.add(status)
    console.log(status, id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhttp.open("GET", "updateorder.php?status=" + status + "&id=" + id, true);
    xhttp.send();

  }
</script>
<?php include './template/footer.php' ?>