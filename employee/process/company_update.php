<?php
session_start();
ini_set('display_errors', '1');
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$id = $_SESSION['useronline'];
$userId = $id['idusers'];
$pp = new User;

$role = Utilities::makeCapital($_POST['company_role']);
$profileId = $_POST['id'];
$team = $_POST['team'];

$response = array();

if (!empty($role) && !empty($team) && $userId === $profileId) {
    $result = $pp->updateCompanyInfo($role, $team, $profileId);
    if ($result) {
        $response['status'] = 'success';
        $response['message'] = 'Your company info was updated successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Company info update failed, please try again.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Please fill in all required fields.';
}

echo json_encode($response);
?>
