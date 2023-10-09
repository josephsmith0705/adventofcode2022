<?php

require_once("../FileReader.php");

$data = FileReader::fetch('Day3');

$compartment1 = [];
$compartment2 = [];

$badges = [];

foreach ($data AS $index => $backpack) {
    if ($index % 3 == 0) {
        foreach(str_split($backpack) AS $letter) {
            if (str_contains($data[$index + 1], $letter)
                && str_contains($data[$index + 2], $letter)) {
                $badges[] = $letter;
                break;
            }
        }
    }
}

$score = 0;
$alphabet = range ('A', 'Z');

foreach ($badges AS $letter) {
    $alphabetIndex = array_search(strtoupper($letter), $alphabet) + 1;
    if (ctype_upper($letter)) {
        $alphabetIndex += 26;
    }
    $score += $alphabetIndex;
}

print($score);