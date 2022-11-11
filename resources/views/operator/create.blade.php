@extends('layout.app')

@section('title', 'Создание оператора')

@section('content')
    <h2 class="text-center my-4">Создание оператора</h2>
    <form class="row g-3" method="POST" action="{{ route('operator.store') }}">
        @include('operator.part.form')
    </form>
@endsection
