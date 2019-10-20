<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SubjectRepository;
use App\Http\Controllers\BaseController;

class SubjectController extends BaseController
{
    protected $module = 'subject';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->service = $subjectRepository;

        $this->updateRules = $this->storeRules;
    }
}
