<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
{
    // Валидация входящих данных
    $request->validate([
        'name' => 'required',
        'birthday' => 'required|date',
        'telephone' => 'required',
        'email' => 'required|email|unique:users',
        'login' => 'required|unique:users',
        'password' => 'required|min:6',
        'photo' => 'image|nullable|max:1999',
    ]);

    Log::info('User  creation validated successfully.');

    // Обработка загрузки фото
    $photoData = null;
    if ($request->hasFile('photo')) {
        $photoData = file_get_contents($request->file('photo')->getRealPath());
        Log::info('Photo uploaded and converted to binary data.');
    }

    // Создание нового пользователя
    User::create([
        'name' => $request->name,
        'birthday' => $request->birthday,
        'telephone' => $request->telephone,
        'email' => $request->email,
        'login' => $request->login,
        'password' => bcrypt($request->password),
        'photo' => $photoData, // Сохраняем бинарные данные
    ]);

    Log::info('User  created successfully: ' . $request->name);

    return redirect()->route('users.index')->with('success', 'User  created successfully.');
}

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'birthday' => 'required|date',
        'telephone' => 'required',
        'email' => 'required|email',
        'login' => 'required',
        'password' => 'nullable|min:6',
        'photo' => 'image|nullable|max:1999',
    ]);

    Log::info('User  update validated successfully for user: ' . $user->id);

    if ($request->hasFile('photo')) {
        // Сохранение нового изображения в бинарном формате
        $photoData = file_get_contents($request->file('photo')->getRealPath());
        $user->photo = $photoData; // Обновляем поле с фото
        Log::info('New photo uploaded and converted to binary data for user: ' . $user->id);
    }

    // Обновление полей, если были внесены изменения
    $data = $request->only('name', 'birthday', 'telephone', 'email', 'login');

    // Обновление пароля, только если был введен новый
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    // Обновление пользователя
    $user->update($data);
    Log::info('User  updated successfully: ' . $user->id);
    
    return redirect()->route('users.index')->with('success', 'User  updated successfully.');
}


    public function destroy(User $user)
    {
        // Удаление картинки, если она существует и не является изображением по умолчанию
        if ($user->photo && $user->photo != 'noimage.jpg') {
            Storage::delete('public/photos/' . $user->photo);
        }

        // Удаление пользователя
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }
}
