<?php

namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_TO_WIN = 3;

function run($gameInstruction, $generateQuestionAndAnswer)
{
    line("Welcome to the Brain Game!");
    line("%s %s", $gameInstruction, PHP_EOL);
    $name = prompt("May I have your name?");
    line("Hello, %s! %s", $name, PHP_EOL);

    for ($i = 0; $i < ANSWERS_TO_WIN; $i++) {
        list($question, $correctAnswer) = $generateQuestionAndAnswer();

        line("Question: %s", $question);
        $answer = prompt("Your answer");

        if ($answer != $correctAnswer) {
            line(" '%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            exit;
        } else {
            line("Correct!");
        }
    }

    line("Congratulations, %s!", $name);
}
