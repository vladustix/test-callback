<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallRequest;
use App\Models\Call;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Переход на страницу "Журнал вызовов".
     */
    public function index()
    {
        $calls = Call::orderBy('id', 'desc')->paginate(20);
        return view('call.index', compact('calls'));
    }

    /**
     * Переход на страницу создания нового вызова.
     */
    public function create()
    {
        $users = User::all();
        return view('call.create', compact('users'));
    }

    /**
     * Добавление нового вызова.
     */
    public function store(CallRequest $request)
    {
        // Запросы от формы (упорядочены)
        $outgoing_id = $request->outgoing_id;
        $incoming_id = $request->incoming_id;
        $started_at = $request->started_at;
        $finished_at = $request->finished_at;
        // Обращение к модели пользователя
        $userOutgoing = User::find($outgoing_id);
        $userIncoming = User::find($incoming_id);
        // Получение продолжительности вызова
        $duration = Carbon::parse($started_at)->diff($finished_at)->format('%H:%i:%s');
        // Получение целых минут разговора, прибавляем 1
        $minute = idate('i', strtotime($duration)) + 1;
        // Получение цены внутри сети оператора от пользователя исходящего вызова
        $price_within = $userOutgoing->phone->operator->price_within;
        // Получение цены оператора на другие сети от пользователя исходящего вызова
        $price_another_out = $userOutgoing->phone->operator->price_another;
        // Получение цены оператора на другие сети от пользователя входящего вызова
        $price_another_in = $userIncoming->phone->operator->price_another;
        // Определение стоимости вызова в зависимости от цены оператора внутри и вне сети
        if ($userOutgoing->phone->operator_id == $userIncoming->phone->operator_id) {
            $cost = ($price_within * $minute) * 2;
        } else {
            $cost = ($price_another_out * $minute) + ($price_another_in * $minute);
        }
        // Добавление вызова в БД
        Call::create([
            'outgoing_id' => $outgoing_id,
            'incoming_id' => $incoming_id,
            'started_at' => $started_at,
            'finished_at' => $finished_at,
            'duration' => $duration,
            'cost' => $cost,
        ]);
        // Редирект на страницу со списком
        return redirect()->route('call.index');
    }

    /**
     * Удаление вызова.
     */
    public function destroy(Call $call)
    {
        $call->delete();
        // Редирект на страницу со списком
        return redirect()->route('call.index');
    }
}
