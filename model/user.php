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
            return $items;
        } catch (Exception $e) {
            return false;
        }
    }

    public function CheckResetPass($email, $token)
    {
        $sql = self::$connection->prepare("SELECT * FROM `reset_pass` WHERE ? = `m_email` and `m_token` = ? and ? - `m_time` < 120");

        $time = time();
        $sql->bind_param("ssi", $email, $token, $time);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function UpdatePass($email, $password)
    {
        $sql = self::$connection->prepare(" update tbl_user set password = ? where email = ?");
        $email = base64_decode($email);
        $realemail = mysqli_real_escape_string(self::$connection, $email);
        $realpass = mysqli_real_escape_string(self::$connection, $password);
        $passmd5 = md5($realpass);
        try{
            $sql->bind_param("ss", $passmd5, $realemail);
            return $sql->execute();
        }
        catch(Exception $err){

        }
    }
    public function ResetPassword($email, $token)
    {
        $sql = self::$connection->prepare("insert into reset_pass (m_email, m_token, m_time)
        values( ? , ? , ? )");
        $time = time();
        try{
            $sql->bind_param("ssi",$email, $token, $time);
            return $sql->execute();
        }
        catch(Exception $err){

        }
    }
    public function adminLogin($user, $pass)
    {
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
        } catch (Exception $e) {
        }
    }

    public function deleteUser($id_User)
    {
        $sql = self::$connection->prepare("DELETE FROM `tbl_user` WHERE `user_id` = ?");
        $sql->bind_param("i", $id_User);
        return $sql->execute();
    }

    public function UpdateUser($first, $last, $email, $pass, $id_User)
    {
        $sql = self::$connection->prepare("UPDATE `tbl_user` SET `firstname`= ?,`lastname`= ? ,`password`= ? ,`email`= ?  WHERE  `user_id`= ?");
        $sql->bind_param("ssssi", $first, $last, $email, $pass, $id_User);

        return $sql->execute();
    }

    public function getAllUser()
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_user` order by `user_id` desc");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items;
        } catch (Exception $e) {
        }
    }

    public function CountUser()
    {
        try {
            $sql = self::$connection->prepare("SELECT COUNT(user_id) as 'num' FROM `tbl_user`");
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
}
