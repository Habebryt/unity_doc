<?php
session_start();
ini_set("display_errors", "1");
require_once "../classes/Document.php";
require_once "../classes/User.php";

$user = $_SESSION['useronline'];
$users = new User;
$user = $users->getUser($user);
$doc = new Document;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['uploadBtn'])) {
        // $doc_file = $_FILES['fileUpload'];
        $doc_file = $_FILES['fileUpload'];
        $tag = $_POST['tag'];
        $doc_desc = $_POST['description'];
        $doc_creator = $user['idusers'];
        $creator_team = $user['user_team_id'];
        //    $checker =  move_uploaded_file($doc_file['tmp_name'], "../documents/HBTest.pdf");
        //     var_dump($checker);
        //     die;


        // Validate form data
        $errors = [];
        if ($doc_file['error'] != UPLOAD_ERR_OK) {
            $errors[] = "File type not supported, kindly send a message to support <a href='../support.php'>HERE</a>";
            $_SESSION['doc_error'] = $errors;
        } else {
            // Define the upload directory
            $uploadDir = '../documents/';

            // Check if the upload directory exists, if not, create it
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Create directory  with full permissions
            }

            // Generate a unique file name
            $originalFileName = $doc_file['name'];
            $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $extension;
            $targetFile = $uploadDir . $uniqueFileName;

            if (move_uploaded_file($doc_file['tmp_name'], $targetFile)) {
                // print_r($targetFile);

                // die;
                //File uploaded successfully, insert into database
                $result = $doc->addDocument($originalFileName, $doc_desc, $uniqueFileName, $doc_creator, $creator_team, $tag);
                if ($result) {
                    // Document added successfully
                    $successMessage = "Document uploaded successfully";
                    $_SESSION['doc_success'] = $successMessage;
                    header("location: ../document.php");
                } else {
                    $errors[] = "Error uploading your document";
                }
            } else {
                $errors[] = "Error uploading file";
                //     var_dump($errors);
                // die;
            }
        }
    }
}
