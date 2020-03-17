<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    const AVATAR_DIR = '/uploads/avatar/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function info()
    {
        return $this->hasOne('App\UserInfo', 'id_user')->first();
    }

    public function settings()
    {
        return $this->hasOne('App\UserSettings', 'id_user')->first();
    }

    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
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
