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

    const DEFAULT_LIMIT = 10;

    public static function getCommentsByIdPost($id_post, $start = null)
    {
        $state = self::where('id_post', $id_post);

        if($start) $state->where('id', $start);

        return $state->orderBy('id', 'desc')->limit(self::DEFAULT_LIMIT)->get();
    }
}
