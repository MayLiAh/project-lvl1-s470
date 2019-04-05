<?php

    namespace BrainGames\Games\Progression;

    use function BrainGames\Cli\run;


    const GAME_INSTRUCTION = "What number is missing in the progression?\n";
    const PROGRESSION = [100, 94, 88, 82, 76, 70, 64, 58, 52, 46];

    function playProgressionGame()
    {
        $gameSymbols = function () {
            $numberIndex = rand(0, count(PROGRESSION) - 1);
            $currentProgression = PROGRESSION;
            $currentProgression[$numberIndex] = '..';
            return $currentProgression;
        };

        $correctAnswer = function ($symbols) {
            $numberKey = array_search('..', $symbols);
            return PROGRESSION[$numberKey];
        };

        $gameBody = [
                     'symbols' => $gameSymbols,
                     'answer' => $correctAnswer
                    ];

        run(GAME_INSTRUCTION, $gameBody);
    }
