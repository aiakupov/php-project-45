<?php

namespace BrainGames\Even;

use BrainGames\Cli;
use BrainGames\Engine;
use function cli\line;
use function cli\prompt;

function isEven(int $value): bool
{
    return $value % 2 == 0;
}

function init(): void
{
    $name = Cli\welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $randNumber = rand(1, 100);
        line("Question: {$randNumber}");
        $answer = prompt("Your answer: ");
        $correctAnswer = isEven($randNumber) ? 'yes' : 'no';
        if ($answer == $correctAnswer) {
            Engine\correctAnswer();
        } else {
            Engine\incorrectAnswer($answer, $correctAnswer);
            Engine\lose($name);
            die();
        }
    }
    Engine\win($name);
}
