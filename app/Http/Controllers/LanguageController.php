<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\LanguageRepository;

class LanguageController extends BaseController
{
    protected $module = 'language';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->repository = $languageRepository;

        $this->updateRules = $this->storeRules;
    }
}
