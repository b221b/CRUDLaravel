<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать услугу</title>
</head>
<body>
    <h1>Создать услугу</h1>
    <form action="{{ route('servis.store') }}" method="POST">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <br>
        <button type="submit">Добавить</button>
    </form>
    <a href="{{ route('servis.index') }}">Назад к списку услуг</a>
</body>
</html>
