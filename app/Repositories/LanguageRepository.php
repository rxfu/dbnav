<?php

namespace App\Repositories;

use App\Models\Language;

class LanguageRepository extends Repository
{
    public function __construct(Language $language)
    {
        $this->object = $language;
    }
}
