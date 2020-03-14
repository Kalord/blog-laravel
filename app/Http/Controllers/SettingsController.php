<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AvatarUpload;
use App\User;

class SettingsController extends Controller
{
    public function avatar(AvatarUpload $request)
    {
        User::uploadAvatar($request->file('avatar'));
        
        return [
            'status' => 'success',
            'src' => Auth()->user()->avatar
        ];
    }
}
