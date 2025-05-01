@extends('layouts.app')

@section('title', 'Mis Notas')

@section('content')
    <style>
        .sticky-note {
            background-color: #fffae6;
            border: 1px solid #e1d800;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .sticky-note .card-body {
            padding: 10px;
        }

    </style>

    <h1>Mis Notas</h1>

    @if(isset($message))
    <div class="alert alert-info mt-2">
        {{ $message }}
    </div>
    @endif


    <a href="{{ route('notes.create') }}">Crear nueva nota</a>

    <form action="{{ route('notes.search') }}" method="GET" class="mb-4 mt-3">
        <input type="text" name="query" placeholder="Buscar por título o categoría" class="form-control" />
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <div class="row">
        @foreach ($notes as $note)
        <div class="col-md-4 mb-4 mt-3">
            <div class="card shadow-sm sticky-note">
                <div class="card-body">
                    <h3 class="card-title">{{ $note->title }}</h3>
                    <p class="card-text">{{ Str::limit($note->content, 50) }}</p>
                    <p class="card-text">Categoria: {{ $note->category }}</p>

                    <form action="{{ route('notes.show', $note->id) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Ver nota</button>
                    </form>


                    <form action="{{ route('notes.edit', $note->id) }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit">Editar</button>
                    </form>

                    <form action="{{ route('notes.delete', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
