<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    const COVER_DIR = '/uploads/covers/';

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

    public static function createPost($data, $files)
    {
        if(key_exists('cover', $files))
        {
            $cover = $files['cover'];
            $fileName = self::COVER_DIR . Str::random(16) . '.' . $cover->extension();
            $cover->move(public_path(self::COVER_DIR), $fileName);
            $data['cover'] = $fileName;
        }

        return parent::create($data);
    }

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

    public static function findByOptions($limit = self::DEFAULT_LIMIT, $pivot = null)
    {
        $state = self::orderBy('id', 'desc')->
                       limit($limit);

        if($pivot) $state->where('id', '<', $pivot);
        return $state->get();
    }

    public static function findPostByIdUser($id_user, $limit = 10, $start = null)
    {
        $state = self::where('id_user', $id_user);

        if($start) $state->where('id', '<', $start);

        return $state->orderBy('id', 'desc')->limit($limit)->get();
    }
}
