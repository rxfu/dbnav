<?php

namespace App\Repositories;

use App\Models\Type;

class TypeRepository extends Repository
{
    public function __construct(Type $type)
    {
        $this->object = $type;
    }
}
