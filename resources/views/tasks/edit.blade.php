@extends('layouts.app')

@section('content')
    <h1>Editar tarea</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required>

        <label for="content">Contenido</label>
        <textarea name="content" id="content" required>{{ $task->content }}</textarea>

        <button type="submit">Actualizar tarea</button>
    </form>
@endsection
