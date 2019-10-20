<?php

namespace App\Repositories;

use App\Models\Database;

class DatabaseRepository extends Repository
{
    public function __construct(Database $database)
    {
        $this->object = $database;
    }
}
