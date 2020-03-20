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

    public function generateToken()
    {
        $this->token = Str::random(32);
    }

    public static function findByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public static function findIdByToken($token)
    {
        $user = self::where('token', $token)->first();
        return $user ? $user->id : null;
    }
}
