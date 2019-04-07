<?php

namespace BrainGames\Games\Even;

use function \BrainGames\Engine\run;

function isEven($num)
{
    return $num % 2 === 0;
}

const GAME_INSTRUCTION = 'Answer "yes" if number even otherwise answer "no".';

function playEvenGame()
{
    $generateQuestionAndAnswer = function () {
        $question = rand(0, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        return [$question, $answer];
    };

    run(GAME_INSTRUCTION, $generateQuestionAndAnswer);
}
