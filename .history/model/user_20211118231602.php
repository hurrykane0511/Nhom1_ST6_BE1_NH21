<?php

class User extends Db
{
    public function Login($email, $password)
    {
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

    public function CheckEmail($firstname, $lastname, $email, $password)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE `email`= ?");
            $sql->bind_param("s", $email);
            return $sql->execute();
        } catch (Exception $e) {
            return false;
        }
    }
}