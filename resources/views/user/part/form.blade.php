@csrf
<div class="col-12">
    @include('layout.part.error')
</div>
<div class="col-12 col-lg-6">
    <label for="name" class="form-label">Имя пользователя</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Иванов Иван Иванович"
        value="{{ old('name') ?? ($user->name ?? '') }}" @if (!empty($user->id)) disabled @endif>
</div>
<div class="col-12 col-md-6 col-lg-3">
    <label for="number" class="form-label">Номер телефона</label>
    <input type="text" class="form-control" id="number" name="number" placeholder="+7XXXXXXXXX"
        value="{{ old('number') ?? ($user->phone->number ?? '') }}">
</div>
<div class="col-12 col-md-6 col-lg-3">
    <label for="operator" class="form-label">Оператор</label>
    <select id="operator" class="form-select" name="operator_id">
        @if (empty($user->id))
            <option value="" selected disabled>Выберите...</option>
        @endif
        @foreach ($operators as $key => $operator)
            <option value="{{ old('operator_id') ?? ($operator->id ?? '') }}"
                @if ($key + 1 == old('operator_id', $user->phone->operator_id ?? '')) selected @endif>
                {{ $operator->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-12">
    <button type="submit" class="btn btn-success">
        @if (!empty($user->id))
            Изменить
        @else
            Добавить
        @endif
    </button>
</div>
