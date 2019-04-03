<?php

    namespace BrainGames\Even;

    use function \cli\line;
    use function \cli\prompt;

function playEvenGame()
{
    line("Welcome to the Brain Games!");
    line("Answer \"yes\" if number even otherwise answer \"no\".\n");
    $name = prompt("May I have your name?");
    line("Hello, %s!\n", $name);

    function isEven($num)
    {
        return $num % 2 === 0;
    }

    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 100);
        line("Question: %s", $number);
        $answer = prompt("Your answer");

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer !== $correctAnswer) {
            line(" '%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        } else {
            line("Correct!");
        }

        if ($i === 2) {
            line("Congratulations, %s!", $name);
        }
    }
}
