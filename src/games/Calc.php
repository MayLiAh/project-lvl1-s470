<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "What is the result of the expression?\n";
const OPERATORS = ['+', '-', '*'];

function getAnswer($num1, $num2, $operator)
{
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        default:
            $result = $num1 * $num2;
    }
    return $result;
}

function playCalcGame()
{
    $generateQuestAndAns = function () {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "$number1 $operator $number2";
        $answer = getAnswer($number1, $number2, $operator);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestAndAns);
}
