<?php session_start();
define("header_here", true);
?>
<!DOCTYPE html>
<html lang="en">
<?php
include './Template/head.php';
include './model/config.php';
include './model/dbconnect.php';
include('./model/user.php');
include './model/order.php';
$user = new User;

if (!isset($_SESSION['account'])) {
    if (isset($_POST['signin'])) {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            exit();
        }
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            exit();
        }

        $account = $user->Login($_POST['email'], $_POST['password']);
        if ($account == false) {
            echo 'That bai';
            exit();
        } else {
            $_SESSION['account'] = $account;
        }
    }
}


?>

<body>
    <div class="wraper">
        <div class="wrap">
            <div class="visual-page">
                <?php include './Template/header.php' ?>
                <div class="account-container">
                    <div class="title-area">
                        <h2 class="title">My Account</h2>
                        <a href="logout.php?logoutid=1" class="logout">Log out</a>
                    </div>
                    <div class="order-history">
                        <table class="shop_table my_account_orders">

                            <thead>
                                <tr>
                                    <th class="order-number">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Details</th>
                                    <th class="order-actions">Actions</th>
                                    <th class="order-actions"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $order = new Order;
                                foreach ($order->getOrderByIdUser($_SESSION['account'][0]['user_id']) as $row) {
                                ?>
                                    <tr class="order">
                                        <td class="order-number" data-title="Order">
                                            <a href="*">#<?= $row['order_id'] ?></a>
                                        </td>

                                        <td class="order-date" data-title="Date">
                                            <time datetime="2014-06-12" title="1402562157"><?= $row['ordered_at'] ?></time>
                                        </td>

                                        <td class="order-status" data-title="Status">
                                            <?= $row['status'] ?>
                                        </td>

                                        <td class="order-total" data-title="Total">
                                            <?php
                                            foreach ($order->getAllItemByIdOrder($row['order_id']) as $item) {
                                            ?>
                                                <span class="amount">-<?= $item['pf_name'] ?>Qty(x<?= $item['quantity'] ?>) £<?= $item['item_price'] ?> </span><br>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                        <td class="order-actions" data-title="Action">
                                            <?php
                                            if ($row['status'] == 'Pending') {
                                                echo '<a href="cancel.php?order_id='.$row['order_id'].'" class="button view">Cancel order</a>';
                                            }
                                            elseif ($row['status'] == 'Cancelled') {
                                                echo 'Cancelled';
                                            }
                                            else{
                                                echo "Can't cancel";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./Template/footer.php") ?>
</body>
<script type="module" src="./modules/login.js"></script>

</html>

<?php include './Template/ajax.php' ?>