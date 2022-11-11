@extends('layout.app')

@section('title', 'Добавление пользователя')

@section('content')
    <h2 class="text-center my-4">Добавление пользователя</h2>
    <form class="row g-3" method="POST" action="{{ route('user.store') }}">
        @include('user.part.form')
    </form>
@endsection
