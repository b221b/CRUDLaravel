<!DOCTYPE html>
<html>
<head>
    <title>Редактирование услуги</title>
</head>
<body>
    <h1>Редактирование услуги</h1>
    <form action="{{ route('servis.update', $servis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Название:</label>
        <input type="text" name="name" value="{{ $servis->name }}" required>
        <br>
        <label for="price">Цена:</label>
        <input type="number" name="price" value="{{ $servis->price }}" step="0.01" required>
        <br>
        <input type="hidden" name="status" value="0"> <!-- Скрытое поле для статуса -->
        <label for="status">Статус:</label>
        <input type="checkbox" name="status" id="status" value="1" {{ $servis->status ? 'checked' : '' }}> <!-- Установка checked, если статус true -->
        <br>
        <button type="submit">Обновить</button>
    </form>
</body>
</html>
