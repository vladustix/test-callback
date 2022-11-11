<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    public $timestamps = false;
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price_within',
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
