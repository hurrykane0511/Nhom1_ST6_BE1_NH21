<?php 

class Perfume extends Db{
    function getAllPerfume(){
        try{
            $sql = self::$connection->prepare("SELECT * FROM tbl_perfume join tbl_brand on tbl_brand_brand_id = brand_id");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        catch(mysqli_sql_exception $e){
            echo "Lỗi: ".$e;
        }
    }
    function getPerfumeByID($id){
        try{
            $sql = self::$connection->prepare("SELECT * FROM `tbl_perfume` where `perfume_id` = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        }
        catch(mysqli_sql_exception $e){
            echo "Lỗi: ".$e;
        }
    }
}