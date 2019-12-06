<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{
    public static function generateRoomName()
    {
        return implode('+', [
            Utils::getRandomValue(Room::TYPES), 
            Utils::getRandomValue(Room::NIGHTS), 
            Utils::getRandomValue(Room::FOOD)
        ]); 
    }

    public static function generatePrice()
    {
        $price = range(10000, 200000, 1000);
        return Utils::getRandomValue($price) . Room::CURRENCY;
    }
}