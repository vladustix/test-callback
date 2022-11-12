<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Авторизация
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Правила валидации
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name'        => 'required|max:255|regex:/^([\p{Cyrillic}\s]*)$/u',
                    'number'      => 'required|unique:phones,number|min:10|max:12|regex:/^([0-9\+]*)$/',
                    'operator_id' => 'required',
                ];
            case 'PUT':
                return [
                    'number' => 'unique:phones,number|min:10|max:12|regex:/^([0-9\+]*)$/',
                ];
        }
    }

    /**
     * Сообщения об ошибках
     */
    public function messages()
    {
        return [
            'name.required'        => 'Введите имя.',
            'name.regex'           => 'Имя должно содержать буквы кириллицы и пробелы.',
            'name.max'             => 'Превышена допустимая длина.',
            'number.required'      => 'Номер телефона не может отсутствовать.',
            'number.unique'        => 'Номер телефона принадлежит другому пользователю.',
            'number.regex'         => 'Номер телефона должен содержать числа и "+".',
            'number.min'           => 'Номер телефона не может быть меньше :min символов.',
            'number.max'           => 'Номер телефона не может быть больше :max символов.',
            'operator_id.required' => 'Выберите оператора.',
        ];
    }
}
