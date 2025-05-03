@extends('layouts.app')

@section('title', 'Ver tarea')

@section('content')

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">{{ $task->title }}</h3>
                        <p>{{ $task->content }}</p>

                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Volver a las tareas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
