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
    public function InsertBrand($brand_name,$brand_image)
    {
        $sql = self::$connection->prepare("INSERT INTO `tbl_brand`
        ( `brand_name`, `brand_image`) 
        VALUES(?,?)");
        $sql->bind_param("ss", $brand_name,$brand_image);

        return $sql->execute();
    }
    public function delBrand($brand_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `tbl_brand` WHERE `brand_id`=?");
        $sql->bind_param("i", $brand_id);
        return $sql->execute();
    }
}