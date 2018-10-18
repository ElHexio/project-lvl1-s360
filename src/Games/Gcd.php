<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

const NUMBER_MIN = 2;
const NUMBER_MAX = 9;

function run()
{
    $getQuestionAnswerPair = function () {
        $multiplier = rand(NUMBER_MIN, NUMBER_MAX);
        $firstNumber = rand(NUMBER_MIN, NUMBER_MAX) * $multiplier;
        $secondNumber = rand(NUMBER_MIN, NUMBER_MAX) * $multiplier;
        $question = implode(' ', [$firstNumber, $secondNumber]);

        $correctAnswer = calcGCD($firstNumber, $secondNumber);
        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}

function calcGCD(...$numbers)
{
    $min = min($numbers);
    if (isDividerForAllNumbers($min, $numbers)) {
        return $min;
    }

    $halfOfMin = ceil($min / 2);
    $gcd = 1;

    for ($i = $halfOfMin; $i > 1; $i--) {
        if (isDividerForAllNumbers($i, $numbers)) {
            $gcd = $i;
            break;
        }
    }

    return $gcd;
}

function isDividerForAllNumbers($divider, $numbers)
{
    $nonDividableNums = array_filter(
        $numbers,
        function ($number) use ($divider) {
            return $number % $divider !== 0;
        }
    );

    return count($nonDividableNums) === 0;
}
