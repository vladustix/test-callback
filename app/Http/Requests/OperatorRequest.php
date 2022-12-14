<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
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
                    'name'          => 'required|max:255|regex:/^([a-zA-Z\p{Cyrillic}0-9\s]*)$/u',
                    'price_within'  => 'required|integer',
                    'price_another' => 'required|integer',
                ];
            case 'PUT':
                return [
                    'name'          => 'max:255|regex:/^([a-zA-Z\p{Cyrillic}0-9\s]*)$/u',
                    'price_within'  => 'integer',
                    'price_another' => 'integer',
                ];
        }
    }

    /**
     * Сообщения об ошибках
     */
    public function messages()
    {
        return [
            'name.required'         => 'Введите название.',
            'name.regex'            => 'Название должно содержать буквы, цифры и пробелы.',
            'name.max'              => 'Превышена допустимая длина названия.',
            'price_within.required'  => 'Введите цену внутри сети.',
            'price_within.integer'  => 'Цена должна содержать целое число.',
            'price_another.required' => 'Введите цену на другие сети.',
            'price_another.integer' => 'Цена должна содержать целое число.',
        ];
    }
}
