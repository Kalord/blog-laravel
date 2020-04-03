<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StarsPost;

class PercentTableStars extends Model
{
    public function calc($id_user)
    {
        $percent = (int)StarsPost::where('id_user', '=', $id_user)->count('id') / 100;
        $stars = [];

        for($i = 5; $i > 0; $i--)
        {
            $stars[$i] = StarsPost::where('id_user', '=', $id_user)->
                               where('stars', '=', $i)->
                               count('id');
            $stars[$i] = (int)($stars[$i] / $percent);
        }

        return $stars;
    }
}
