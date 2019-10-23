<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\DatabaseRepository;

class DatabaseController extends BaseController
{
    protected $module = 'database';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(DatabaseRepository $databaseRepository)
    {
        $this->repository = $databaseRepository;

        $this->updateRules = $this->storeRules;
    }

    public function search(Request $request) {
        $title = '检索';

        return view('search', compact('title'));
    }
}
