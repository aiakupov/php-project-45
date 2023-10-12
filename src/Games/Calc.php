<?php

namespace BrainGames\Calc;

use BrainGames\Cli;
use BrainGames\Engine;
use function cli\line;
use function cli\prompt;

function getOperation(): string
{
    $operation = ['+', '-', '*'];
    return $operation[rand(0, 2)];
}

function getAnswer(int $value1, int $value2, string $operation): float|int
{
    if ($operation == '+') {
        return $value1 + $value2;
    } elseif ($operation == '-') {
        return $value1 - $value2;
    } else {
        return $value1 * $value2;
    }
}

function init(): void
{
    $name = Cli\welcome();
    line("What is the result of the expression?");
    for ($i = 0; $i < 3; $i++) {
        $value1 = rand(0, 5);
        $value2 = rand(0, 5);
        $operation = getOperation();
        line("Question: {$value1} {$operation} {$value2}");
        $answer = prompt("Your answer: ");
        $correctAnswer = getAnswer($value1, $value2, $operation);

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
