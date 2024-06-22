<?php
ob_start(); // Start output buffering
session_start();
ini_set("display_errors", "1");
require_once "../classes/Share.php";
require_once "../classes/Notification.php";
require_once "../classes/User.php";

$notification = new Notification;


$user = $_SESSION['useronline'];
$users = new User;
$user = $users->getUser($user);

$share = new Share;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['shareBtn'])) {
        $doc_desc = $_POST['doc_desc'];
        $doc_file =  $_FILES['doc_file'];
        $doc_creator = $user['idusers'];
        $sender_team = $user['user_team_id'];
        $email = $_POST['receiver_email'];
        $username = $_POST['receiver_username'];
        $coll_desc = $_POST['collaboration_desc'];

        $errors = [];
        if ($doc_file['error'] != UPLOAD_ERR_OK) {
            $errors[] = "File type not supported, kindly send a message to support <a href='../support.php'>HERE</a>";
            $_SESSION['collab_error'] = $errors;
        } else {
            $sharingDir = '../sharing/';

            if (!file_exists($sharingDir)) {
                mkdir($sharingDir, 0777, true);
            }

            $doc_title = $doc_file['name'];
            $extension = pathinfo($doc_title, PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $extension;
            $targetFile = $sharingDir . $uniqueFileName;

            if (move_uploaded_file($doc_file['tmp_name'], $targetFile)) {
                $result = $share->shareDoc($doc_title, $doc_desc, $uniqueFileName, $doc_creator, $email, $username, $coll_desc);
                if ($result) {
                    $successMessage = "Document successfully shared. Contact them to let them know";
                    $_SESSION['collab_success'] = $successMessage;
                    header("Location: ../collaboration.php");
                    exit;
                } else {
                    $errors = "User email or Username not found. Kindly check the username or Email and try again! Else, contact support <a href='../support.php'>HERE</a>";
                    $_SESSION['collab_error'] = $errors;
                    header("Location: ../collaboration.php");
                }
            } else {
                echo "Error: Failed to move uploaded file";
            }
        }
    }
}

ob_end_flush(); // End output buffering and flush the output
