<?php
ini_set("display_errors", "1");
require_once "../classes/User.php";
require_once "../employee_guard.php";
session_start();

$update = new User;

$errorMessage = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $uploadedImage = $_FILES['profile-image'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $id = $_POST['id'];

    // Call profileUpdate function
    $updateResult = $update->profileUpdate($username, $firstname, $lastname, $uploadedImage, $phone, $country, $state, $zip, $id);

    // Set error message if update failed
    if (!$updateResult) {
        $errorMessage = "An error occurred while updating your profile.";
    } else {
        // Redirect to success page or do any other necessary actions
        header("Location: ../profile.php");
        exit();
    }
}


