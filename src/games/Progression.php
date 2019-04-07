<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = 'What number is missing in the progression?';
const LENGTH = 10;

function random()
{
    $num1 = rand(2, 7);
    $num2 = rand(-2, -7);
    return array_rand([$num1 => 'positive', $num2 => 'negative']);
}

function generateProgression($start, $step)
{
    $progression = [];
    for ($i = 0; $i < LENGTH; $i++) {
        $progression[] = $start;
        $start += $step;
    }
    return $progression;
}

function playProgressionGame()
{
    $generateQuestionAndAnswer = function () {
        $step = random();
        $start = rand(-30, 30);
        $progression = generateProgression($start, $step);
        $indexOfHiddenNumber = array_rand($progression);
        $progression[$indexOfHiddenNumber] = '..';
        $question = implode(' ', $progression);
        $answer = $start + $step * $indexOfHiddenNumber;
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestionAndAnswer);
}
