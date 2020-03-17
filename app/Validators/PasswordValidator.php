<?php


namespace App\Validators;

use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

/**
 * Class PasswordMatchValidator
 * @package App\Validators
 */
class PasswordValidator extends Validator
{
    /**
     * Валидатор для проверки введенного пароля и текущего пароля авторизованного пользователя
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateMatch($attribute, $value, $parameters)
    {
        return Auth()->user()->password == Hash::make($value);
    }
}
