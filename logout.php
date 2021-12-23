<?php

ob_start();
session_start();

unset($_SESSION['account']);
unset($_SESSION['access_token']);
unset($_SESSION['FBRLH_state']);
header('location: login.php');
