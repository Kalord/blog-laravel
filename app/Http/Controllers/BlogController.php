<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog', [
            'user'       => Auth()->user(),
            'categories' => Category::all(),
            'tags'       => Tag::all()
        ]);
    }

    public function detail($id)
    {
        return view('detail', [
            'user' => Auth()->user()
        ]);
    }
}
