<?php

    namespace BrainGames\Cli;

    use function \cli\line;
    use function \cli\prompt;

    const ANSWERS_TO_WIN = 3;

function run($gameInstruction, $gameQuestion, $correctAnswer)
{
    line("Welcome to the Brain Game!");
    line("%s", $gameInstruction);
    $name = prompt("May I have your name?");
    line("Hello, %s!\n", $name);

    for ($i = 0; $i < ANSWERS_TO_WIN; $i++) {
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
