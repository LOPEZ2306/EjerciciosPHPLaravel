<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {
        $task = Task::all();
        return view('tasks.index', compact('task'));
    }

    // Mostrar formulario para crear una nueva tarea
    public function create()
    {
        return view('tasks.create');
    }

    // Guardar una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('tasks.index');
    }

    // Mostrar formulario para editar una tarea
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Actualizar una tarea
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $task->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('tasks.index');
    }


    // Método para eliminar una nota
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }

    // Método para cambiar el estado de 'completed' (completo o incompleto)
    public function toggleCompletion(Task $task)
    {
    
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->route('tasks.index');
    }

    //Método para buscar
    public function show($id)
    {

    $task = Task::findOrFail($id);
    return view('tasks.show', compact('task'));
    }

    public function search(Request $request)
    {
    $query = $request->input('query');

    $task = Task::where('title', 'LIKE', '%' . $query . '%')
        ->get();

    if ($task->isEmpty()) {
        return view('tasks.index', [
            'task' => $task,
            'message' => 'No se encontraron notas relacionadas con tu búsqueda.'
        ]);
    }

    return view('tasks.index', [
        'task' => $task,
        'message' => 'Resultados de búsqueda para: ' . $query
    ]);

    }


}

