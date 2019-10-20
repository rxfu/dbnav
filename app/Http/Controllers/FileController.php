<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FileRepository;
use App\Http\Controllers\BaseController;

class FileController extends BaseController
{
    protected $module = 'file';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(FileRepository $fileRepository)
    {
        $this->service = $fileRepository;

        $this->updateRules = $this->storeRules;
    }
}
