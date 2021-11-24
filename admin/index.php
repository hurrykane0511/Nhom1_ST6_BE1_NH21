<?php session_start();
 ?>
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
            <span class="title logo">The Fragance Shop</span>
          </a>
        </li>
        <li class="hovered">
          <a href="javascript:goto('dashboard.php')">
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

    <!-- Main -->
    <div class="main active">
      <!-- Top bar -->
      <div class="topbar">
        <!-- toggle-sidebar -->
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>

        <!-- search-box -->
        <div class="search">
          <label>
            <input type="text" placeholder="Search here" />
            <ion-icon name="search-outline"></ion-icon>
          </label>
        </div>

        <!-- user-box -->
        <div class="user">
          <img src="./assets/image/admin.jpg" alt="admin" />
        </div>
      </div>
      <!-- end top bar -->

      <div class="wraper">

      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  goto("dashboard.php");

  function onPopup() {
    document.querySelector(".popup-template").classList.add("active");
  }
  function close_pop(){
    document.querySelector(".popup-template").classList.remove("active");
  }
  function goto(url) {

    var xmlhttp = new XMLHttpRequest();
  
    xmlhttp.onreadystatechange = function() {
      document.querySelector(".wraper").innerHTML = this.responseText;
      loadchart();
    };

    xmlhttp.open("GET", url, true);
    xmlhttp.setRequestHeader("X-Requested-With","d5as45zxc475z48ad8")
    xmlhttp.send();
   
    // setTimeout(loadchart,300)
  }

  function loadchart() {
    if (document.querySelector("#myChart")) {
      const labels = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "June",
        "July",
        "Aug",
        "Sept",
        "Oct",
        "Nov",
        "Dec",
      ];

      const revenue = {
        labels,
        datasets: [{
            backgroundColor: "#FF00E4",
            borderWidth: 1,
            borderColor: "#FF00E4",
            label: "This Year",
            data: [100, 300, 250, 400, 350, 325, 380, 425, 450, 435, 366, 388],
          },
          {
            backgroundColor: "#FF9300",
            borderWidth: 1,
            borderColor: "#FF9300",
            label: "Last Year",
            data: [250, 200, 240, 390, 250, 425, 380, 225, 420, 350, 488, 300],
          },
        ],
      };
      const config = {
        type: "line",
        data: revenue,
        options: {
          responsive: true
        },
      };
      new Chart(document.getElementById("myChart"), config);
    }


  }
</script>
<script src="./assets/js/calendar.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="./assets/js/index.js"></script>

</html>