<?php

    namespace BrainGames\Even;

    use function \cli\line;
    use function \cli\prompt;

function greeting()
{
    line("Welcome to the Brain Games!");
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
}
