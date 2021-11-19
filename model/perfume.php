<?php

class Perfume extends Db
{

    public function get()
    {
        
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
            $sql = self::$connection->prepare("select * from `tbl_perfume` left join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id` order by `sales_qty` limit 10");
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
            $sql = self::$connection->prepare("SELECT * FROM `tbl_perfume` where `pf_id` = ?");
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
}
