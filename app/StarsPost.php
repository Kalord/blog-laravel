<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PercentTable;

class StarsPost extends Model
{
    protected $table = 'star_post';

    protected $fillable = [
        'id_user', 'id_post', 'stars'
    ];

    public static function getStars($id_user, $id_post)
    {
        $result = self::where('id_user', '=', $id_user)->
                        where('id_post', '=', $id_post)->
                        first();

        return $result ? $result->stars : 0;
    }

    public static function newRecord($id_user, $id_post, $stars)
    {
        return self::create([
            'id_user' => $id_user,
            'id_post' => $id_post,
            'stars'   => $stars
        ]);
    }

    public static function addStars($id_user, $id_post, $stars)
    {
        $record = self::where('id_user', '=', $id_user)->
                        where('id_post', '=', $id_post)->
                        first();

        if(!$record) return self::newRecord($id_user, $id_post, $stars);

        $record->stars = $stars;
        return $record->save();
    }

    public static function percentCalc($id_user)
    {
        $percentTableStars = new PercentTableStars();
        return $percentTableStars->calc($id_user);
    }
}
