<?php

class User extends Db
{
    public function Login($email, $password)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE ? = `email` and ? = `password`");
            $sql->bind_param("ss", $email, $password);
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

    public function adminLogin($user, $pass){


        try {
            $sql = self::$connection->prepare("SELECT * FROM `admin` WHERE ? = `idadmin` and `password` = ?");

            $username = mysqli_real_escape_string(self::$connection, $user);
            $password = mysqli_real_escape_string(self::$connection, $pass);
            $password1 = md5($password);
            
            $sql->bind_param("ss", $username, $password1);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;

        } catch(Exception $e) {
            
        }
    }
}
