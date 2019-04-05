<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const GAME_INSTRUCTION = "What number is missing in the progression?\n";
const PROGRESSION_STEP = 6;
const PROGRESSION_LENGTH = 10;
const MAX_START = 99 - PROGRESSION_STEP * 10;

function getSymbols()
{
    $progressionStart = rand(0, MAX_START);
    $currentProgression = [];
    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $currentProgression[] = $progressionStart;
        $progressionStart += PROGRESSION_STEP;
    }
    $numberIndex = array_rand($currentProgression);
    $currentProgression[$numberIndex] = '..';
    return $currentProgression;
}

function getAnswer($symbols)
{
    $numberKey = array_search('..', $symbols);
    if ($numberKey !== count($symbols) - 1) {
        return $symbols[$numberKey + 1] - PROGRESSION_STEP;
    }
    return $symbols[$numberKey - 1] + PROGRESSION_STEP;
}

function playProgressionGame()
{
    $questionAndAnswer = function () {
        $symbols = getSymbols();
        $question = implode(' ', $symbols);
        $answer = getAnswer($symbols);
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $questionAndAnswer);
}