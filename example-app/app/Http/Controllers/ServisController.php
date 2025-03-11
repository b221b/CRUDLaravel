<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    // Отображение списка услуг
    public function index()
    {
        $servis = Servis::all();
        return view('servis.index', compact('servis'));
    }

    // Отображение формы для создания новой услуги
    public function create()
    {
        return view('servis.create');
    }

    // Сохранение новой услуги
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'boolean',
        ]);

        Servis::create($request->all());

        return redirect()->route('servis.index')->with('success', 'Услуга успешно добавлена!');
    }

    // Отображение формы для редактирования услуги
    public function edit($id)
    {
        $servis = Servis::findOrFail($id);
        return view('servis.edit', compact('servis'));
    }
    

    // Обновление услуги
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'boolean',
        ]);

        $servis = Servis::findOrFail($id);
        $servis->update($request->all());

        return redirect()->route('servis.index')->with('success', 'Услуга успешно обновлена!');
    }

    // Удаление услуги
    public function destroy($id)
    {
        $servis = Servis::findOrFail($id);
        $servis->delete();

        return redirect()->route('servis.index')->with('success', 'Услуга успешно удалена!');
    }
}
