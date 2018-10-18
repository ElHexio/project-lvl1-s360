<?php

namespace BrainGames\Games\EvenNumbers;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';
const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';
const NUMBER_MIN = 1;
const NUMBER_MAX = 99;

function run()
{
    $getQuestionAnswerPair = function () {
        $question = rand(NUMBER_MIN, NUMBER_MAX);
        $correctAnswer = getCorrectAnswer($question);
        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}

function getCorrectAnswer(int $number)
{
    return isEven($number) ? ANSWER_POSITIVE : ANSWER_NEGATIVE;
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
