<?php

    namespace BrainGames\Games\Gcd;

    use function BrainGames\Cli\run;


    const GAME_INSTRUCTION = "Find the greatest common divisor of given numbers.\n";

function maxDivisor($a, $b)
{
    if ($a === $b) {
        return $a;
    }

    return ($a > $b) ? maxDivisor($a - $b, $b) : maxDivisor($a, $b - $a);
}

function playGcdGame()
{
    $gameSymbols = function () {
        $number1 = rand(1, 100);
        $number2 = rand(1, 100);
        return [
                'number1' => $number1,
                'number2' => $number2
               ];
    };

    $correctAnswer = function ($symbols) {
        $num1 = $symbols['number1'];
        $num2 = $symbols['number2'];
        return maxDivisor($num1, $num2);
    };

    $gameBody = [
                 'symbols' => $gameSymbols,
                 'answer' => $correctAnswer
                ];

    run(GAME_INSTRUCTION, $gameBody);
}
