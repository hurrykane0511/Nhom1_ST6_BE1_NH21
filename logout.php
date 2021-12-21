<?php
session_start();
unset($_SESSION['account']);
unset($_SESSION['access_token']);
header('location: login.php');
