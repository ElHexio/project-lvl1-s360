<?php

namespace BrainGames\Games\EvenNumbers;
use function BrainGames\ConsoleGameEngine\play;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';
const ROUNDS_NUMBER = 3;
const NUMBER_MIN = 1;
const NUMBER_MAX = 99;

function run()
{
    $getRules = function () {
        return getGameRules();
    };

    $getQuestionAnswerPair = function () {
        $number = getNextNumber();
        $correctAnswer = getCorrectAnswer($number);
        return [$number, $correctAnswer];
    };

    play($getRules, $getQuestionAnswerPair);
}

function getGameRules()
{
    return sprintf(
        'Answer "%s" if number even otherwise answer "%s".',
        ANSWER_POSITIVE,
        ANSWER_NEGATIVE
    );
}

function getNextNumber($minValue = NUMBER_MIN, $maxValue = NUMBER_MAX)
{
    return rand($minValue, $maxValue);
}

function getCorrectAnswer(int $number)
{
    return isEven($number) ? ANSWER_POSITIVE : ANSWER_NEGATIVE;
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
