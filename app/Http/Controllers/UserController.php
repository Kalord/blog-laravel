<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreate;
use App\Http\Requests\UserStart;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\UserInfo;
use App\UserSettings;
use App\Repositories\UserRepository;

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
        auth()->logout();
        return redirect()->home();
    }

    /**
     * Запоминание пользователя в системе
     * @param UserStart $request
     */
    public function start(UserStart $request)
    {
        $user = User::findByEmail($request->input('email'));

        if(Hash::check($request->input('password'), $user->password)) {
            auth()->login($user, true);

            return [
                'status' => 'success'
            ];
        }

        return [
            'status' => 'error',
            'message' => 'Некорретные данные'
        ];
    }

    /**
     * Создание пользователя
     * @param UserCreate $request
     * @return
     */
    public function create(UserCreate $request)
    {
        $request->merge(['password' => Hash::make($request->input('password'))]);
        return UserRepository::userCreate($request->input());
    }
}
