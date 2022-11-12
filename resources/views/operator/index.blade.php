@extends('layout.app')

@section('title', 'Операторы')

@section('content')
    <h2 class="text-center my-4">Операторы</h2>
    <a href="{{ route('operator.create') }}" class="btn btn-primary mb-4">Создать</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Цена вызова внутри сети</th>
                <th scope="col">Цена вызова на другие сети</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operators as $operator)
                <tr>
                    <th scope="row">{{ $operator->id }}</th>
                    <td>{{ $operator->name }}</td>
                    <td>{{ $operator->price_within }}</td>
                    <td>{{ $operator->price_another }}</td>
                    <td class="text-center">
                        <a href="{{ route('operator.edit', ['operator' => $operator->id]) }}">
                            <i class="bi bi-pencil-square text-primary"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
