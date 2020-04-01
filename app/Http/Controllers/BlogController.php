<?php

namespace App\Http\Controllers;

use App\PostTag;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\StarsPost;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog', [
            'user'           => Auth()->user(),
            'categories'     => Category::all(),
            'tags'           => Tag::all(),
            'recommendation' => Post::getRecommendationIndex()
        ]);
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        $post->incrementView();

        $tags = PostTag::getTagsByPost($id);

        $selectedStars = StarsPost::getStars(Auth()->id(), $id);

        return view('detail', [
            'user'            => Auth()->user(),
            'post'            => $post,
            'tags'            => $tags,
            'recommendation'  => $post->getRecommendation(),
            'selectedStars'   => $selectedStars,
            'unselectedStars' => 5 - $selectedStars
        ]);
    }

    public function starsPost(Request $request)
    {
        $this->validate($request, [
            'stars' => 'required|min:1|max:5'
        ]);

        return StarsPost::addStars(
            Auth()->id(),
            $request->input('id_post'),
            $request->input('stars')
        );
    }
}
