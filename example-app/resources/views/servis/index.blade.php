<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список услуг</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h1>Список услуг</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <a href="{{ route('servis.create') }}" title="Добавить новую услугу">
        <i class="fas fa-plus"></i> Добавить новую услугу
    </a>
    <table border="1">
        <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servis as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->status ? 'Активен' : 'Неактивен' }}</td>
                    <td>
                        <a href="{{ route('servis.edit', $item->id) }}" title="Редактировать">
                            <i class="fas fa-pencil-alt"></i> <!-- Иконка карандаша -->
                        </a>
                        <form action="{{ route('servis.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить эту услугу?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Удалить" style="border: none; background: none; cursor: pointer;">
                                <i class="fas fa-trash-alt" style="color: red;"></i> <!-- Иконка корзины -->
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
