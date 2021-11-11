<?php

class User extends Db
{
    $firstname  = trim($_POST['firstname']);
    $lastname   = trim($_POST['lastname']);
    $email      = trim($_POST['email']);
    $password  = trim($_POST['password']);

}
