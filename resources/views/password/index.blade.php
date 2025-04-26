@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Generador de Contraseñas</h2>

    @if ($error)
        <div class="alert alert-danger">
            <p>{{ $error }}</p>
        </div>
    @endif

    @if ($password)
        <div class="alert alert-success">
            <h3>Contraseña Generada:</h3>
            <p class="fs-4">{{ htmlspecialchars($password) }}</p>
        </div>
    @endif

    <form action="{{ route('password.index') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="length" class="form-label">Longitud de la contraseña</label>
            <input type="number" class="form-control" id="length" name="length" required min="1">
        </div>

        <div class="mb-3">
            <label for="includeNumbers" class="form-check-label">¿Incluir números?</label>
            <input type="checkbox" class="form-check-input" id="includeNumbers" name="includeNumbers" checked>
        </div>

        <div class="mb-3">
            <label for="includeSpecialChars" class="form-check-label">¿Incluir caracteres especiales?</label>
            <input type="checkbox" class="form-check-input" id="includeSpecialChars" name="includeSpecialChars" checked>
        </div>

        <button type="submit" class="btn btn-primary mb-4">Generar contraseña</button>
    </form>
</div>
@endsection
