<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Переход на главную страницу сайта.
     */
    public function index() {
        return view('index');
    }
}
