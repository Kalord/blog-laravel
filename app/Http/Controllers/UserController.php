<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreate;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function logout()
    {

    }

    public function start(Request $request)
    {
        var_dump($request->input());
    }

    public function create(UserCreate $request)
    {        
        var_dump('Here');
    }
}
