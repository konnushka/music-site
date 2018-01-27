<?php
session_start();
include("autoloader.php");
unset($_SESSION["username"]);
unset($_SESSION["email"]);
//$origin = $_SEVER["HTTP_REFERER"];
header("location: login.php");
?>