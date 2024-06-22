<?php
ini_set("display_errors", "1");
session_start();

require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;

$email = isset($_POST['admin_email']) ? $_POST['admin_email'] : '';
$password = isset($_POST['admin_password']) ? $_POST['admin_password'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($email !== '' && $password !== '') {
        $result = $user->loginUser($email, $password);
        if ($result === 1) {
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['admin_errormsg'] = '<div class="alert alert-danger" style="color: red;">Invalid Credentials</div>';
        }
    } else {
        $_SESSION['admin_errormsg'] = '<div class="alert alert-warning" style="color: red;">Provide Login Credentials</div>';
    }
    // Redirect back to the login page with an error message
    header("Location: ../index.php");
    exit();
} else {
    // Redirect to login page if the request method is not POST
    header("Location: ../index.php");
    exit();
}
