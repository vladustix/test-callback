<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    // Отключить updated_at и created_at
    public $timestamps = false;

    protected $fillable = [
        // Номер телефона
        'number',
        // ID пользователя
        'user_id',
        // ID оператора
        'operator_id',
    ];

    /**
     * Обратная связь один-к-одному от Phone к User.
     * Получить пользователя, владеющего телефоном.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Обратная связь один-ко-многим от Phone к Operator.
     * Получить оператора, владеющего телефоном.
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }
}
