<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\Engine\run;

function isPrime($num)
{
    if ($num <= 2) {
        return $num === 2;
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

const GAME_INSTRUCTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

function playPrimeGame()
{
    $generateQuestionAndAnswer = function () {
        $question = rand(0, 100);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestionAndAnswer);
}
