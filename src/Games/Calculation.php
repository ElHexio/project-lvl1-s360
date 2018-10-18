<?php

namespace BrainGames\Games\Calculation;

use function BrainGames\ConsoleGameEngine\play;

const DESCRIPTION = 'What is the result of the expression?';
const NUMBER_MIN = 1;
const NUMBER_MAX = 10;
const AVAILABLE_OPERATIONS = ['*', '+', '-'];

function run()
{
    $getQuestionAnswerPair = function () {
        $leftOperand = rand(NUMBER_MIN, NUMBER_MAX);
        $rightOperand = rand(NUMBER_MIN, NUMBER_MAX);
        $operation = AVAILABLE_OPERATIONS[rand(0, count(AVAILABLE_OPERATIONS) - 1)];

        $question = implode(' ', [$leftOperand, $operation, $rightOperand]);
        $correctAnswer = calculate($operation, $leftOperand, $rightOperand);
        return [$question, $correctAnswer];
    };

    play(DESCRIPTION, $getQuestionAnswerPair);
}

function calculate($operation, $lelfOperand, $rightOperand)
{
    $result = 0;

    switch ($operation) {
        case '*':
            $result = $lelfOperand * $rightOperand;
            break;
        case '+':
            $result = $lelfOperand + $rightOperand;
            break;
        case '-':
            $result = $lelfOperand - $rightOperand;
            break;
    }

    return $result;
}
