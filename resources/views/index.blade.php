@extends('layout.app')

@section('title', 'Статистика')

@section('content')
    <h2 class="text-center mt-4">Статистика</h2>
    <div class="pt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="fs-5">Длительность вызова</h3>
        <div class="row">
            <div class="col-6">
                <form class="g-3" method="GET" action="{{ route('result') }}">
                    <label for="userId" class="form-label">Пользователь</label>
                    <div class="d-flex gap-2">
                        <select id="userId" class="form-select" name="user_id">
                            <option disabled selected>Выберите...</option>
                            @foreach ($users as $user)
                                <option value="{{ old('user_id') ?? ($user->id ?? '') }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <form class="g-3" method="GET" action="{{ route('result') }}">
                    <label for="userId" class="form-label">Оператор</label>
                    <div class="d-flex gap-2">
                        <select id="userId" class="form-select" name="operator_id">
                            <option disabled selected>Выберите...</option>
                            @foreach ($operators as $operator)
                                <option value="{{ old('operator_id') ?? ($operator->id ?? '') }}">
                                    {{ $operator->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="pt-4">
        <h3 class="fs-5">Расходы пользователя</h3>
        <form method="GET" action="{{ route('result') }}">
            <div class="row g-3">
                <div class="col-3">
                    <label for="userId" class="form-label">Пользователь</label>
                    <select id="costUserId" class="form-select" name="cost_user_id">
                        <option disabled selected>Выберите...</option>
                        @foreach ($users as $user)
                            <option value="{{ old('cost_user_id') ?? ($user->id ?? '') }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="costDateStart" class="form-label">Начало</label>
                    <input type="text" class="form-control" id="costDateStart" name="cost_date_start"
                        placeholder="2022-11-09 00:00:00" value="{{ old('cost_date_start') }}">
                </div>
                <div class="col-6">
                    <label for="costDateFinish" class="form-label">Конец</label>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control" id="costDateFinish" name="cost_date_finish"
                        placeholder="2022-11-09 00:05:00" value="{{ old('cost_date_finish') }}">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
