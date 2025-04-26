@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Cronómetro</h2>

    <h3 id="timer-display">{{ sprintf('%02d:%02d:%02d.%03d',
        floor($currentTime / 3600),
        floor(($currentTime % 3600) / 60),
        floor($currentTime % 60),
        floor(($currentTime - floor($currentTime)) * 1000)
    ) }}</h3>

    <div class="mb-3">
        @if ($isRunning)
            <form action="{{ route('timer.index') }}" method="GET" class="d-inline-block">
                <input type="hidden" name="action" value="stop">
                <button type="submit" class="btn btn-danger">Detener</button>
            </form>

            <form action="{{ route('timer.index') }}" method="GET" class="d-inline-block">
                <input type="hidden" name="action" value="lap">
                <button type="submit" class="btn btn-warning">Registrar Vuelta</button>
            </form>
        @else
            <form action="{{ route('timer.index') }}" method="GET" class="d-inline-block">
                <input type="hidden" name="action" value="start">
                <button type="submit" class="btn btn-success">Iniciar</button>
            </form>
        @endif

        <form action="{{ route('timer.index') }}" method="GET" class="d-inline-block">
            <input type="hidden" name="action" value="reset">
            <button type="submit" class="btn btn-secondary">Reiniciar</button>
        </form>
    </div>

    <h4>Vueltas</h4>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tiempo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laps as $index => $lap)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ sprintf('%02d:%02d:%02d.%03d',
                        floor($lap / 3600),
                        floor(($lap % 3600) / 60),
                        floor($lap % 60),
                        floor(($lap - floor($lap)) * 1000)
                    ) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>

    let startTime = {{ microtime(true) * 1000 }};
    let serverTime = {{ $currentTime * 1000 }};
    let isRunning = {{ $isRunning ? 'true' : 'false' }};
    let timerDisplay = document.getElementById('timer-display');
    let timerInterval;

    function pad(n) {
        return n < 10 ? '0' + n : n;
    }

    function updateTimer() {
        if (!isRunning) return;

        let currentTime = new Date().getTime();
        let elapsedSincePageLoad = (currentTime - startTime) / 1000;

        let totalSeconds = serverTime / 1000 + elapsedSincePageLoad;

        let hours = Math.floor(totalSeconds / 3600);
        let minutes = Math.floor((totalSeconds % 3600) / 60);
        let seconds = Math.floor(totalSeconds % 60);
        let milliseconds = Math.floor((totalSeconds - Math.floor(totalSeconds)) * 1000);

        timerDisplay.textContent =
            pad(hours) + ":" +
            pad(minutes) + ":" +
            pad(seconds) + "." +
            (milliseconds < 10 ? '00' + milliseconds : (milliseconds < 100 ? '0' + milliseconds : milliseconds));
    }

    if (isRunning) {
        timerInterval = setInterval(updateTimer, 10);
    }
</script>
@endsection
