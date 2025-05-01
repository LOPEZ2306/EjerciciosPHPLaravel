@extends('layouts.app')

@section('title', 'Ver Nota')

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

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="card shadow-sm sticky-note">
                    <div class="card-body">
                        <h3 class="card-title">{{ $note->title }}</h3>
                        <p class="card-text"><strong>Categoría:</strong> {{ $note->category }}</p>
                        <p class="card-text"><strong>Contenido:</strong></p>
                        <p>{{ $note->content }}</p>

                        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Volver a las Notas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
