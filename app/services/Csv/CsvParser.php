<?php

namespace App\Services\Csv;

use App\Models\Repositories\HotelRepository;

class CsvParser
{
    /*  @var HotelRepository */
    protected $hotel_repository;

    public function __construct()
    {
        $this->hotel_repository = new HotelRepository;
    }

    public function run(array $csv_files) 
    {
        $processes = array_map(function($csv_file) { return $this->processFile($csv_file); }, $csv_files);

        while (true) {
            foreach ($processes as $key => $process) {
                 $process->next();
                 if (!$process->valid()) {              
                     unset($processes[$key]);
                 }
            }
            if (empty($processes)) { return; }
        }
    }

    private function processFile(string $file) 
    {
        $f = fopen(CsvGenerator::CSV_PATH . $file, 'r');
        if (!$f) { return false; }
    
        while ($line = fgets($f)) {
            $data[] = $this->processLine($line);            
            yield true;
        }
        fclose($f);

        $data = array_filter($data);      
        $this->hotel_repository->saveData($data);
    }

    private function processLine(string $line)
    {
        $data = str_getcsv($line, CsvGenerator::SEPARATOR);
        if (!ctype_digit($data[0])) {
            return null; 
        }
        $price = array_pop($data);
        $currency = substr($price, -3);
    
        $data[] = (float) trim($price);
        $data[] = $currency;
        return $data;
    }
}
