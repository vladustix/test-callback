@extends('layout.app')

@section('title', 'Создание пользователя')

@section('content')
    <h1 class="text-center my-5">Изменение номера телефона</h1>
    <form class="row g-3" method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
        @method('PUT')
        @include('user.part.form')
    </form>
@endsection
