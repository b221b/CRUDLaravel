<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Список пользователей</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Создать нового пользователя</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Дата рождения</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Логин</th>
                    <th>Фото</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->login }}</td>
                        <td>
                          @if($user->photo)
                              <img src="data:image/jpeg;base64,{{ base64_encode($user->photo) }}" alt="User  Photo" style="max-width: 100px; max-height: 100px;">
                          @else
                              <img src="{{ asset('storage/photos/noimage.jpg') }}" alt="No Image" style="max-width: 100px; max-height: 100px;">
                          @endif
                      </td>
                      <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?');">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
