<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Переход на страницу со списком пользователей.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('user.index', compact('users'));
    }

    /**
     * Переход на страницу создания нового пользователя.
     */
    public function create()
    {
        $operators = Operator::all();
        return view('user.create', compact('operators'));
    }

    /**
     * Добавление нового пользователя.
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        // Создание номера телефона и оператора через отношение, привязка пользователя
        $user->phone()->create([
            'number' => $request->number,
            'user_id' => $user->id,
            'operator_id' => $request->operator_id,
        ]);
        // Редирект на страницу со списком
        return redirect()->route('user.index');
    }

    /**
     * Переход на страницу изменения номера телефона и оператора.
     */
    public function edit(User $user)
    {
        $operators = Operator::all();
        return view('user.edit', compact('user', 'operators'));
    }

    /**
     * Изменение номера телефона и оператора.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        // Изменение номера телефона и оператора через отношение
        $user->phone()->update([
            'number' => $request->number,
            'operator_id' => $request->operator_id,
        ]);
        // Редирект на страницу со списком
        return redirect()->route('user.index');
    }
}
