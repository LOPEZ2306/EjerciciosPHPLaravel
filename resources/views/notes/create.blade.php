@extends('layouts.app')

@section('content')
    <h1>Crear Nota</h1>

    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Contenido</label>
        <textarea name="content" id="content" required></textarea>

        <label for="category">Categoría</label>
        <input type="text" name="category" id="category" required>

        <button type="submit">Guardar Nota</button>
    </form>
@endsection
