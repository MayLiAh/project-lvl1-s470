<?php

    namespace BrainGames\Cli;

    use function \cli\line;
    use function \cli\prompt;

function run($gameInstruction, $gameQuestion, $correctAnswer)
{
    line("Welcome to the Brain Game!\n");
    line("%s", $gameInstruction);
    $name = prompt("May I have your name?");
    line("Hello, %s!\n", $name);
    $answersToWin = 3;

    for ($i = 0; $i < $answersToWin; $i++) {
        $question = $gameQuestion();
        line("Question: %s", $question);
        $answer = prompt("Your answer");

        if ($answer != $correctAnswer($question)) {
            line(" '%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer($question));
            line("Let's try again, %s!", $name);
            return false;
        } else {
            line("Correct!");
        }
    }

    line("Congratulations, %s!", $name);
}
