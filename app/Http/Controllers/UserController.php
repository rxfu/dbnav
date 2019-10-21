<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Auth;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $module = 'user';

    protected $storeRules = [
        'username' => 'required|unique:users',
        'password' => 'required|min:8',
        'name' => 'required',
        'email' => 'nullable|email|unique:users',
    ];

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;

        $this->updateRules = [
            'username' => 'required|unique:users,username,' . request('id'),
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . request('id'),
        ];
    }

    public function create()
    {
        $roles = $this->roleService->getAll();
        $departments = $this->departmentService->getEnabled();
        $groups = $this->groupService->getAll();

        return parent::create()->with('roles', $roles)->with('departments', $departments)->with('groups', $groups);
    }

    public function edit($id)
    {
        $roles = $this->roleService->getAll();
        $departments = $this->departmentService->getEnabled();
        $groups = $this->groupService->getAll();

        return parent::edit($id)->with('roles', $roles)->with('departments', $departments)->with('groups', $groups);
    }

    public function showUploadForm()
    {
        return view('pages.upload');
    }

    public function import(Request $request)
    {
        $this->service->import($request->file('upfile'), config('setting.manager'));

        return redirect()->route('user.index')->withSuccess('导入用户成功');
    }

    public function showConfirmForm($id)
    {
        $item = $this->service->get($id);

        return view('pages.confirm', compact('item'));
    }

    public function confirm(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email,' . request('id'),
                'leader' => 'required',
                'leader_phone' => 'required',
            ]);
    
            $request->offsetSet('is_confirmed', true);
    
            $this->service->confirm($id, $request->all());
    
            return redirect()->route('home.dashboard')->withSuccess('用户' . Auth::user()->name . '信息已确认');
        }
    }
}
