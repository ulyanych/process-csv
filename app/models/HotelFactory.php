<?php

namespace App\Models;

use App\Services\HotelService;

class HotelFactory
{
    public static function create(int $iterator = 1): Hotel
    {
        return (new Hotel(HotelService::getId($iterator)))
            ->setName(HotelService::getName($iterator))
            ->setState(HotelService::getState());
    }
}