<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Engine\run;

function isEven($num)
{
    return $num % 2 === 0;
}

const GAME_INSTRUCTION = "Answer \"yes\" if number even otherwise answer \"no\".\n";

function getSymbols()
{
    $num = rand(0, 100);
    return ['number' => $num];
}

function getAnswer($symbols)
{
    return isEven($symbols['number']) ? "yes" : "no";
}

function playEvenGame()
{
    $questionAndAnswer = function () {
        $symbols = getSymbols();
        $question = implode(' ', $symbols);
        $answer = getAnswer($symbols);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $questionAndAnswer);
}
