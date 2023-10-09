<?php

require_once("../FileReader.php");

function calculateWinner(string $opponentsMove, string $yourMove) : string
{
    switch ($opponentsMove) {
        case 'Rock':
            switch ($yourMove) {
                case 'Rock':
                    return 'Draw';
                case 'Paper':
                    return 'You';
                case 'Scissors':
                    return 'Opponent';
            }
            break;
        case 'Paper':
            switch ($yourMove) {
                case 'Rock':
                    return 'Opponent';
                case 'Paper':
                    return 'Draw';
                case 'Scissors':
                    return 'You';
            }
            break;
        case 'Scissors':
            switch ($yourMove) {
                case 'Rock':
                    return 'You';
                case 'Paper':
                    return 'Opponent';
                case 'Scissors':
                    return 'Draw';
            }
            break;
    }
    return '';
}

function calculateScore(string $yourMove): int
{
    switch ($yourMove) {
        case 'Rock':
            return 1;
        case 'Paper':
            return 2;
        case 'Scissors':
            return 3;
    }

    return 0;
}

function calculateResponseMove($opponentsMove, $roundEnd): string
{
    switch ($opponentsMove) {
        case 'Rock':
            switch ($roundEnd) {
                case 'Lose':
                    return 'Scissors';
                case 'Draw':
                    return 'Rock';
                case 'Win':
                    return 'Paper';
            }
            break;
        case 'Paper':
            switch ($roundEnd) {
                case 'Lose':
                    return 'Rock';
                case 'Draw':
                    return 'Paper';
                case 'Win':
                    return 'Scissors';
            }
            break;
        case 'Scissors':
            switch ($roundEnd) {
                case 'Lose':
                    return 'Paper';
                case 'Draw':
                    return 'Scissors';
                case 'Win':
                    return 'Rock';
            }
            break;
    }
    return '';
}

$data = FileReader::fetch('Day2');

$opponentsMove = '';
$responseMove = '';
$score = 0;

foreach ($data AS $line) {
    if ($line == "") {
        continue;
    }

    $opponentsMove = match ($line[0]) {
        'A' => 'Rock',
        'B' => 'Paper',
        'C' => 'Scissors',
        default => null
    };

    $roundEnd = match ($line[2]) {
        'X' => 'Lose',
        'Y' => 'Draw',
        'Z' => 'Win',
        default => null
    };

    $responseMove = calculateResponseMove($opponentsMove, $roundEnd);

    $score += match (calculateWinner($opponentsMove, $responseMove)) {
        'Opponent' => 0,
        'You' => 6,
        default => 3,
    };

    $score += calculateScore($responseMove);
}

print($score);