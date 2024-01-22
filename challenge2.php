<?php

class LetterCounter {
    public static function CountLettersAsString($inputString) {
        // Convert the input string to lowercase for case-insensitive counting
        $inputString = strtolower($inputString);

        // Initialize an array to store letter counts
        $letterCounts = [];

        // Iterate through each character in the string
        for ($i = 0; $i < strlen($inputString); $i++) {
            $char = $inputString[$i];

            // Check if the character is a letter
            if (ctype_alpha($char)) {
                // Increment the count for the letter in the array
                if (isset($letterCounts[$char])) {
                    $letterCounts[$char]++;
                } else {
                    $letterCounts[$char] = 1;
                }
            }
        }

        // Create a string representation of letter counts
        $resultString = '';
        foreach ($letterCounts as $letter => $count) {
            $resultString .= "$letter:$count*" . ",";
        }

        // Remove the trailing comma if it exists
        $resultString = rtrim($resultString, ',');

        return $resultString;
    }
}

// Example usage
$inputString = "Interview";
$result = LetterCounter::CountLettersAsString($inputString);
echo $result;

?>