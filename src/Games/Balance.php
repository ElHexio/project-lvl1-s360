<?php

namespace BrainGames\Games\Balance;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'Balance the given number.';
const NUMBER_MIN = 111;
const NUMBER_MAX = 999;

function run()
{
    $getQuestionAnswerPair = function () {
        $question = rand(NUMBER_MIN, NUMBER_MAX);
        $correctAnswer = balance($question);
        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}

function balance(int $number)
{
    $digits = str_split((string) $number);
    $digits = array_map('intval', $digits);
    $lastIndex = count($digits) - 1;
    $minToMax = $digits;

    while (true) {
        sort($minToMax);
        $min = &$minToMax[0];
        $max = &$minToMax[$lastIndex];
        $delta = $max - $min;

        if ($delta <= 1) {
            break;
        }

        $halfDelta = ceil($delta / 2);
        $min += $halfDelta;
        $max -= $halfDelta;
    }
    unset($min, $max);

    return (int) implode('', $minToMax);
}
