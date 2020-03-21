<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'post_tag';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function createRation($id_post, Array $tags)
    {
        foreach ($tags as $tag)
        {
            $postTag            = new PostTag();
            $postTag->id_post   = $id_post;
            $postTag->id_tag    = $tag;
            $postTag->save();
        }
    }

    public static function getTagsByPost($id_post)
    {
        return self::where('id_post', $id_post)->join('tag', 'post_tag.id_tag', 'tag.id')->get();
    }
}
