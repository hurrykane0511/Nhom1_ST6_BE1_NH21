<?php
class categories extends Db
{
    function getAllType()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tbl_type`");
        $sql->execute();
        $Types = array();
        $Types = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $Types;
    }
    function getAllRange()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_range");
        $sql->execute();
        $Ranges = array();
        $Ranges = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return  $Ranges;
    }
}
