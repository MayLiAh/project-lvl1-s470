<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "What number is missing in the progression?\n";
const LENGTH = 10;

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
        $step = rand(2, 7);
        $start = rand(0, 30);
        $progression = generateProgression($start, $step);
        $indexOfHiddenNumber = array_rand($progression);
        $progression[$indexOfHiddenNumber] = '..';
        $reverseProgression = array_rand([0 => 'no', 1 => 'yes']);
        $question = $reverseProgression === 0 ? implode(' ', $progression) : implode(' ', array_reverse($progression));
        $answer = $start + $step * $indexOfHiddenNumber;
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestionAndAnswer);
}
