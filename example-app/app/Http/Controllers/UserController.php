<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'name' => 'required',
            'birthday' => 'required|date',
            'telephone' => 'required',
            'email' => 'required|email|unique:users',
            'login' => 'required|unique:users',
            'password' => 'required|min:6',
            'photo' => 'image|nullable|max:1999',
        ]);

        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        User::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'photo' => $fileNameToStore,
        ]);

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
    
        if ($request->hasFile('photo')) {
            // Удалите старое фото, если оно существует
            if ($user->photo && $user->photo != 'noimage.jpg') {
                Storage::delete('public/photos/'.$user->photo);
            }
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
            $user->photo = $fileNameToStore;
        }
    
        // Обновляем поля, если они были изменены
        $data = $request->only('name', 'birthday', 'telephone', 'email', 'login');
        
        // Обновляем пароль только если он предоставлен
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'User  updated successfully.');
    }    

    public function destroy(User $user)
    {
        // Удалите фото, если оно существует
        if ($user->photo && $user->photo != 'noimage.jpg') {
            Storage::delete('public/photos/'.$user->photo);
        }

        // Удалите пользователя
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User  deleted successfully.');
    }
}
