<?php

namespace App\Hydrators;

use App\Models\Hotel;
use App\Services\Csv\CsvGenerator;

class HotelCsvHydrator
{
    public function hydrate(Hotel $hotel): array
    {
        $data = [];
        foreach ($hotel->getRooms() as $room) {
            $data[] = implode(CsvGenerator::SEPARATOR, 
                [$hotel->getId(), $hotel->getName(), $room->getName(), $hotel->getState(), $room->getPrice()]
            );
        }
        return $data;
    }
}