<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login($credentials)
    {
        if(Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}