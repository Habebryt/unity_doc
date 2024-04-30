array

<?php
// countries_states.php

// Array of countries and their corresponding states/provinces
$countries = array(
    'USA' => array("New York", "California", "Texas"),
    'Canada' => array("Ontario", "Quebec", "British Columbia"),
    // Add more countries and their states as needed
);

?>

html selects for countries
<!-- HTML with PHP and JavaScript -->
<select id="countrySelect" onchange="updateStates()">
  <option value="">Select Country</option>
  <?php
  include 'countries_states.php';
  foreach ($countries as $country => $states) {
      echo "<option value=\"$country\">$country</option>";
  }
  ?>
</select>

<select id="stateSelect">
  <option value="">Select State/Province</option>
</select>

<script>
function updateStates() {
  var country = document.getElementById("countrySelect").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("stateSelect").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "get_states.php?country=" + country, true);
  xhttp.send();
}
</script>


html select matching states
<?php
// get_states.php

include 'countries_states.php';

$country = $_GET['country'];

if (isset($countries[$country])) {
  $stateOptions = '<option value="">Select State/Province</option>';
  foreach ($countries[$country] as $state) {
    $stateOptions .= "<option value=\"$state\">$state</option>";
  }
  echo $stateOptions;
} else {
  echo '<option value="">Select State/Province</option>';
}
?>

