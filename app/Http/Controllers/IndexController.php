<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Переход на главную страницу сайта.
     */
    public function index(Request $request)
    {
        $users = \App\Models\User::all();
        $operators = \App\Models\Operator::all();
        return view('index', compact('users', 'operators'));
    }

    /**
     * Переход на страницу с результатами.
     */
    public function result(Request $request)
    {
        if (!empty($request->user_id)) {
            // Поиск пользователя по ID
            $user = \App\Models\User::find($request->user_id);
            // Исходящие вызовы связанные пользователем
            $out = $user->callOutgoing()->get();
            // Входящие вызовы связанные пользователем
            $in = $user->callIncoming()->get();
            // Помещение всех вызовов в общий массив данных
            $all = [];
            foreach ($out as $item) {
                $all[] = $item;
            }
            foreach ($in as $item) {
                $all[] = $item;
            }
            // Исключение из массива дубликатов
            $all = array_unique($all);
            // Определение начального времени
            $time = strtotime('00:00:00');
            // Подсчет общего времени
            foreach ($all as $item) {
                $time = $time + strtotime($item->duration) - strtotime('00:00:00');
            }
            // Преобразование в формат времени
            $time = date('H:i:s', $time);
            return view('result', compact('user', 'time'));
        }

        if (!empty($request->operator_id)) {
            // Поиск оператора по ID
            $operator = \App\Models\Operator::find($request->operator_id);
            // Получение телефонов связанных с оператором
            $phones = $operator->phone()->get();
            // Определение общего массива данных для вызовов
            $all = [];
            foreach ($phones as $phone) {
                // Получение пользователей телефона
                $users = $phone->user()->get();
                // Получение списка всех пользователей
                foreach ($users as $user) {
                    // Получение вызовов связанных с пользователем
                    $out = $user->callOutgoing()->get();
                    $in = $user->callIncoming()->get();
                    // Помещение всех вызовов в общий массив
                    foreach ($out as $item) {
                        $all[] = $item;
                    }
                    foreach ($in as $item) {
                        $all[] = $item;
                    }
                }
            }
            // Исключение из массива дубликатов
            $all = array_unique($all);
            // Определение начального времени
            $time = strtotime('00:00:00');
            // Подсчет общего времени вызовов
            foreach ($all as $item) {
                $time = $time + strtotime($item->duration) - strtotime('00:00:00');
            }
            // Преобразование в формат времени
            $time = date('H:i:s', $time);
            return view('result', compact('operator', 'time'));
        }

        if (!empty($request->cost_date_start && $request->cost_date_finish && $request->cost_user_id)) {
            // Валидация и редирект по формату даты
            if (((Carbon::hasFormat($request->cost_date_start, 'Y-m-d H:i:s') && Carbon::hasFormat($request->cost_date_finish, 'Y-m-d H:i:s')) ||
                (Carbon::hasFormat($request->cost_date_start, 'Y-m-d') && Carbon::hasFormat($request->cost_date_finish, 'Y-m-d'))) == false) {
                return back()->withInput()->withErrors('Недопустимый формат даты');
            }
            // Валидация и редирект по началу даты
            if ($request->cost_date_start >= $request->cost_date_finish) {
                return back()->withInput()->withErrors('Дата начала не может быть больше конечной даты.');
            }
            // Исправление и перевод даты
            $start = date('Y-m-d H:i:s', strtotime($request->cost_date_start));
            $end = date('Y-m-d H:i:s', strtotime($request->cost_date_finish));
            // Создание строки диапазона
            $range = $request->cost_date_start . ' - ' . $request->cost_date_finish;
            // Поиск пользователя
            $cost_user = \App\Models\User::find($request->cost_user_id);
            // Поиск исходящих вызовов
            $search_out = \App\Models\Call::all()->where('started_at', '>', $start)
                ->where('finished_at', '<', $end)
                ->where('outgoing_id', '=', $cost_user->id)
                ->all();
            // Поиск входящих вызовов
            $search_in = \App\Models\Call::all()->where('started_at', '>', $start)
                ->where('finished_at', '<', $end)
                ->where('incoming_id', '=', $cost_user->id)
                ->all();
            // Объединение массивов с вызовами
            $search = $search_out + $search_in;
            // Подсчет общей стоимости
            $cost = 0;
            foreach ($search as $item) {
                $cost = $cost + $item->cost;
            }
            return view('result', compact('cost_user', 'range', 'cost'));
        } else {
            // Редирект при пустом запросе
            return back()->withInput()->withErrors('Неверный запрос');
        }
    }
}
