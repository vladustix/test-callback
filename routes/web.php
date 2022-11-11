<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::resource('call', App\Http\Controllers\CallController::class, ['except' => 'show', 'edit', 'update']);
Route::resource('user', App\Http\Controllers\UserController::class, ['except' => 'show', 'delete']);
Route::resource('operator', App\Http\Controllers\OperatorController::class, ['except' => 'show', 'delete']);
