<?php
ini_set("display_errors", "1");
session_start();
require_once "classes/User.php";

$user = new User;
$user->logoutUser();
header("location: index.php");
exit();
