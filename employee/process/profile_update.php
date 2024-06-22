<?php
session_start();
ini_set('display_errors', '1');
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$id = $_SESSION['useronline'];
$userId = $id['idusers'];
$pp = new User;

$firstname = Utilities::firstName($_POST['firstname']);
$username = Utilities::firstName($_POST['username']);
$lastname = Utilities::lastName($_POST['lastname']);
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$profileId = $_POST['id'];

$request = new Support();
$response = array();


if (!empty($username) && !empty($subject) && !empty($firstname) && !empty($username) && !empty($country) && !empty($state) && !empty($zip) && $userId === $profileId) {
    $result = $pp->updatePersonalInfo($firstname, $lastname, $username, $country, $state, $zip, $profileId);
    if ($result == true) {
        $response['status'] = 'success';
        $response['message'] = 'Your Profile Update is successful.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Profile Update Failed, please try again.';
    }
} else if (empty($username)) {
    $response['status'] = 'error';
    $response['message'] = 'Username cannot be empty.';
} else if (empty($country)) {
    $response['status'] = 'error';
    $response['message'] = 'Country cannot be empty.';
} else if (empty($state)) {
    $response['status'] = 'error';
    $response['message'] = 'State cannot be empty.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid status, please try again.';
}

echo json_encode($response);
