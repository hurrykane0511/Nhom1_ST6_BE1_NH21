<!-- Card-Box -->

<?php 
include '../model/config.php';
include '../model/dbconnect.php';
include '../model/perfume.php';
include '../model/brand.php';

$pf = new Perfume();

?>
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
            <div class="numbers"><?= $pf->getSales()[0]['sum(sales_qty)']?></div>
            <div class="cardName">Sold</div>
        </div>
        <div class="iconBx">
            <ion-icon name="pricetags-outline"></ion-icon>
        </div>
    </div>
</div>

<!-- Dashboard_innfor -->
<div class="dashboard_infor">

    <!-- Revenue -->
    <div class="revenue-chart">
        <div class="title-chart">
            <h2>Revenue</h2>
        </div>
        <canvas id="myChart"></canvas>
    </div>

    <!-- calendar -->
    <div class="calendar">
      
    </div>

</div>
<!-- End dashboard_infor -->


<!-- orders details -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <table class="ordersTable">
            <thead>
                <tr>
                    <td>Name</td>
                    <td class="price">Price</td>
                    <td class="payment">Payment</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status canceled">Canceled</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status delivering">Delivering</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status canceled">Canceled</span></td>
                </tr>
                <tr>
                    <td>Perfume</td>
                    <td class="price">120</td>
                    <td class="payment">Paid</td>
                    <td><span class="status delivering">Delivering</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Recent Customers</h2>
        </div>
        <table>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="./assets/image/admin.jpg" alt="" />
                    </div>
                </td>
                <td>
                    <h4>Son Tung MTP</h4>
                </td>
                <td></td>
            </tr>
        </table>
    </div>
</div>