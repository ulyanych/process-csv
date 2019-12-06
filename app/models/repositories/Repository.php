<?php

namespace App\Models\Repositories;

use MysqliDb;

class Repository
{
    /* @var MysqliDb */
    protected $db;

    public function __construct()
    {
        $this->db = MysqliDb::getInstance();
    }
}