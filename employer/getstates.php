<?php
require_once "classes/Country.php";

// Check if a country ID is provided in the request
if (isset($_GET['country'])) {
    $countryId = $_GET['country'];

    // Instantiate the Country class
    $country = new Country();

    // Fetch states based on the selected country ID
    $states = $country->getStates($countryId);

    // Return states as JSON data
    echo json_encode($states);
} else {
    // Handle invalid request
    http_response_code(400);
    echo json_encode(array('message' => 'Country ID is required.'));
}
?>
