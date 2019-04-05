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
    $number = function () {
        return rand(0, 100);
    };
    $gameQuestion = $number;
       
    $isEven = function ($num) {
        return $num % 2 === 0;
    };

    $correctAns = function ($num) {
        return isEven($num) ? "yes" : "no";
    };
        
    $correctAnswer = $correctAns;

    run(GAME_INSTRUCTION, $gameQuestion, $correctAnswer);
}
