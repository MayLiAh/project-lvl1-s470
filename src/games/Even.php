<?php

    namespace BrainGames\Even;

    use function \cli\line;
    use function \cli\prompt;

        $gameInstruction = "Answer \"yes\" if number even otherwise answer \"no\".";
        $number = function () {
            return rand(0, 100);
        };
        $gameQuestion = $number;
       
        $isEven = function ($num) {
            return $num % 2 === 0;
        };

        $correctAns = function ($num) use ($isEven) {
            return $isEven($num) ? "yes" : "no";
        };
        
        $correctAnswer = $correctAns;
