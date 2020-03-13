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
        $result = $this->validate($request, [
            'name' => 'required|string|min:3|max:30|regex:~\w+~',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:255'
        ]);
        
        var_dump('Here');
    }
}
