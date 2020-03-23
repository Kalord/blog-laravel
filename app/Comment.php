<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getCommentsByIdPost($id_post, $limit = 10, $pivot = null)
    {
        $state = self::where('id_post', $id_post);

        if($pivot) $state->where('id', $pivot);

        return $state->orderBy('id', 'desc')->limit($limit)->get();
    }
}
