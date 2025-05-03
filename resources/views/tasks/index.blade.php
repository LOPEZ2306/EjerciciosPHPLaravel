@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Lista de tareas</h2>

    @if(isset($message))
    <div class="alert alert-info mt-2">
        {{ $message }}
    </div>
    @endif

    <a href="{{ route('tasks.create') }}">Crear nueva tarea</a>

    <form action="{{ route('tasks.search') }}" method="GET" class="mb-4 mt-3">
        <input type="text" name="query" placeholder="Buscar por título" class="form-control" />
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <div class="row">
        @foreach ($task as $task)
        <div class="col-md-4 mb-4 mt-3">
            <div class="card shadow-sm sticky-note">
                <div class="card-body">
                    <h3 class="card-title">{{ $task->title }}</h3>
                    <p class="card-text">{{ Str::limit($task->content, 50) }}</p>

                    <form action="{{ route('tasks.show', $task->id) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Ver tarea</button>
                    </form>

                    <form action="{{ route('tasks.edit', $task->id) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Editar</button>
                    </form>

                    <form action="{{ route('tasks.delete', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>

                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST" style="display:inline;" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-{{ $task->completed ? 'success' : 'warning' }}">
                            {{ $task->completed ? 'Completa' : 'Incompleta' }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
