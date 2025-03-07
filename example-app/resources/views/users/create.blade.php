<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание пользователя</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Создание пользователя</h1>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">ФИО</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="birthday">Дата рождения</label>
              <input type="date" name="birthday" id="birthday" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="telephone">Моб. телефон</label>
              <input type="text" name="telephone" id="telephone" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="login">Логин</label>
              <input type="text" name="login" id="login" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="photo">Фото</label>
              <input type="file" name="photo" id="photo" class="form-control-file">
          </div>
          <button type="submit" class="btn btn-success">Создать пользователя</button>
      </form>

      @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  </div>
</body>
</html>
