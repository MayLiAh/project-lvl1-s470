<?php

    namespace BrainGames\Calc;

    use function \cli\line;
    use function \cli\prompt;

function playCalcGame()
{
    line("Welcome to the Brain Games!");
    line("What is the result of the expression?\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!\n", $name);
    $answersToWin = 3;
    $operandes = ['+', '-', '*'];

    for ($i = 0; $i < $answersToWin; $i++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operandIndex = rand(0, 2);
        $currentOperand = $operandes[$operandIndex];
        line("Question: %s %s %s", $number1, $currentOperand, $number2);
        $answer = prompt("Your answer");

        switch ($currentOperand) {
            case '+':
                $correctAnswer = $number1 + $number2;
                break;
            case '-':
                $correctAnswer = $number1 - $number2;
                break;
            default:
                $correctAnswer = $number1 * $number2;
        }

        if ($answer != $correctAnswer) {
            line(" '%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return false;
        } else {
            line("Correct!");
        }
    }

    line("Congratulations, %s!", $name);
}
