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
            'username' => 'required|unique:users,username,' . request($this->module),
            'name' => 'required',
            'email' => 'nullable|email|unique:users,email,' . request($this->module),
        ];
    }
}
