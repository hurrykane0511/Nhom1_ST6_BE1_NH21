<?php
class Brand extends Db{
    function getAllBrand()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_brand order by brand_id desc");
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

    public function Update($brand_name,$brand_image, $brand_id)
    {
        $sql = self::$connection->prepare("UPDATE `tbl_brand` set 
        `brand_name` = ?, `brand_image` = ? where brand_id = ?");
        $sql->bind_param("ssi", $brand_name,$brand_image, $brand_id);

        return $sql->execute();
    }
    public function delBrand($brand_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `tbl_brand` WHERE `brand_id`=?");
        $sql->bind_param("i", $brand_id);
        return $sql->execute();
    }
    function getAllBrandLiMit()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_brand LIMIT 15");
        $sql->execute();
        $brands = array();
        $brands = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $brands;
    }
    function getBrandById($brand_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_brand where `brand_id`=? ");
        $sql->bind_param("i", $brand_id);
        $sql->execute();
        $brands = array();
        $brands = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $brands;
    }
}