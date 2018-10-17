<?php

namespace BrainGames\Cli;

use function BrainGames\ConsoleGame\play;

function run()
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!\n", $playerName);
    line('Congratulations, %s!', $playerName);
}
