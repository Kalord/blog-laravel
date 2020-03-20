<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;
use App\Tag;
use App\Post;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required'             => 'У записи должен быть заголовок',
            'title.min'                  => 'Минимальный размер заголовка - 3 символа',
            'title.max'                  => 'Максимальный размер заголовка - 30 символов',

            'category.required'          => 'У записи должна быть категория',
            'category.min'               => 'Некорректная категория',
            'category.max'               => 'Некорректная категория',

            'selectedTags.required'      => 'У записи должны быть теги',
            'selectedTags.min'           => 'Некорректные теги',
            'selectedTags.max'           => 'Некорректные теги',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Category
        $minCategory = Category::min('id');
        $maxCategory = Category::max('id');

        //Tags
        $minTag = Tag::min('id');
        $maxTag = Tag::max('id');

        return [
            'title'         => 'required|min:3|max:100',
            'category'      => "required|min:$minCategory|max:$maxCategory",
            'selectedTags'  => "required|min:$minTag|max:$maxTag",
            'content'       => 'required|max:10000'
        ];
    }
}
