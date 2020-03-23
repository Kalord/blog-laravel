<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function show(Request $request, $id)
    {
        return Comment::getCommentsByIdPost(
            $id, $request->input('limit'), $request->input('pivot')
        );
    }

    public function create(Request $request)
    {

    }
}
