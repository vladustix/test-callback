@extends('layout.app')

@section('title', 'Редактирование оператора')

@section('content')
    <h1 class="text-center my-5">Редактирование оператора</h1>
    <form class="row g-3" method="POST" action="{{ route('operator.update', ['operator' => $operator->id]) }}">
        @method('PUT')
        @include('operator.part.form')
    </form>
@endsection
