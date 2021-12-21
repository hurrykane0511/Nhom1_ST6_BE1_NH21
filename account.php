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

$facebook_output = '';

$fb_helper = $fb->getRedirectLoginHelper();

try {
    if (isset($_GET['code']) && !isset($_SESSION['account'])) {

        if (isset($_SESSION['access_token'])) {
            $access_token =  $_SESSION['access_token'];
        } else {
            $access_token = $fb_helper->getAccessToken();
            $_SESSION['access_token'] = $access_token;
            $fb->setDefaultAccessToken($_SESSION['access_token']);
        }

        $graph_response = $fb->get('/me?fields=first_name,last_name,email', $access_token);
        $fb_user_info = $graph_response->getGraphUser();

        if (!empty($fb_user_info['id'])) {
            $account = $user->Login($fb_user_info['email'], $fb_user_info['id']);
            if ($account) {
                $_SESSION['account'] = $account[0];
            } else {
                $user->AccessAccount($fb_user_info['first_name'],  $fb_user_info['last_name'], $fb_user_info['email'],  $fb_user_info['id']);
                $account = $user->Login($fb_user_info['email'], $fb_user_info['id']);
                $_SESSION['account'] = $account[0];
            }
        }
    } else {
        $fb_permission = ['email'];
    }
} catch (\Throwable $th) {
    header('location: login.php');
}

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
            $_SESSION['account'] = $account[0];
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
                        <p>Hello, <?= $_SESSION['account']['firstname'] . ' ' . $_SESSION['account']['lastname'] ?></p>
                        <a href="logout.php?logoutid=1" class="logout">Log out</a>
                    </div>
                    <div class="order-history">
                        <div class="order-wraper">
                            <div class="history-title">#Order History</div>
                            <?php
                            $order = new Order;
                            if ($order->getOrderByIdUser($_SESSION['account']['user_id'])) {
                            ?>

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

                                        foreach ($order->getOrderByIdUser($_SESSION['account']['user_id']) as $row) {
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
                                                        echo '<a href="cancel.php?order_id=' . $row['order_id'] . '" class="button view">Cancel order</a>';
                                                    } elseif ($row['status'] == 'Cancelled') {
                                                        echo 'Cancelled';
                                                    } else {
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
                            <?php
                            } else {
                            ?>
                                <p class="no-order">You haven't placed any orders yet.</p>
                            <?php
                            }

                            ?>

                        </div>
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