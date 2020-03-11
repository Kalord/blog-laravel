<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'food';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;
    
    public static function getRecipeById($id)
    {
        return self::where('id', $id)->find(1);
    }

    public static function find(Array $options)
    {
        $set = self::where('sex', $options['sex'])->
                     where('body_weight', '<=', $options['weight'])->
                     get();
        
        return $set;
    }
}
