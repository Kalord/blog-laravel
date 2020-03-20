<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('limit') ? $request->input('limit') : Post::DEFAULT_LIMIT;
        $pivot = $request->input('pivot') ? $request->input('pivot') : null;

        $posts = Post::findByOptions($limit, $pivot);
        foreach($posts as &$post) $post->joinTables();

        return $posts;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $post->joinTables();
        return $post;
    }

    public function create(PostCreateRequest $request)
    {
        return Post::create($request->input());
    }
}
