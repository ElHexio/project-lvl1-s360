<?php

namespace BrainGames\Games\EvenNumbers;

const ANSWER_POSITIVE = 'yes';
const ANSWER_NEGATIVE = 'no';
const ROUNDS_NUMBER = 3;
const NUMBER_MIN = 1;
const NUMBER_MAX = 99;

function play($notifyPlayer, $askPlayer)
{
    $gameRules = getGameRules();
    $notifyPlayer($gameRules);
    $playerName = $askPlayer('May I have your name?');
    $notifyPlayer("Hello, %s!\n", $playerName);

    $isPlayerWinner = true;
    $rounds = ROUNDS_NUMBER;
    for ($i = 1; $i <= $rounds; $i++) {
        $number = getNextNumber();
        $notifyPlayer('Question: %s', $number);

        $guess = $askPlayer('Your answer');
        $correctAnswer = getCorrectAnswer($number);
        $guessResult = $correctAnswer === $guess;

        if (!$guessResult) {
            $notifyPlayer("'%s' is wrong answer ;(. Correct answer was '%s'.", $guess, $correctAnswer);
            $notifyPlayer("Let's try again, %s!", $playerName);
            $isPlayerWinner = false;
            break;
        }

        $notifyPlayer('Correct!');
    }

    if (!$isPlayerWinner) {
        return false;
    }

    $notifyPlayer('Congratulations, %s!', $playerName);
    return true;
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
