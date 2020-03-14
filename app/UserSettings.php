<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'user_settings';

    public static function get($id)
    {
        return self::where('id_user', $id)->first();
    }
}
