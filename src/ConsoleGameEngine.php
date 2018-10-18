<?php

namespace BrainGames\ConsoleGameEngine;

use function cli\line;
use function cli\prompt;

const ROUNDS_NUMBER = 3;

function play(string $description, callable $getQuestionAnswerPair)
{
    line('Welcome to the Brain Games!');
    line($description . "\n");

    $playerName = prompt('May I have your name?');
    line("Hello, %s!\n", $playerName);

    for ($i = 1; $i <= ROUNDS_NUMBER; $i++) {
        [$question, $correctAnswer] = $getQuestionAnswerPair();
        line('Question: %s', (string) $question);
        $guess = prompt('Your answer');

        if ($guess !== (string) $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $guess, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            return false;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $playerName);
    return true;
}
