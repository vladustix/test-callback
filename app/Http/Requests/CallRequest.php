<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
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
        return [
            'outgoing_id' => 'required|different:incoming_id',
            'incoming_id' => 'required|different:outgoing_id',
            'started_at'  => 'required|date_format:Y-m-d H:i:s',
            'finished_at' => 'required|date_format:Y-m-d H:i:s|after:started_at',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'outgoing_id.required'    => 'Выберите пользователя исходящего вызова.',
            'outgoing_id.different'   => 'Пользователь не может сделать вызов сам себе.',
            'incoming_id.required'    => 'Выберите пользователя входящего вызова.',
            'incoming_id.different'   => 'Пользователь не может сделать вызов сам себе.',
            'started_at.required'     => 'Напишите дату и время начала вызова.',
            'started_at.date_format'  => 'Дата и время должны иметь формат "Год-Месяц-День Час:Минута:Секунда".',
            'finished_at.required'    => 'Напишите дату и время завершения вызова.',
            'finished_at.date_format' => 'Дата и время должны иметь формат "Год-Месяц-День Час:Минута:Секунда".',
            'finished_at.after'       => 'Дата и время завершения вызова не может быть раньше начала вызова.',
        ];
    }
}
