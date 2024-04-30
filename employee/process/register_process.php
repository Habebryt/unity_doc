<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
session_start();

require_once "../classes/User.php";
require_once "../classes/Utilities.php";

// Retrieve and Sanitize form Data

if (isset($_POST["register"])) {
    $firstname = Utilities::firstName($_POST["firstName"]);
    $lastname = Utilities::lastName($_POST['lastName']);
    $email = Utilities::email($_POST['email']);
    $password = $_POST["password"];

    if (empty($firstname) || empty($lastname)|| empty($email) || empty($password)){
            
        // first step validation
        $response = [
                "success" => false,
                "message" => "All fields are required"
            ];

            $response = json_encode($response);
            echo $response;
            die();
    }

    //other validations

    //give the values to a method that will save in database
    $register = new User;
    $register = $register->registerUser($firstname, $lastname, $email, $password);

    //response to user

    if($register){
        $response = [
            "success" => true,
            "message" => "Hey " .ucwords($firstname). ". Your registration on UnityDocs is Successful."
        ];
        $response = json_encode($response);
        echo $response;
    }

    

} else {
    echo "Sorry you are not passing anything to me";
}




?>