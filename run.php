<?php

use App\Models\Repositories\HotelRepository;
use App\Services\Csv\CsvGenerator;
use App\Services\Csv\CsvParser;

require __DIR__ . '/vendor/autoload.php';

$db = new MysqliDb ('localhost', 'root', '', 'travellata');

$csv_files = scandir(CsvGenerator::CSV_PATH) ?: [];
$csv_files = array_filter(array_map(function($file) { if (strpos($file, '.csv')) { return $file; } }, $csv_files));

$parser = new CsvParser;
$parser->run($csv_files);

$hotel_repository = new HotelRepository;
$hotels = $hotel_repository->getCheapestRooms(20);

// print the hotels
foreach ($hotels as $hotel) {
    echo $hotel['hotel_id'], ': ', $hotel['hotel_name'], ' - ', $hotel['room_name'], ' - ', $hotel['price'], $hotel['currency'], '<br/>';
}
