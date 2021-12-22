<?php
ob_start();
session_start();

include './template/header.php';

if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']); 
}
header('location: login.php');