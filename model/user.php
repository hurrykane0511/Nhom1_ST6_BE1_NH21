<?php

class User extends Db
{
    public function Login($email, $pass)
    {
        try {

            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` WHERE ? = `email` and ? = `password`");
            $pass1 = mysqli_real_escape_string(self::$connection, $pass);
            $email1 = mysqli_real_escape_string(self::$connection, $email);
            $password = md5($pass1);

            $sql->bind_param("ss", $email1, $password);
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;

        } catch (Exception $e) {
            return false;
        }
    }
    public function AccessAccount($first, $last, $email1, $pass)
    {
        try {
            $sql = self::$connection->prepare("INSERT INTO `tbl_user` (`firstname`, `lastname`, `password`, `email`) 
        VALUES ( ?, ?, ?, ?);");
            $firstname = mysqli_real_escape_string(self::$connection, $first);
            $lastname = mysqli_real_escape_string(self::$connection, $last);
            $email = mysqli_real_escape_string(self::$connection, $email1);
            $pass1 = mysqli_real_escape_string(self::$connection, $pass);

            $password = md5($pass1);
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

    public function deleteUser($id_User){
        $sql = self::$connection->prepare("DELETE FROM `tbl_user` WHERE `user_id` = ?");
        $sql->bind_param("i", $id_User);
        return $sql->execute();

    }

    public function UpdateUser($first, $last, $email, $pass,$id_User)
    {
        $sql = self::$connection->prepare("UPDATE `tbl_user` SET `firstname`= ?,`lastname`= ? ,`password`= ? ,`email`= ?  WHERE  `user_id`= ?");
        $sql->bind_param("ssssi", $first, $last, $email, $pass,$id_User);

        return $sql->execute();
    }

    public function getAllUser(){
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` order by `user_id` desc");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        } catch (Exception $e) {
           
        }
    }

    public function CountUser(){
        try {
            $sql = self::$connection->prepare("SELECT COUNT(user_id) FROM `tbl_user`");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0][0];
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
}
