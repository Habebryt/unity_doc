<?php
session_start();
ini_set('display_errors', '1');
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$id = $_SESSION['useronline'];
$userId = $id['idusers'];
$pp = new User;


$phone = $_POST['phone'];
$profileId = $_POST['id'];

$response = array();


if (!empty($phone) && $userId === $profileId) {
    $result = $pp->updateContactInfo($phone, $profileId);
    if ($result == true) {
        $response['status'] = 'success';
        $response['message'] = 'Your Contact Phone number is Updated successful.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Contact Update Failed, please try again.';
    }
} else if (empty($phone)) {
    $response['status'] = 'error';
    $response['message'] = 'Phone number cannot be empty.';
} else if ($phone) {
    $response['status'] = 'error';
    $response['message'] = 'Phone number cannot be less than 15.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid status, please try again.';
}

echo json_encode($response);
