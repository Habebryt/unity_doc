<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;

$email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
$password = isset($_POST['user_password']) ? $_POST['user_password'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $email !== '' && $password !== '') {
    $result = $user->loginUser($email, $password);

    if ($result === 1) {
        header("Location: ../employee/dashboard.php");
        exit();
    } else {
        $_SESSION['admin_errormsg'] = '<div class="alert alert-danger"> Invalid Credentials </div>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['admin_errormsg'] = '<div class="alert alert-warning">Provide Login Credentials</div>';
}
header("Location: ../login.php");
exit();
