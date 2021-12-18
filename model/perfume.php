<?php

class Perfume extends Db
{


    public function InsertPerfume(
        $itemName,
        $gender,
        $capacity,
        $brand,
        $type,
        $range,
        $regular_price,
        $sales_price,
        $image,
        $description
    ) {
        $sql = self::$connection->prepare("INSERT INTO tbl_perfume
        (`pf_name`,`gender`,`regular_price`,`description`,`image`,`brand_id`,`capacity`,`sales_price`,`type_id`,`range_id`) 
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param(
            "ssdssiidii",
            $itemName,
            $gender,
            $regular_price,
            $description,  
            $image,
            $brand,
            $capacity,
            $sales_price,
            $type,
            $range
        );

        return $sql->execute();
    }

    function getSales()
    {
        $sql = self::$connection->prepare("select sum(sales_qty) from tbl_perfume");
        $sql->execute();
        $sum = array();
        $sum = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $sum;
    }

    function getTopSell()
    {
        try {
            $sql = self::$connection->prepare("select * from `tbl_perfume` left join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id` order by `sales_qty` desc limit 10");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    function getAllPerfumes()
    {
        try {
            $sql = self::$connection->prepare("select * from `tbl_perfume` join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id`");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    function getPerfumeByID($id)
    {
        try {
            $sql = self::$connection->prepare("SELECT *  FROM `tbl_perfume` join tbl_brand on tbl_perfume.brand_id = tbl_brand.brand_id where `pf_id` = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    function getPerfumeSearch($keyword)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_perfume` pf join `tbl_brand` br on `pf`.`brand_id` = `br`.`brand_id` WHERE pf.pf_name LIKE ? LIMIT 10");
            $keyword = "%$keyword%";
            $sql->bind_param('s', $keyword);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    function getGender()
    {
        try {
            $sql = self::$connection->prepare("select distinct gender from tbl_perfume");
            $sql->execute();
            $gender = array();
            $gender = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $gender;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
    public function delproduct($id)
    {
        try {
            $sql = self::$connection->prepare("DELETE FROM `tbl_perfume` WHERE `pf_id`= ? ");
            $sql->bind_param("i",intval($id));
          
            return $sql->execute(); //return an array
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
}
