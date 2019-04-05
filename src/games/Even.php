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
    $gameSymbols = function () {
        $num = rand(0, 100);
        return ['number' => $num];
    };

    $correctAnswer = function ($symbols) {
        return isEven($symbols['number']) ? "yes" : "no";
    };

    $gameBody = [
                 'symbols' => $gameSymbols,
                 'answer' => $correctAnswer
                ];

    run(GAME_INSTRUCTION, $gameBody);
}
