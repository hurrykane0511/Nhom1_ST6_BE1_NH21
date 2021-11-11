<?php 

class Perfume extends Db{
    function getTopSell(){
        try{
            $sql = self::$connection->prepare("select * from `tbl_perfume` left join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id` order by `sold` limit 10");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        catch(mysqli_sql_exception $e){
            echo "Lỗi: ".$e;
        }
    }
    function getAllPerfumes(){
        try{
            $sql = self::$connection->prepare("select * from `tbl_perfume` join `tbl_brand` on tbl_perfume.`brand_id`=`tbl_brand`.`brand_id`");
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
            $sql = self::$connection->prepare("SELECT * FROM `tbl_perfume` where `pf_id` = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        }
        catch(mysqli_sql_exception $e){
            echo "Lỗi: ".$e;
        }
    }
    function getPerfumeSearch($keyword)
    {
        try{
            $sql = self::$connection->prepare("SELECT `pf_id`, `pf_name`, `gender`, `regular_price`, `description`, `created_at`, `image`, `active`, `sold`, `capacity`, `sales_price` , `tbl_brand`.`brand_name` FROM `tbl_perfume`join `tbl_brand` on `tbl_perfume`.`brand_id` = `tbl_brand`.`brand_id` WHERE `tbl_perfume`.`pf_name` LIKE ? LIMIT 10");
            $keyword = "%$keyword%";
            $sql->bind_param('s', $keyword);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        }
        catch(mysqli_sql_exception $e){
            echo "Lỗi: ".$e;
        }
    }
}
