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
$user1 = new User;
$order = new Order;
?>

<div class="wraper">

    <div class="details">
        <table>
            <thead>
                <tr class="table-headers">
                    <th>Customer's ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Sum Order</th>
                </tr>
            </thead>
            <tbody id="orderbody">
                <?php
                foreach ($user1->getAllUser() as $key => $row) {
                ?>
               
                    <tr>
                        <th class="mobile-header">Customer's ID</th>
                        <td><?= $row['user_id'] ?></td>
                        <th class="mobile-header">First name</th>
                        <td><?= $row['firstname'] ?></td>
                        <th class="mobile-header">Last name</th>
                        <td><?= $row['lastname'] ?></td>
                        <th class="mobile-header">Email</th>
                        <td><?= $row['email'] ?></td>
                        <th class="mobile-header">Sum Order</th>
                        <td><?= $order->sumOrderById($row['user_id'])['SumOrder'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include './template/footer.php'; ?>