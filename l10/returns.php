<?php

function getNumbers(int $mai, int $max, bool $evenOnly = false): array
{
    $numbers = range($mai, $max);
    if ($evenOnly) {
        $numbers = array_filter($numbers, fn ($numbers) => $numbers % 2 === 0);
//        $numbers = array_filter($numbers, function ($number) {
//            return $number % 2 === 0;
//        });
    }

    return $numbers;
}

$numbers = getNumbers(5, 19);
var_dump($numbers);

$evens = getNumbers(5, 19, true);
var_dump($evens);