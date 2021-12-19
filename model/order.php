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
        $sql = self::$connection->prepare("INSERT INTO `tbl_order`
        (`firstname`, `lastname`, `address`, `city`, `state`, `postzip`, `phone`, `email`,`user_id`, `payment_id`) 
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

    public function OrderItem($quantity,$order_id,$pf_id,$item_price){
        $sql = self::$connection->prepare("INSERT INTO `tbl_orderitem`
        (`quantity`, `order_id`, `pf_id`, `item_price`) 
        VALUES(?, ?, ?, ?)");
        $sql->bind_param("iiii",$quantity,$order_id,$pf_id,$item_price);

        return $sql->execute();
    }

    public function getOrderByIdUser($id_User)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM db_fragranceshop.tbl_order join tbl_user on tbl_user.user_id = tbl_order.user_id join tbl_orderitem on tbl_orderitem.order_id = tbl_order.order_id join tbl_perfume on tbl_perfume.pf_id = tbl_orderitem.pf_id where tbl_order.user_id = ?");
            $sql->bind_param('i', $id_User);
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
            $sql = self::$connection->prepare("SELECT * FROM db_fragranceshop.tbl_order join tbl_user on tbl_user.user_id = tbl_order.user_id join tbl_orderitem on tbl_orderitem.order_id = tbl_order.order_id join tbl_perfume on tbl_perfume.pf_id = tbl_orderitem.pf_id order by tbl_order.order_id desc");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }

    public function CountOrder(){
        try {
            $sql = self::$connection->prepare(" SELECT COUNT(order_id) FROM `tbl_order` WHERE status = 'deliveried'");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0][0];
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }

    public function UpdateStatus($status,$id_Order){

        $sql = self::$connection->prepare("update tbl_order set
        `status` = ?  where order_id = ?");
        $sql->bind_param("si",$status,$id_Order);

        return $sql->execute();
    }
}
