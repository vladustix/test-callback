<?php

use Illuminate\Support\Facades\Route;


// Прямой маршрут на главную страницу index
Route::get('', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
// Прямой маршрут на страницу result
Route::get('result', [App\Http\Controllers\IndexController::class, 'result'])->name('result');
// Ресурсный маршрут call, убираем show, edit и update
Route::resource('call', App\Http\Controllers\CallController::class, ['except' => 'show', 'edit', 'update']);
// Ресурсный маршрут user, убираем show и delete
Route::resource('user', App\Http\Controllers\UserController::class, ['except' => 'show', 'delete']);
// Ресурсный маршрут operator, убираем show и delete
Route::resource('operator', App\Http\Controllers\OperatorController::class, ['except' => 'show', 'delete']);
