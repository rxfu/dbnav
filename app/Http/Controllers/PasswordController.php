<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function edit()
    {
        return view('password.change');
    }

    public function change(Request $request)
    {
        if ($request->isMethod('put')) {
            list($old, $password, $confirmed) = array_values($request->only('old_password', 'password', 'password_confirmation'));
    
            $this->repository->changePassword($old, $password, $confirmed);

            return back()->withSuccess('修改密码成功');
        }
    }
}
