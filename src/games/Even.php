<?php

    namespace BrainGames\Games\Even;

    use function \BrainGames\Cli\run;

function isEven($num)
{
    return $num % 2 === 0;
}

const GAME_INSTRUCTION = "Answer \"yes\" if number even otherwise answer \"no\".\n";

function playEvenGame()
{
    $gameQuestion = function () {
        return rand(0, 100);
    };

    $correctAnswer = function ($num) {
        return isEven($num) ? "yes" : "no";
    };

    run(GAME_INSTRUCTION, $gameQuestion, $correctAnswer);
}
