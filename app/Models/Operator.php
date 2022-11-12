<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    // Отключить updated_at и created_at
    public $timestamps = false;

    protected $fillable = [
        'name',
        // Цена внутри сети
        'price_within',
        // Цена на другие сети
        'price_another',
    ];

    /**
     * Отношение один-ко-многим от Operator к Phone.
     * Получить телефоны, связанные с оператором.
     */
    public function phone()
    {
        return $this->hasMany(Phone::class, 'operator_id');
    }
}
