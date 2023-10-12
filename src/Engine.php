<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function correctAnswer(): void
{
    line('Correct!');
}

function incorrectAnswer($badAnswer, $correctAnswer): void
{
    line("'{$badAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
}

function win($name): void
{
    line("Congratulations, {$name}!");
}

function lose($name): void
{
    line("Let's try again, {$name}!");
}
