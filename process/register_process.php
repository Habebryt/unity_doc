<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;

if (isset($_POST['register'])) {
    // Retrieve form data and sanitize
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirm = $_POST['confirm'];

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
    if (empty($password)) {
        $errors[] = "Password Field Cannot be Empty";
    }
    if (empty($confirm)) {
        $errors[] = "Confirm Password Field Cannot be Empty";
    }
    if ($password !== $confirm) {
        $errors[] = "Confirm Password and Password Do not Match";
    }

    if (empty($errors)) {
        $register = $user->registerUser($firstname, $lastname, $email, $password);
        
        if($register){
            // Registration successful, set user session and redirect to dashboard
            $_SESSION['useronline'] = $register;
            header("location:../employee/dashboard.php");
            exit();
        }
        else{
            // Registration failed, store errors in session and redirect to registration page
            $errors[] = "Registration failed. Please try again.";
            $_SESSION['user_errormsg'] = $errors;
            header("location: ../register.php");
            exit();
        }
    }
    else {
        // Validation errors, store errors in session and redirect to registration page
        $_SESSION['user_errormsg'] = $errors;
        header("location: ../register.php");
        exit();
    }
} else {
    // Visited the page directly
    $_SESSION['user_errormsg'] = "Please complete the form";
    header("location: ../register.php");
    exit();
}
?>
