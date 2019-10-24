<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Subject;
use App\Models\Database;
use App\Models\Language;
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
        $subjects = Subject::all();
        $types = Type::all();
        $languages = Language::all();
        $databases = Database::orderBy('created_at', 'desc')->get();

        return view('search', compact('title', 'subjects', 'types', 'languages', 'databases'));
    }

    public function show($id) {
        $item = Database::findOrFail($id);
        $title = $item->name;

        return view('pages.show', compact('item', 'title'));
    }
}
