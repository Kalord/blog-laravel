<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostCreateRequest;
use App\DataProvider\PostFindOptions;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $postFindOptions = new PostFindOptions();
        $postFindOptions->load($request->input());

        $posts = Post::findByOptions($postFindOptions);
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
        $post->incrementView();
        
        $post->joinTables();
        return $post;
    }

    public function create(PostCreateRequest $request)
    {
        return Post::createPost($request->input(), $request->file());
    }
}
