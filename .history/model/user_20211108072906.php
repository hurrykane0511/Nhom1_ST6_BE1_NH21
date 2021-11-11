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
}
