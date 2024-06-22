<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;

$email = $_POST['user_email'];
$org = $_POST['user_org'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $email !== '' && $org !== '') {
    // Retrieve form data and sanitize
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email;
    $org;
    $password = $_POST['user_password'];

    // Validate form fields 
    $errors = [];
    if (empty($firstname)) {
        $errors[] = "Firstname Field Cannot be Missing";
    }
    if (empty($lastname)) {
        $errors[] = "Lastname Field Cannot be Missing";
    }
    if (empty($email)) {
        $errors[] = "Email Field Cannot be Empty";
    }
    if (empty($org)) {
        $errors[] = "Select Organization";
    }
    if (empty($password)) {
        $errors[] = "Password Field Cannot be Empty";
    }

    if (empty($errors)) {
        $register = $user->registerUser($firstname, $lastname, $email, $password, $org);

        if ($register) {
            // Registration successful, set user session and redirect to dashboard
            $_SESSION['useronline'] = $register;
            $_SESSION['user_welcome'] = '<div class="alert alert-success">Welcome to UnityDocs "$firstname"</div>';
            header("location: ../dashboard.php");
            exit();
        } else {
            // Registration failed, store errors in session and redirect to registration page
            $errors[] = "Registration failed. Please try again.";
            $_SESSION['user_errormsg'] = $errors;
            header("location: ../index.php");
            exit();
        }
    } else {
        // Validation errors, store errors in session and redirect to registration page
        $_SESSION['user_errormsg'] = $errors;
        header("location: ../index.php");
        exit();
    }
} else {
    // Visited the page directly
    $_SESSION['user_errormsg'] = "Please complete the form";
    header("location: ../index.php");
    exit();
}
