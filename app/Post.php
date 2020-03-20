<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'post';

    protected $fillable = [
        'title', 'cover', 'id_category', 'status', 'content', 'id_user'
    ];

    const DEFAULT_LIMIT = 10;

    /**
     * Пост заблокирован
     */
    const STATUS_BANNED = 3;

    /**
     * Пост удален автором
     */
    const STATUS_DELETE = 2;

    /**
     * Пост опубликован, каждый может его смотреть
     */
    const STATUS_PUBLISHED = 1;

    /**
     * Пост находится в черновиках, его может просматривать только автор
     */
    const STATUS_DRAFT = 0;

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'id_category')->first();
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user')->
                      select(['id', 'name', 'email', 'avatar'])->
                      first();
    }

    public static function findByOptions($limit = self::DEFAULT_LIMIT, $pivot = null)
    {
        $state = self::orderBy('id', 'desc')->
                       limit($limit);

        if($pivot) $state->where('id', '<', $pivot);
        return $state->get();
    }

    /**
     * Данный метод объединяет по ключам id_category и id_user
     * соответствующие таблицы, затем сохраняет полученные данные
     * в свойства category и user
     */
    public function joinTables()
    {
        $this->category = $this->category();
        $this->user = $this->user();
    }
}
