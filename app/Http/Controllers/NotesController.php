<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    // Mostrar formulario para crear una nueva nota
    public function create()
    {
        return view('notes.create');
    }

    // Guardar una nueva nota
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|max:255',
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
        ]);

        return redirect()->route('notes.index');
    }

    // Mostrar formulario para editar una nota
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // Actualizar una nota
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required|max:255',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
        ]);

        return redirect()->route('notes.index');
    }


    // Método para eliminar una nota
    public function delete($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Nota eliminada exitosamente.');
    }

    //Método para buscar 
    public function show($id)
    {

    $note = Note::findOrFail($id);
    return view('notes.show', compact('note'));
    }

    public function search(Request $request)
    {
    $query = $request->input('query');

    $notes = Note::where('title', 'LIKE', '%' . $query . '%')
        ->orWhere('category', 'LIKE', '%' . $query . '%')
        ->get();

    if ($notes->isEmpty()) {
        return view('notes.index', [
            'notes' => $notes,
            'message' => 'No se encontraron notas relacionadas con tu búsqueda.'
        ]);
    }

    return view('notes.index', [
        'notes' => $notes,
        'message' => 'Resultados de búsqueda para: ' . $query
    ]);

    }


}

