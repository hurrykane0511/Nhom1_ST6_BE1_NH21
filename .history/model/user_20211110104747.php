<?php

class User extends Db
{
    public  $firstname;
    public  $lastname;
    public  $email;
    public  $password;
    public function __construct($firstname, $lastname, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
    }
    function AccessAccount($id)
    {
        try {
            $sql = self::$connection->prepare("SELECT * FROM `tbl_perfume` where `pf_id` = ?");
            $sql->bind_param('i', $id);
            $sql->execute();
            $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
            return $row;
        } catch (mysqli_sql_exception $e) {
            echo "Lỗi: " . $e;
        }
    }
}
