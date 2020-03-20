<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class EditorController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('create', [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update()
    {

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
