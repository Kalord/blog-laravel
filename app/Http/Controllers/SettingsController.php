<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AvatarUpload;
use App\Http\Requests\PasswordUpdate;
use Illuminate\Support\Facades\Hash;
use App\User;

class SettingsController extends Controller
{
    public function avatarUpdate(AvatarUpload $request)
    {
        User::uploadAvatar($request->file('avatar'));

        return [
            'status' => 'success',
            'src' => Auth()->user()->avatar
        ];
    }

    public function statusUpdate(Request $request)
    {
        $user = Auth()->user()->info();
        $user->status = $request->input('status');
        $user->save();
    }

    public function ageUpdate(Request $request)
    {
        $this->validate($request, [
            'selected' => 'required|min:0|max:1'
        ]);

        $userSettings = Auth()->user()->settings();
        $userSettings->show_age = (int)$request->input('selected');
        $userSettings->save();
    }

    public function weightUpdate(Request $request)
    {
        $this->validate($request, [
            'selected' => 'required|min:0|max:1'
        ]);

        $userSettings = Auth()->user()->settings();
        $userSettings->show_weight = (int)$request->input('selected');
        $userSettings->save();
    }

    public function passwordUpdate(PasswordUpdate $request)
    {
        $user = Auth()->user();

        $user->password = Hash::make($request->input('new_password'));
        $user->save();
    }
}
