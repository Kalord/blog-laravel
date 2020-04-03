<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;
use App\Tag;
use App\Post;
use App\User;

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
            'title.required'       => 'У записи должен быть заголовок',
            'title.min'            => 'Минимальный размер заголовка - 3 символа',
            'title.max'            => 'Максимальный размер заголовка - 30 символов',

            'cover.required'       => 'Неудалось загрузить изображение',
            'cover.mimes'          => 'Файл должен иметь одно из расшерений: jpg, bmp, png',

            'id_category.required' => 'У записи должна быть категория',
            'id_category.min'      => 'Некорректная категория',
            'id_category.max'      => 'Некорректная категория',

            'selectedTags'         => 'У записи должны быть теги',
            'selectedTags.min'     => 'Некорректные теги',
            'selectedTags.max'     => 'Некорректные теги'
        ];
    }

    private function prepareResources()
    {
        $resources = [];
        $i = 0;

        while(key_exists("resource-$i", $this->all()))
        {
            $resources[] = $this->all()["resource-$i"];
            $i++;
        }

        if(!empty($resources)) $this->merge([
            'resources' => $resources
        ]);
    }

    protected function prepareForValidation()
    {
        $this->prepareResources();

        $mergeData = [
            'id_user' => User::findIdByToken($this->get('id_user'))
        ];

        if($this->get('selectedTags'))
        {
            $mergeData['selectedTags'] = explode(',', $this->get('selectedTags'));
        }

        $this->merge($mergeData);
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
            'cover'         => 'required|mimes:jpeg,bmp,png',
            'id_category'   => "required|min:$minCategory|max:$maxCategory",
            'selectedTags'  => "min:$minTag|max:$maxTag",
            'content'       => 'required|max:10000',
            'resources.*'   => 'mimes:jpeg,bmp,png'
        ];
    }
}
