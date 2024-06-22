<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$user = new User;
$email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
$password = isset($_POST['user_password']) ? $_POST['user_password'] : '';

$response = array();

if ($email !== '' && $password !== '') {
    $result = $user->loginUser($email, $password);
    if ($result === 1) {
        $response['status'] = 'success';
        $response['message'] = 'Login successful';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid credentials';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Please provide login credentials';
}

echo json_encode($response);
