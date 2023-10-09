<?php

require_once("../FileReader.php");

$data = FileReader::fetch('Day1');

$totalCalories = [];
$currentCalories = 0;
$currentElf = 1;

foreach ($data AS $index => $calories) {
    if ($calories == "") {
        $totalCalories[$currentElf] = $currentCalories;
        $currentCalories = 0;
        $currentElf++;
        continue;
    }

    $currentCalories += intval($calories);
}

$currentCalories = 0;
$currentElf = 0;
arsort($totalCalories);

$top3Elves = array_slice($totalCalories, 0, 3);

$top3Calories = 0;
foreach ($top3Elves AS $topElf) {
    $top3Calories += $topElf;
}

print($top3Calories);