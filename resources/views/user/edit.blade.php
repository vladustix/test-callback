@extends('layout.app')

@section('title', 'Создание пользователя')

@section('content')
    <h2 class="text-center my-4">Изменение номера телефона</h2>
    <form class="row g-3" method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
        @method('PUT')
        @include('user.part.form')
    </form>
@endsection
