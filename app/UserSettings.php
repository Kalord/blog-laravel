<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UserSettings extends Model
{
    const AVATAR_DIR = '/uploads/avatar/';

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

    public static function uploadAvatar(UploadedFile $avatar)
    {
        $fileName = Str::random(32) . '.' . $avatar->extension();
        $avatar->move(public_path(self::AVATAR_DIR), $fileName);

        $user = Auth()->user();
        $user->avatar = self::AVATAR_DIR . $fileName;
        $user->save();
    }
}
