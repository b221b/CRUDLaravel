<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список услуг</title>
</head>
<body>
    <h1>Список услуг</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('servis.create') }}">Добавить новую услугу</a>
    <table border="1">
        <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servis as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('servis.edit', $item->id) }}">Редактировать</a>
                        <form action="{{ route('servis.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить эту услугу?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
