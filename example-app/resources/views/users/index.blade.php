<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Подключите CSS, если нужно -->
</head>
<body>
    <div class="container">
        <h1>Список пользователей</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>ФИО</th>
                    <th>Дата рождения</th>
                    <th>Моб. телефон</th>
                    <th>E-mail</th>
                    <th>Логин</th>
                    <th>Фото</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        {{-- <td>{{ $user->id }}</td> --}}
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->photo }}</td>
                        <td>
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Фото" style="width: 50px; height: auto;">
                            @else
                                Нет фото
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
