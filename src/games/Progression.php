<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "What number is missing in the progression?\n";
const LENGTH = 10;

function generateProgression()
{
    $step = rand(2, 7);
    $maxStart = 99 - $step * 9;
    $start = rand(0, $maxStart);
    $currentProgression = [];
    $value = $start;
    for ($i = 0; $i < LENGTH; $i++) {
        $currentProgression[] = $value;
        $value += $step;
    }
    $numberIndex = array_rand($currentProgression);
    $currentProgression[$numberIndex] = '..';
    return [$start, $step, $numberIndex, $currentProgression];
}

function getAnswer($start, $step, $key)
{
    return $start + $step * $key;
}

function playProgressionGame()
{
    $generateQuestAndAns = function () {
        list($start, $step, $key, $progression) = generateProgression();
        $reversedOrNo = rand(0, 1);
        $question = $reversedOrNo === 0 ? implode(' ', $progression) : implode(' ', array_reverse($progression));
        $answer = getAnswer($start, $step, $key);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestAndAns);
}
