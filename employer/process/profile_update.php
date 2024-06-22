<?php
session_start();
ini_set('display_errors', '1');
require_once "../classes/User.php";
require_once "../classes/Utilities.php";

$id = $_SESSION['useronline'];
$userId = $id['idusers'];
$pp = new User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['personalUpdate'])) {
        $profilePicture = $_FILES['profile-image'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $company = $_POST['company_name'];
        $role = $_POST['company_role'];
        $team = $_POST['team'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];

        $errors = array();
        if ($profilePicture['error'] != UPLOAD_ERR_OK) {
            $errors[] = "Error uploading Profile Picture";
        } else {
            $ppdir = '../uploads/';
            if (!file_exists($ppdir)) {
                mkdir($ppdir, 0777, true);
            }
            $originalName = $profilePicture['name'];
            $ext = pathinfo($originalName, PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $ext;
            $profileImage = $ppdir . $uniqueFileName;
            if (move_uploaded_file($profilePicture['tmp_name'], $profileImage)) {
                if ($id = $_POST['id'] !== $userId) {
                    $errors[] = "User request does not match with your session";
                    header("location: ../profile.php");
                    exit;
                } else {
                    $result = $pp->updateUser($username, $firstname, $lastname, $uniqueFileName, $user_phone, $company, $role, $team, $user_country, $user_state, $zip_code, $id);
                }
                if ($result) {
                    $successMessage = "Profile Updated Successfully";
                    header("location: ../profile.php");
                } else {
                    $errors[] = "Profile Update Failed";
                }
            } else {
                $errors[] = "Error uploading profile";
            }
        }
    }
}
