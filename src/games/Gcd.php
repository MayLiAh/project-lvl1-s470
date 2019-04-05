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

function getSymbols()
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    return [
            'number1' => $number1,
            'number2' => $number2
           ];
}

function getAnswer($symbols)
{
    $num1 = $symbols['number1'];
    $num2 = $symbols['number2'];
    return getMaxDivisor($num1, $num2);
}

function playGcdGame()
{
    $questionAndAnswer = function () {
        $symbols = getSymbols();
        $question = implode(' ', $symbols);
        $answer = getAnswer($symbols);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $questionAndAnswer);
}
