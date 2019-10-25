<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LinkRepository;
use App\Http\Controllers\BaseController;

class LinkController extends BaseController
{
    protected $module = 'link';

    protected $storeRules = [
        'name' => 'required',
    ];

    public function __construct(LinkRepository $linkRepository)
    {
        $this->repository = $linkRepository;

        $this->updateRules = $this->storeRules;
    }
}
