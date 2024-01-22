<?php

function fetchAndPrintCurrentDate() {
    $url = "http://date.jsontest.com/";

    // Fetch JSON response
    $jsonResponse = file_get_contents($url);

    // Check if the request was successful
    if ($jsonResponse !== false) {
        // Parse JSON response
        $data = json_decode($jsonResponse, true);

        // Extract relevant date information
        $dayOfWeek = $data['day'];
        $day = $data['dayofweek'];
        $month = $data['month'];
        $year = $data['year'];
        $time = $data['time'];

        // Format the date
        $formattedDate = date("l jS \of F, Y - h:i A", strtotime("$day $month $year $time"));

        echo "Current Date: $formattedDate\n";
    } else {
        echo "Error: Unable to fetch data.\n";
    }
}

// Main execution
fetchAndPrintCurrentDate();
?>