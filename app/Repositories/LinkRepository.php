<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository extends Repository
{
    public function __construct(Link $file)
    {
        $this->object = $file;
    }
}
