@extends('layout.app')

@section('title', 'Создание оператора')

@section('content')
    <h1 class="text-center my-5">Создание оператора</h1>
    <form class="row g-3" method="POST" action="{{ route('operator.store') }}">
        @include('operator.part.form')
    </form>
@endsection
