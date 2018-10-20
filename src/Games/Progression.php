<?php

namespace BrainGames\Games\Progression;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'What number is missing in this progression?';
const PROGRESSION_LENGTH = 10;
const NUMBER_MIN = 1;
const NUMBER_MAX = 9;

function run()
{
    $getQuestionAnswerPair = function () {
        $start = rand(NUMBER_MIN, NUMBER_MAX);
        $step = rand(NUMBER_MIN, NUMBER_MAX);
        $end = $start + (PROGRESSION_LENGTH - 1) * $step;
        $progression = range($start, $end, $step);

        $randomIndex = rand(0, PROGRESSION_LENGTH - 1);
        $correctAnswer = $progression[$randomIndex];
        $progression[$randomIndex] = '..';
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}
