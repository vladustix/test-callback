<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name'          => 'required|max:255|regex:/^([\p{Cyrillic}\s]*)$/u',
                    'price_within'  => 'integer',
                    'price_another' => 'integer',
                ];
            case 'PUT':
                return [
                    'name'          => 'max:255|regex:/^([\p{Cyrillic}\s]*)$/u',
                    'price_within'  => 'integer',
                    'price_another' => 'integer',
                ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Введите название.',
            'name.regex'            => 'Название должно содержать буквы кириллицы и пробелы.',
            'name.max'              => 'Превышена допустимая длина названия.',
            'price_within.integer'  => 'Цена должна содержать целое число.',
            'price_another.integer' => 'Цена должна содержать целое число.',
        ];
    }
}
