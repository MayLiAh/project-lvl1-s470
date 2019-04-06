<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "Find the greatest common divisor of given numbers.\n";

function getMaxDivisor($a, $b)
{
    if ($a === $b) {
        return $a;
    }

    return ($a > $b) ? getMaxDivisor($a - $b, $b) : getMaxDivisor($a, $b - $a);
}

function playGcdGame()
{
    $generateQuestionAndAnswer = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        $question = "$number1 $number2";
        $answer = getMaxDivisor($number1, $number2);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestionAndAnswer);
}
