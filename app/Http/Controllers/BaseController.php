<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $module;

    protected $repository;

    protected $storeRules = [];

    protected $updateRules = [];

    public function index()
    {
        $items = $this->repository->getAll();
        
        return view('pages.list', compact('items'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->storeRules);

        $this->repository->store($request->all());

        return redirect()->route($this->module . '.index')->withSuccess('创建' . trans($this->module . '.module') . '成功');
    }

    public function edit($id)
    {
        $item = $this->repository->get($id);

        return view('pages.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $this->validate($request, $this->updateRules);

            $this->repository->update($id, $request->all());

            return redirect()->route($this->module . '.index')->withSuccess('更新' . trans($this->module . '.module') . '成功');
        }
    }

    public function delete(Request $request)
    {
        $this->repository->delete($request->input('items'));

        return redirect()->route($this->module . '.index')->withSuccess('删除' . trans($this->module . '.module') . '成功');
    }
}
