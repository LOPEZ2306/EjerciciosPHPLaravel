@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Calculadora de Propinas</h2>

    <form action="{{ route('tips.index') }}" method="POST">
        @csrf
        <div id="productos">
            <div class="producto mb-3">
                <label for="producto1" class="form-label">Monto del producto 1</label>
                <input type="number" class="form-control" name="productos[]" id="producto1" required>
            </div>
        </div>

        <button type="button" id="agregar-producto" class="btn btn-secondary mb-3">Agregar otro producto</button>

        <div class="mb-3">
            <label for="propina" class="form-label">Selecciona el porcentaje de propina</label>
            <select class="form-select" name="propina" id="propina" required>
                <option value="10" @if(old('propina') == 10) selected @endif>10%</option>
                <option value="15" @if(old('propina') == 15) selected @endif>15%</option>
                <option value="20" @if(old('propina') == 20) selected @endif>20%</option>
                <option value="25" @if(old('propina') == 25) selected @endif>25%</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Calcular</button>
    </form>

    @if (isset($totalFormatted))
    <div class="mt-4">
        <h3>Resultado</h3>
        <p>El total de tu cuenta es: <strong>${{ $totalFormatted }}</strong></p>
        <p>Propina ({{ $propina }}%): <strong>${{ $propinaAmountFormatted }}</strong></p>
        <p><strong>Total a pagar: ${{ $totalWithTipFormatted }}</strong></p>
    </div>
    @endif
</div>

<script>

document.getElementById('agregar-producto').addEventListener('click', function() {

    const productosCount = document.querySelectorAll('.producto').length + 1;

    var newProductField = document.createElement('div');
    newProductField.classList.add('producto', 'mb-3');
    newProductField.innerHTML = `
        <label class="form-label">Monto del producto ${productosCount}</label>
        <input type="number" class="form-control" name="productos[]" required>
    `;
    document.getElementById('productos').appendChild(newProductField);
});
</script>

@endsection
