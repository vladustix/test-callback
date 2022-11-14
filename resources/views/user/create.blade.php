@extends('layout.app')

@section('title', 'Добавление пользователя')

@section('content')
    <h1 class="text-center my-5">Добавление пользователя</h1>
    <form class="row g-3" method="POST" action="{{ route('user.store') }}">
        @include('user.part.form')
    </form>
@endsection
