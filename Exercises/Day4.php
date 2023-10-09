<?php

require_once("../FileReader.php");

$data = FileReader::fetch('Day4');

function split(string $line, string $separator) : array
{
    $splitIndex = strpos($line, $separator);
    $elf1 = substr($line, 0, $splitIndex);
    $elf2 = substr($line, $splitIndex + 1);

    return [$elf1, $elf2];
}

function compareElves(array $elf1, array $elf2): bool
{
    return (
        ($elf1[0] <= $elf2[0] && $elf1[1] >= $elf2[0])
        || ($elf2[0] <= $elf1[0] && $elf2[1] >= $elf1[0])
    );
}

$count = 0;

foreach($data AS $line) {
    if ($line == "") {
        continue;
    }

    $elves = split($line, ',');

    $elf1Ranges = split($elves[0], '-');
    $elf2Ranges = split($elves[1], '-');

    if (compareElves($elf1Ranges, $elf2Ranges)) {
        $count++;
    }
}

print($count);