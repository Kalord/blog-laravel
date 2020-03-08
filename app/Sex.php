<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'sex';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function getTitleById($id)
    {
        return (self::where('id', $id)->get())->title;
    }
}
