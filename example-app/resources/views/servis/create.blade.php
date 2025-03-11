<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание услуги</title>
</head>
<body>
    <h1>Новая услуга</h1>
    <form action="{{ route('servis.store') }}" method="POST">
        @csrf
        <label for="name">Название:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" id="price" step="0.01" required>
        <br>
        <input type="hidden" name="status" value="0">
        <label for="name">Статус:</label>
        <input type="checkbox" name="status" id="status" value="1">
        <br>
        <button type="submit">Добавить</button>
    </form>
    <a href="{{ route('servis.index') }}">Назад к списку услуг</a>
</body>
</html>
