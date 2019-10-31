<?php

namespace App\Http\Controllers;

use Auth;
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

    public function create() {
        $subjects = Subject::all();
        $types = Type::all();
        $languages = Language::all();

        return view('database.create', compact('subjects', 'types', 'languages'));
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'slug' => 'required',
        ];
        $this->validate($request, $rules);

        $item = [
           'name' => $request->input('name'),
           'slug' => $request->input('slug'),
           'remote_url' => str_replace(PHP_EOL, '|', $request->input('remote_url')),
           'local_url' => str_replace(PHP_EOL, '|', $request->input('local_url')),
           'brief' => $request->input('brief'),
           'content' => $request->input('content'),
           'status' => $request->input('status'),
           'expired_at' => $request->input('expired_at'),
           'remark' => $request->input('remark'),
           'user_id' => Auth::id(),
        ];
        $database = $this->repository->store($item);
        $database->subjects()->sync($request->input('subjects'));
        $database->types()->sync($request->input('types'));
        $database->languages()->sync($request->input('languages'));

        return redirect()->route('database.index')->withSuccess('创建' . __('database.module') . '成功');
    }

    public function edit($database) {
        $subjects = Subject::all();
        $types = Type::all();
        $languages = Language::all();
        $item = Database::findOrFail($database);

        return view('database.edit', compact('subjects', 'types', 'languages', 'item'));
    }

    public function update(Request $request, $database) {
        if ($request->isMethod('put')){
            $rules = [
                'name' => 'required',
                'slug' => 'required',
            ];
            $this->validate($request, $rules);

            $item = [
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'remote_url' => str_replace(PHP_EOL, '|', $request->input('remote_url')),
                'local_url' => str_replace(PHP_EOL, '|', $request->input('local_url')),
                'brief' => $request->input('brief'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'expired_at' => $request->input('expired_at'),
                'remark' => $request->input('remark'),
                'user_id' => Auth::id(),
            ];
            $database = $this->repository->update($database, $item);
            $database->subjects()->sync($request->input('subjects'));
            $database->types()->sync($request->input('types'));
            $database->languages()->sync($request->input('languages'));

            return redirect()->route('database.index')->withSuccess('更新' . __('database.module') . '成功');
        }
    }

    public function search(Request $request) {
        $title = '检索';
        $limit = 10;

        $subjects = Subject::all();
        $types = Type::all();
        $languages = Language::all();

        $keyword = $request->has('keyword') ? $request->input('keyword') : null;
        $letters = $request->has('letters') ? $request->input('letters') : null;
        $subject = $request->has('subjects') ? $request->input('subjects') : null;
        $type = $request->has('types') ? $request->input('types') : null;
        $language = $request->has('languages') ? $request->input('languages') : null;

        $databases = $this->repository->getDatabasesByPage($limit, $keyword, $letters, $subject, $type, $language);
   
        return view('database.search', compact('title', 'subjects', 'types', 'languages', 'databases', 'keyword', 'letters', 'subject', 'type', 'language'));
    }

    public function show($id) {
        $item = Database::findOrFail($id);
        $title = $item->name;

        return view('database.show', compact('item', 'title'));
    }
}
