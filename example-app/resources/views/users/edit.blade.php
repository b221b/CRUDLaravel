<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование пользователя</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Редактирование пользователя</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Дата рождения</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $user->birthday }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Моб. телефон</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $user->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control" value="{{ $user->login }}" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль (оставьте пустым, если не хотите менять)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="photo">Фото</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
            <div class="form-group">
                <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="User  Photo" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
            </div>
            <button type="submit" class="btn btn-primary">Обновить пользователя</button>

      </form>
  </div>
</body>
</html>

