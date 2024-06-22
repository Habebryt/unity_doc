<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/Document.php";

// Check if docId is provided
if (isset($_POST['docId'])) {
    $docId = $_POST['docId'];
    $obj = new Document();
    $docDetails = $obj->getDocByTagMap($docId);

    // Check if document details are found and if it is an array
    if ($docDetails && is_array($docDetails)) {
        // Return the document details as JSON
        echo json_encode($docDetails);
    } else {
        // Return an error message if document details are not found
        echo json_encode(["error" => "Document details not found from Ajax"]);
    }
} else {
    // Return an error message if docId is not provided
    echo json_encode(["error" => "Document ID is not provided"]);
}
