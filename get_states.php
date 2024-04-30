<?php
if(isset($_GET['country'])) {
    $selected_country = $_GET['country'];

    // Load JSON data
    $data = file_get_contents("countries.json");
    $countries = json_decode($data, true);

    // Find the selected country in the array
    foreach ($countries as $country) {
        if ($country['name'] === $selected_country) {
            // Check if the country has states
            if (isset($country['states'])) {
                // Output options for states
                foreach ($country['states'] as $state) {
                    echo '<option value="' . $state['name'] . '">' . $state['name'] . '</option>';
                }
            } else {
                // If no states available, display a default option
                echo '<option value="">No states available</option>';
            }
            break;
        }
    }
}
?>
