@extends('layouts.app')

@section('title', 'Página de Inicio')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">¡Bienvenido!</h1>
        <p class="lead">Te presento las distintas herramientas que tiene este sitio para hacer tu día a día más fácil.</p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Cronómetro Online</h3>
                    <p class="card-text">Controla tus tiempos de manera eficiente con un cronómetro fácil de usar y completamente personalizable.</p>
                    <a href="{{ route('timer.index') }}" class="btn btn-primary">Ir al Cronómetro</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Calculadora de Propinas</h3>
                    <p class="card-text">Calcula rápida y fácilmente el monto de la propina, ajustando el porcentaje según tu preferencia.</p>
                    <a href="{{ route('tips.index') }}" class="btn btn-primary">Ir a la Calculadora</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Generador de Contraseñas Seguras</h3>
                    <p class="card-text">Genera contraseñas seguras y aleatorias con opciones de longitud y complejidad para proteger tus cuentas. </p>
                    <a href="{{ route('password.index') }}" class="btn btn-primary">Ir al Generador</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestor de Notas</h3>
                    <p class="card-text">Escribe, organiza y busca tus notas rápidamente. Mantén todo en orden con categorías personalizadas.</p>
                    <a href="{{ route('notes.index') }}" class="btn btn-primary">Ir al Gestor</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Lista de Tareas</h3>
                    <p class="card-text">Organiza tus tareas, marca las completadas y lleva un control fácil y efectivo de tus pendientes.</p>
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ir a la Lista</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestor de Gastos</h3>
                    <p class="card-text">Registra tus gastos, clasifícalos y visualiza resúmenes mensuales para un mejor control financiero.</p>
                    <a href="{{ route('expenses.index') }}" class="btn btn-primary">Ir al Gestor</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Plataforma de Recetas</h3>
                    <p class="card-text">Descubre, guarda y comparte recetas deliciosas. Filtra por ingredientes y tipo de comida para encontrar lo que más te guste.</p>
                    <a href="#" class="btn btn-primary">Ir a la Plataforma</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Calendario de Eventos</h3>
                    <p class="card-text">Gestiona tus eventos de manera fácil e interactiva, con recordatorios y notificaciones para que no se te escape ninguno.</p>
                    <a href="#" class="btn btn-primary">Ir al Calendario</a>  <!-- Agregado enlace -->
                </div>
            </div>
        </div>
    </div>
@endsection
