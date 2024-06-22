<?php
session_start();
require_once "../classes/Support.php";
require_once "../classes/Utilities.php";

// Retrieve and sanitize POST data
$firstname = Utilities::firstName($_POST['firstname']);
$lastname = Utilities::lastName($_POST['lastname']);
$email = Utilities::email($_POST['email']);
$subject = Utilities::sanitizeMessage($_POST['subject']);
$status = 1;
$message = Utilities::sanitizeMessage($_POST['message']);

$request = new Support();
$response = array();


if (!empty($message) && !empty($subject)) {
    $result = $request->sendSupport($firstname, $lastname, $email, $subject, $message, $status);
    if ($result == true) {
        $response['status'] = 'success';
        $response['message'] = 'Your request has been successfully sent. Our Support Team will contact you via email within 24 hours.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Request not sent, please try again.';
    }
} else if (empty($message)) {
    $response['status'] = 'error';
    $response['message'] = 'Support message cannot be empty.';
} else if (empty($subject)) {
    $response['status'] = 'error';
    $response['message'] = 'Support message subject cannot be empty.';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid status, please try again.';
}

echo json_encode($response);
