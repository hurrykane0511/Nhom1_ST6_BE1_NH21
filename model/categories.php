<?php
class categories extends Db
{
    function getAllType()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tbl_type` order by type_id desc");
        $sql->execute();
        $Types = array();
        $Types = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $Types;
    }
    function getAllRange()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_range order by range_id desc");
        $sql->execute();
        $Ranges = array();
        $Ranges = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return  $Ranges;
    }
    public function InsertType($type_name)
    {
        $sql = self::$connection->prepare("INSERT INTO tbl_type
        (`type_name`) 
        VALUES(?)");
        $sql->bind_param("s", $type_name);

        return $sql->execute();
    }
    public function UpdateType($type_name, $typeid)
    {
        $sql = self::$connection->prepare("update tbl_type set
        `type_name` = ?  where type_id = ?");
        $sql->bind_param("si", $type_name, $typeid);

        return $sql->execute();
    }

    public function UpdateRange($type_name, $typeid)
    {
        $sql = self::$connection->prepare("update tbl_range set
        `range_name` = ?  where range_id = ?");
        $sql->bind_param("si", $type_name, $typeid);

        return $sql->execute();
    }
    
    public function InsertRange($type_name)
    {
        $sql = self::$connection->prepare("INSERT INTO tbl_range
        (`range_name`) 
        VALUES(?)");
        $sql->bind_param("s", $type_name);

        return $sql->execute();
    }

    public function delType($id)
    {

        $sql = self::$connection->prepare("DELETE FROM `tbl_type` WHERE `type_id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();

    }
    public function delRange($id)
    {
        
        $sql = self::$connection->prepare("DELETE FROM `tbl_range` WHERE `range_id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();

    }
}
