<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/Document.php";
require_once "../classes/Share.php";

// Check if docId is provided
if (isset($_POST['docId'])) {
    $docId = $_POST['docId'];
    $obj = new Share();
    $sharedDoc = $obj->getSharedDoc($docId);

    // Check if document details are found and if it is an array
    if ($sharedDoc && is_array($sharedDoc)) {
        // Return the document details as JSON
        echo json_encode($sharedDoc);
    } else {
        // Return an error message if document details are not found
        echo json_encode(["error" => "Shared Document not found details not found."]);
    }
} else {
    // Return an error message if docId is not provided
    echo json_encode(["error" => "Document ID is not provided"]);
}
?>
