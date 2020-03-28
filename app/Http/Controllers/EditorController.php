<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class EditorController extends Controller
{
    public function index()
    {
        return view('editor', [
            'user'   => Auth()->user(),
            'allViews' => Post::countViewsByIdUser(Auth()->id())
        ]);
    }

    public function create()
    {
        return view('create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update($id)
    {
        return view('update', [
            'post' => Post::findOrFail($id),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function read()
    {

    }

    public function delete()
    {

    }

    public function demo()
    {

    }
}
