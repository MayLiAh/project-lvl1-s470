<?php

    namespace BrainGames\Even;

    use function \cli\line;
    use function \cli\prompt;

function isEven($num)
{
    return $num % 2 === 0;
}

function playEvenGame()
{
    line("Welcome to the Brain Games!");
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!\n", $name);
    $answersToWin = 3;

    for ($i = 0; $i < $answersToWin; $i++) {
        $number = rand(0, 100);
        line("Question: %s", $number);
        $answer = prompt("Your answer");

        $correctAnswer = isEven($number) ? 'yes' : 'no';

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
