@extends('layouts.app')

@section('content')
    <h1>Crear tarea</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>

        <label for="content">Contenido</label>
        <textarea name="content" id="content" required></textarea>

        <button type="submit">Guardar tarea</button>
    </form>
@endsection
