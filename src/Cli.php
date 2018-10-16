<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run(string $gameId)
{
    line('Welcome to the Brain Games!');

    $gameName = getGameName($gameId);
    $gameNamespace = "\\BrainGames\\Games\\{$gameName}";
    $playGameFunc = "{$gameNamespace}\\play";

    if (!function_exists($playGameFunc)) {
        line('ERROR: Cannot find specified game :(');
        exit;
    }

    $playGameFunc(
        function () {
            return call_user_func_array('\\cli\\line', func_get_args());
        },
        function () {
            return call_user_func_array('\\cli\\prompt', func_get_args());
        }
    );
}

function getGameName(string $gameId)
{
    return convertKebabToStudlyCaps($gameId);
}

function convertKebabToStudlyCaps(string $line)
{
    $words = explode('-', $line);
    $upperCasedWords = array_map(function ($word) {
        return ucfirst($word);
    }, $words);

    return implode('', $upperCasedWords);
}
