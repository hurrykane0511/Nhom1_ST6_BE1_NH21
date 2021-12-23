<?php
class Subscriber extends Db
{
    function getSubscriber()
    {
        $sql = self::$connection->prepare("SELECT * FROM tbl_subscriber order by sb_id desc");
        $sql->execute();
        $sbs = array();
        $sbs = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $sbs;
    }
    function InsertSB($email)
    {
        try {
            $sql = self::$connection->prepare("INSERT INTO tbl_subscriber(email) values( ? )");
            $sql->bind_param('s', $email);
            return $sql->execute();
        } 
        catch (Exception $er) {
            
        }
    }
    
}
