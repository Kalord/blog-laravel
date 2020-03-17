<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdate extends FormRequest
{
    public function messages()
    {
        return [
            'old_password.required'  => 'Необходимо указать пароль',
            'old_password.min'  => 'Минимальный размер пароля 8 символова',
            'old_password.max'  => 'Максимальный размер пароля 255 символова',
            'old_password.Password' => 'Неверный пароль',
            
            'new_password.required'  => 'Необходимо указать пароль',
            'new_password.confirmed'  => 'Пароли несовпадают',
            'new_password.min'  => 'Минимальный размер пароля 8 символова',
            'new_password.max'  => 'Максимальный размер пароля 255 символова',
            'new_password.confirmed'  => 'Пароли несовпадают'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|min:8|max:255|Password',
            'new_password' => 'required|min:8|max:255|confirmed'
        ];
    }
}
