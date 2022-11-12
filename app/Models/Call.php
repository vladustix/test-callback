<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    // Отключить updated_at и created_at
    public $timestamps = false;

    protected $fillable = [
        'outgoing_id',
        'incoming_id',
        'started_at',
        'finished_at',
        'duration',
        'cost',
    ];

    /**
     * Обратная связь один-ко-многим от Call к User через исходящие вызовы - outgoing_id.
     * Получить пользователя, связанного с исходящим вызовом.
     */
    public function userOutgoing()
    {
        return $this->belongsTo(User::class, 'outgoing_id');
    }

    /**
     * Обратная связь один-ко-многим от Call к User через входящие вызовы - incoming_id.
     * Получить пользователя, связанного с входящим вызовом.
     */
    public function userIncoming()
    {
        return $this->belongsTo(User::class, 'incoming_id');
    }
}
