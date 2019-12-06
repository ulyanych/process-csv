<?php

namespace App\Services;

use App\Models\Hotel;

class HotelService
{
    public static function getId(int $iterator): int
    {
        return Hotel::START_ID + $iterator;
    }

    public static function getName(int $iterator): string
    {
        return Hotel::NAME . ' ' . $iterator;
    }

    public static function getState(): string
    {
        return Utils::getRandomValue(Hotel::STATE);
    }
}