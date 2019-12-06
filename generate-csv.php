<?php

    use App\Services\Csv\CsvGenerator;

    require __DIR__ . '/vendor/autoload.php';

    $generator = new CsvGenerator;
    $generator->generate(10, 100);
