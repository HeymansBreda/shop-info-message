<?php

error_reporting(E_ERROR); 
ini_set("display_errors","Off");
session_start();

session_destroy();
unset($_SESSION);
echo "<script>location.href='login.php';</script>";
?>