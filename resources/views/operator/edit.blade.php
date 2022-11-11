@extends('layout.app')

@section('title', 'Редактирование оператора')

@section('content')
    <h2 class="text-center my-4">Редактирование оператора</h2>
    <form class="row g-3" method="POST" action="{{ route('operator.update', ['operator' => $operator->id]) }}">
        @method('PUT')
        @include('operator.part.form')
    </form>
@endsection
