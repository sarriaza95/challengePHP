<?php

function fetchAndParseData() {
    $url = "http://echo.jsontest.com/john/yes/tomas/no/belen/yes/peter/no/julie/no/gabriela/no/messi/no";

    // Fetch JSON response
    $jsonResponse = file_get_contents($url);

    // Check if the request was successful
    if ($jsonResponse !== false) {
        // Parse JSON response
        $data = json_decode($jsonResponse, true);

        // Extract names with 'yes' and 'no' responses
        $yesNames = array_keys(array_filter($data, function ($response) {
            return $response === 'yes';
        }));

        $noNames = array_keys(array_filter($data, function ($response) {
            return $response === 'no';
        }));

        return [$yesNames, $noNames];
    } else {
        echo "Error: Unable to fetch data.\n";
        return [null, null];
    }
}

function printColumns($yesNames, $noNames) {
    $maxLen = max(count($yesNames), count($noNames));

    echo str_pad("Yes Names", 20) . str_pad("No Names", 20) . "\n";
    echo str_repeat("=", 40) . "\n";

    for ($i = 0; $i < $maxLen; $i++) {
        $yesName = isset($yesNames[$i]) ? str_pad($yesNames[$i], 20) : str_pad("", 20);
        $noName = isset($noNames[$i]) ? str_pad($noNames[$i], 20) : str_pad("", 20);
        echo $yesName . $noName . "\n";
    }
}

// Main execution
list($yesNames, $noNames) = fetchAndParseData();

if ($yesNames !== null && $noNames !== null) {
    printColumns($yesNames, $noNames);
}
?>