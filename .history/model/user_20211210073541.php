<?php

class User extends Db
{
    public function Login($email, $password)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE ? = `email` and ? = `password`");
            $sql->bind_param("ss", $password, $email);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items[0];
        } catch (Exception $e) {
            return null;
        }
    }
    public function AccessAccount($firstname, $lastname, $email, $password)
    {
        try {
            $sql = self::$connection->prepare("INSERT INTO `tbl_user` (`firstname`, `lastname`, `password`, `email`) 
        VALUES ( ?, ?, ?, ?);");
            $sql->bind_param("ssss", $firstname, $lastname,  $password, $email);
            return $sql->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    public function CheckEmail($email)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE ? = `email`");
            $sql->bind_param("s", $email);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items == null;
        } catch (Exception $e) {
            return false;
        }
    }
    public function checkLogin($email, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE ? = `email` and ? = `password`");
        $password = md5($password);
        $sql->bind_param("ss", $password, $email);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($items == 1) {
            # code...
            return true;
        } else {
            return false;
        }
    }
}
