<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSettings;
use App\Post;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user'  => Auth()->user(),
            'posts' => Post::findPostByIdUser(Auth()->id())
        ]);
    }

    public function user($id)
    {
        $user = User::findOrFail($id);

        return view('profile', [
            'user'      => $user,
            'settings'  => UserSettings::get($user->id),
            'posts'     => Post::findPostByIdUser($user->id)
        ]);
    }

    public function identity()
    {
        return Auth()->user()->token;
    }
}
