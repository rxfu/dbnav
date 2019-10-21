<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TypeRepository;
use App\Http\Controllers\BaseController;

class TypeController extends BaseController
{
    protected $module = 'type';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(TypeRepository $typeRepository)
    {
        $this->repository = $typeRepository;

        $this->updateRules = $this->storeRules;
    }
}
