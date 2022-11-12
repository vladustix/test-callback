<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // Отключить updated_at и created_at
    public $timestamps = false;

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        // Имя
        'name',
    ];

    /**
     * Отношение один-к-одному от User к Phone.
     * Получить телефон, связанный с пользователем.
     */
    public function phone()
    {
        return $this->hasOne(Phone::class, 'user_id');
    }

    /**
     * Отношение один-ко-многим от User к Phone через исходящие вызовы - outgoing_id.
     * Получить исходящие вызовы, связанные с пользователем.
     */
    public function callOutgoing()
    {
        return $this->hasMany(Call::class, 'outgoing_id');
    }

    /**
     * Отношение один-ко-многим от User к Call через входящие вызовы - incoming_id.
     * Получить входящие вызовы, связанные с пользователем.
     */
    public function callIncoming()
    {
        return $this->hasMany(Call::class, 'incoming_id');
    }
}
