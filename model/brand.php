<?php
class Brand extends Db{
    function getAllBrand()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_brand;");
        $sql->execute();
        $brands = array();
        $brands = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $brands;
    }
}