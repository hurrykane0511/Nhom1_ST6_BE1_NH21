<?php
include('account.php');
$username   = addslashes($_POST['txtUsername']);
$password   = addslashes($_POST['txtPassword']);
$email      = addslashes($_POST['txtEmail']);
$fullname   = addslashes($_POST['txtFullname']);
$birthday   = addslashes($_POST['txtBirthday']);
$sex        = addslashes($_POST['txtSex']);
