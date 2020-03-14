<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarUpload extends FormRequest
{
    public function messages()
    {
        return [
            'avatar.required' => 'Неудалось загрузить изображение',
            'avatar.mimes' => 'Файл должен иметь одно из расшерений: jpg, bmp, png'
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
            'avatar' => 'required|mimes:jpeg,bmp,png'
        ];
    }
}
