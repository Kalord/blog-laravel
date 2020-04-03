<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSettings;
use App\Post;
use App\Category;
use App\StarsPost;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user'   => Auth()->user(),
            'stars'  => StarsPost::percentCalc(Auth()->id()),
            'advice' => Post::getPopularPostsByIdUser(Auth()->id(), Category::getIdByTitle('advice')),
            'recipe' => Post::getPopularPostsByIdUser(Auth()->id(), Category::getIdByTitle('recipe'))
        ]);
    }

    public function user($id)
    {
        $user = User::findOrFail($id);

        return view('profile', [
            'user'      => $user,
            'settings'  => UserSettings::get($user->id),
            'advice' => Post::getPopularPostsByIdUser(Auth()->id(), Category::getIdByTitle('advice')),
            'recipe' => Post::getPopularPostsByIdUser(Auth()->id(), Category::getIdByTitle('recipe'))
        ]);
    }

    public function identity()
    {
        return Auth()->user()->token;
    }
}
