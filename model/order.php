<?php
class Order extends Db
{
    public function Checkout(
        $firstname,
        $lastname,
        $address,
        $city,
        $state,
        $postzip,
        $phone,
        $email,
        $user_id,
        $payment_id
    ) {

        $sql = self::$connection->prepare("INSERT INTO `tbl_order` (`firstname`, `lastname`, `address`, `city`, `state`, `postzip`, `phone`, `email`,`user_id`, `payment_id`) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param(
            "ssssssssii",
            $firstname,
            $lastname,
            $address,
            $city,
            $state,
            $postzip,
            $phone,
            $email,
            $user_id,
            $payment_id
        );

        return $sql->execute();
    }

    public function OrderItem($quantity, $order_id, $pf_id, $item_price)
    {
        $sql = self::$connection->prepare("INSERT INTO `tbl_orderitem`
        (`quantity`, `order_id`, `pf_id`, `item_price`) 
        VALUES(?, ?, ?, ?)");
        $sql->bind_param("iiii", $quantity, $order_id, $pf_id, $item_price);

        return $sql->execute();
    }

    public function getOrderByIdUser($id_User)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM tbl_order join tbl_user on tbl_user.user_id = tbl_order.user_id  where tbl_order.user_id = ? order by tbl_order.order_id desc");
            $sql->bind_param('i', $id_User);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }


    public function getAllItemByIdOrder($id_Order)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM tbl_order join tbl_orderitem on tbl_orderitem.order_id = tbl_order.order_id join tbl_perfume on tbl_perfume.pf_id = tbl_orderitem.pf_id WHERE tbl_orderitem.order_id = ? ");
            $sql->bind_param('i', $id_Order);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }

    public function getAllOrder()
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM tbl_order join tbl_user on tbl_user.user_id = tbl_order.user_id join tbl_orderitem on tbl_orderitem.order_id = tbl_order.order_id join tbl_perfume on tbl_perfume.pf_id = tbl_orderitem.pf_id order by ordered_at desc");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    public function getAllOrder2($stt)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM tbl_order 
            join tbl_user on tbl_user.user_id = tbl_order.user_id where tbl_order.status = ?
            order by ordered_at desc limit 10");
            $sql->bind_param('s', $stt);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    public function getAllOrder3($id, $stt)
    {
        try {
            $sql = self::$connection->prepare("SELECT distinct * FROM tbl_order 
            join tbl_user on tbl_user.user_id = tbl_order.user_id where tbl_order.order_id like ? and tbl_order.status = ?
            order by ordered_at desc limit 10");
             $keyword = "%$id%";
             $sql->bind_param('ss', $keyword, $stt);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    public function CountOrder()
    {
        try {
            $sql = self::$connection->prepare(" SELECT COUNT(order_id) as 'order' FROM `tbl_order`");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0]['order'];
            return $row;
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function UpdateStatus($status, $id_Order)
    {

        $sql = self::$connection->prepare("update tbl_order set
        `status` = ?  where order_id = ?");
        $sql->bind_param("si", $status, $id_Order);

        return $sql->execute();
    }

    public function getOrder_Id($user_id)
    {

        try {
            $sql = self::$connection->prepare("SELECT order_id FROM `tbl_order` WHERE user_id = ? order by order_id DESC LIMIT 1");
            $sql->bind_param('i', $user_id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
    public function getAllOrder1($id)
    {
        try {
            $sql = self::$connection->prepare("SELECT distinct * FROM tbl_order 
            join tbl_user on tbl_user.user_id = tbl_order.user_id where tbl_order.order_id like ? 
            order by ordered_at desc limit 10");
             $keyword = "%$id%";
            $sql->bind_param('s', $keyword);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }

    public function getAllOrder4()
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM tbl_order 
            join tbl_user on tbl_user.user_id = tbl_order.user_id
            order by ordered_at desc");
           
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    public function getQuantilyOrder()
    {
        try {
            $sql = self::$connection->prepare("SELECT SUM(quantity) as 'SumQuantity' FROM `tbl_orderitem` join tbl_order on tbl_orderitem.order_id = tbl_order.order_id WHERE tbl_order.status = 'Delivered'");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
           
        }
    }

    public function sumPriceOrder($order_id)
    {
        try {
            $sql = self::$connection->prepare("SELECT SUM(item_price) as 'SumPrice' FROM `tbl_orderitem` WHERE order_id = ?");
            $sql->bind_param('i', $order_id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
           
        }
    }

    public function sumAllPriceOrder()
    {
        try {
            $sql = self::$connection->prepare("SELECT SUM(item_price) as 'SumPrice' FROM `tbl_orderitem`");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
           
        }
    }

    public function sumOrderById($user_id)
    {
        try {
            $sql = self::$connection->prepare("SELECT count(order_id) as 'SumOrder' FROM `tbl_order` WHERE user_id = ?");
            $sql->bind_param('i', $user_id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
           
        }
    }
}