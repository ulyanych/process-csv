<?php

namespace App\Models;

use App\Services\RoomService;

class RoomFactory
{
    public static function create(): Room
    {
        return (new Room())
            ->setName(RoomService::generateRoomName())
            ->setPrice(RoomService::generatePrice());
    }
}