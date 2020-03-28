<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use \App\DataProvider\PostFindOptions;

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

    const RECOMMENDATION_LIMIT = 10;

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

    public function bindSelectedTags(Array $selectedTags)
    {
        PostTag::createRation($this->id, $selectedTags);
    }

    public static function createPost($data, $files)
    {
        if(key_exists('cover', $files))
        {
            $cover = $files['cover'];
            $fileName = self::COVER_DIR . Str::random(16) . '.' . $cover->extension();
            $cover->move(public_path(self::COVER_DIR), $fileName);
            $data['cover'] = $fileName;
        }

        $post = parent::create($data);

        if(key_exists('selectedTags', $data) && $post)
        {
            $post->bindSelectedTags($data['selectedTags']);
        }

        return $post;
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

    public function incrementView()
    {
        $this->views++;
        $this->save();
    }

    public static function getRecommendation()
    {
        return self::orderBy('views', 'desc')->limit(self::RECOMMENDATION_LIMIT)->get();
    }

    public static function findByOptions(PostFindOptions $postFindOptions)
    {
        $state = self::orderBy('post.id', 'desc')->
                       select('post.*', 'category.title as category_title')->
                       join('category', 'post.id_category', '=', 'category.id')->
                       limit($postFindOptions->limit);

        //START TODO: Refactoring
        if($postFindOptions->pivot)
            $state->where('post.id', '<', $postFindOptions->pivot);

        if($postFindOptions->id_category)
            $state->where('id_category', $postFindOptions->id_category);

        if($postFindOptions->id_user)
            $state->where('id_user', $postFindOptions->id_user);
        //END TODO

        return $state->get();
    }

    public static function findPostByIdUser($id_user, $limit = 10, $start = null)
    {
        $state = self::where('id_user', $id_user);

        if($start) $state->where('id', '<', $start);

        return $state->orderBy('id', 'desc')->limit($limit)->get();
    }

    public static function getPopularPostsByIdUser($id_user, $id_category = null, $limit = 3)
    {
        $state = self::where('id_user', $id_user)->orderBy('views', 'desc')->limit($limit);

        if($id_category) $state->where('id_category', $id_category);

        return $state->get();
    }

    public static function countViewsByIdUser($id_user)
    {
        return self::where('id_user', $id_user)->sum('views');
    }
}
