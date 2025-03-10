<!DOCTYPE html>
<html>
<head>
    <title>Edit Service</title>
</head>
<body>
    <h1>Edit Service</h1>
    <form action="{{ route('servis.update', $servis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $servis->name }}">
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ $servis->price }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>
