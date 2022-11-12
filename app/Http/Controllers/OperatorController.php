<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperatorRequest;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Переход на страницу со списком операторов.
     */
    public function index()
    {
        $operators = Operator::orderBy('id', 'desc')->paginate(20);
        return view('operator.index', compact('operators'));
    }

    /**
     * Переход на страницу создания нового оператора.
     */
    public function create()
    {
        return view('operator.create');
    }

    /**
     * Добавление нового оператора.
     */
    public function store(OperatorRequest $request)
    {
        Operator::create($request->all());
        // Редирект на страницу со списком
        return redirect()->route('operator.index');
    }

    /**
     * Переход на страницу редактирования оператора.
     */
    public function edit(Operator $operator)
    {
        return view('operator.edit', compact('operator'));
    }

    /**
     * Изменение данных оператора.
     */
    public function update(OperatorRequest $request, Operator $operator)
    {
        $operator->update($request->all());
        // Редирект на страницу со списком
        return redirect()->route('operator.index');
    }
}
