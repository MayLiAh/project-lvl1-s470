<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "What is the result of the expression?\n";
const OPERATORS = ['+', '-', '*'];

function getSymbols()
{
    $number1 = rand(0, 100);
    $number2 = rand(0, 100);
    $currentOperator = OPERATORS[array_rand(OPERATORS)];
    return [
            'number1' => $number1,
            'operator' => $currentOperator,
            'number2' => $number2
           ];
}

function getAnswer($symbols)
{
    $num1 = $symbols['number1'];
    $num2 = $symbols['number2'];
    $operator = $symbols['operator'];

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
    $questionAndAnswer = function () {
        $symbols = getSymbols();
        $question = implode(' ', $symbols);
        $answer = getAnswer($symbols);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $questionAndAnswer);
}
