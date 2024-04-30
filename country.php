<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cascading</title>
</head>
<body>
<form>
    <label for="country">Select Country:</label>
    <select id="country" name="country" onchange="getStates(this.value)">
        <option value="">Choose a country</option>
        <?php 
        // Load JSON data
        $data = file_get_contents("countries.json");
        $countries = json_decode($data, true);

        // Generate options for countries
        foreach ($countries as $country) : ?>
            <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="state">Select State:</label>
    <select id="state" name="state">
        <option value="">Choose a state</option>
    </select>
</form>

<script>
    function getStates(country) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("state").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "get_states.php?country=" + country, true);
        xhttp.send();
    }
</script>
 
</body>
</html>