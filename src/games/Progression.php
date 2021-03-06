<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = 'What number is missing in the progression?';
const LENGTH = 10;

function randomWithoutZero($start, $end)
{
    $number = rand($start, $end);

    return $number !== 0 ? $number : random($start, $end);
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
        $step = randomWithoutZero(-7, 7);
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
