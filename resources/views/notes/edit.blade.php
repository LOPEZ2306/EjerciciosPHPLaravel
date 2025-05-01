@extends('layouts.app')

@section('content')
    <h1>Editar Nota</h1>

    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ $note->title }}" required>

        <label for="content">Contenido</label>
        <textarea name="content" id="content" required>{{ $note->content }}</textarea>

        <label for="category">Categoría</label>
        <input type="text" name="category" id="category" value="{{ $note->category }}" required>

        <button type="submit">Actualizar Nota</button>
    </form>
@endsection
