<?php

    namespace BrainGames\Calc;

    use function \cli\line;
    use function \cli\prompt;


    $gameInstruction = "What is the result of the expression?\n";
    $question = function () {
        $operators = ['+', '-', '*'];
        $number1 = rand(0, 10);
        $number2 = rand(0, 10);
        $operatorIndex = rand(0, 2);
        $currentOperator = $operators[$operatorIndex];
        $symbols = [$number1, $currentOperator, $number2];
        return implode(' ', $symbols);
    };
        
    $gameQuestion = $question;

    $correctAns = function ($quest) {
        $currentQuest = explode(' ', $quest);
        $num1 = $currentQuest[0];
        $num2 = $currentQuest[2];
        $operator = $currentQuest[1];

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
    };

    $correctAnswer = $correctAns;
