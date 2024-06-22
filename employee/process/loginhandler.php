<?php
ini_set("display_errors", "1");
session_start();

require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;

$email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
$password = isset($_POST['user_password']) ? $_POST['user_password'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $email !== '' && $password !== '') {
    $result = $user->loginUser($email, $password);

    if ($result === 1) {
        $successMessage = "Welcome Back to UnityDocs..";
        $_SESSION["login_success"] = $successMessage;
        header("Location: ../dashboard.php");
        exit();
    } else {
        $_SESSION['user_errormsg'] = '<div class="alert alert-danger">Invalid Login Credentials</div>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_errormsg'] = '<div class="alert alert-warning">Provide Login Credentials</div>';
}

header("Location: ../index.php");
exit();
