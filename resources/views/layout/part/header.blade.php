<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Callback</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Статистика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('call.index') }}">Журнал вызовов</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('operator.index') }}">Операторы</a>
                </li>
            </ul>
            <a class="btn btn-success ms-lg-3 mb-2 mb-lg-0" href="https://github.com/vladustix/test-callback"><i class="bi bi-cloud-download"></i> Скачать</a>
        </div>
    </div>
</nav>
