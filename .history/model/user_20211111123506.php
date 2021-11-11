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
    public function AccessAccount($firstname, $lastname, $email, $password)
    {
        $sql = self::$connection->prepare("INSERT INTO `tbl_user` (`firstname`, `lastname`, `password`, `email`) 
        VALUES ('$firstname','$lastname','$password','$email')");
        $sql->bind_param('i', 'j', $firstname, $password);
        $sql->execute();
        $row = $sql->get_result()->fetch_all(MYSQLI_ASSOC)[0];
        return $row;
    }
}
