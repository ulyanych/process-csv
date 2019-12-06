<?php

namespace App\Services\Csv;

use App\Hydrators\HotelCsvHydrator;
use App\Models\HotelFactory;
use App\Models\RoomFactory;

class CsvGenerator
{
    const CSV_COLUMNS = ['ID', 'Name', 'Condition', 'State', 'Price'];
    const SEPARATOR = ';';
    const CSV_PATH = __DIR__ . '/../../../csv/';

    protected $hydrator;

    public function __construct()
    {
        $this->hydrator = new HotelCsvHydrator();
    }

    public function generate(int $csv_amount, int $hotels_amount)
    {
        for ($i=1; $i <= $csv_amount; $i++) { 
            $data = $this->generateHotelsData($hotels_amount);
            array_unshift($data, $this->generateHeaders());
            file_put_contents(self::CSV_PATH . 'csv' . $i . '.csv', implode("\n", $data));
        }
    }

    public function generateHotelsData(int $hotels_amount): array
    {
        $data = [];
        for ($i=1; $i <= $hotels_amount; $i++) { 
            $hotel = HotelFactory::create($i);
            $rooms = $this->generateRooms(5);
            $hotel->setRooms($rooms);
            $data = array_merge($data, $this->hydrator->hydrate($hotel));
        }

        return $data;
    }

    protected function generateRooms(int $rooms_amount): array
    {
        $amount = rand(1, $rooms_amount);
        return array_map(function($i) { return RoomFactory::create(); }, range(1, $amount));
    }

    public function generateHeaders(): string
    {
        return implode(self::SEPARATOR, self::CSV_COLUMNS);
    }
}