<?php

namespace BrainGames\Games\Prime;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const NUMBER_MIN = 2;
const NUMBER_MAX = 1000;

function run()
{
    $getQuestionAnswerPair = function () {
        $question = rand(NUMBER_MIN, NUMBER_MAX);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}

function isPrime(int $number)
{
    if ($number < 2) {
        return false;
    }

    $isPrime = true;
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i === 0) {
            $isPrime = false;
            break;
        }
    }

    return $isPrime;
}
