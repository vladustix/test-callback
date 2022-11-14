@extends('layout.app')

@section('title', 'Пользователи')

@section('content')
    <h1 class="text-center my-5">Пользователи</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-4">Создать</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Оператор связи</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone->number }}</td>
                        <td>{{ $user->phone->operator->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
