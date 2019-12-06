<?php

namespace App\Services;

class Utils
{
    public static function getRandomValue(array $array) 
    {
        return $array[mt_rand(0, count($array) - 1)];
    }
}