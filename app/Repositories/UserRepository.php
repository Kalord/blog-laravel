<?php

namespace App\Repositories;

use App\User;
use App\UserInfo;
use App\UserSettings;

class UserRepository 
{
    public static function userCreate(Array $data)
    {
        $user = User::create($data);

        $userInfo = new UserInfo();
        $userSettings = new UserSettings();

        $userInfo->id_user = $user->id;
        $userSettings->id_user = $user->id;

        $userInfo->save();
        $userSettings->save();

        return $user;
    }
}