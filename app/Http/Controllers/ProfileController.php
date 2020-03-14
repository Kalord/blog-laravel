<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSettings;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => Auth()->user()
        ]);
    }

    public function user($id)
    {
        $user = User::find($id);

        if(!$user) abort(404);

        return view('profile', [
            'user' => $user,
            'settings' => UserSettings::get($user->id)
        ]);
    }
}
