@extends('layouts.app')

@section('title')Tabla de Amortizacion @endsection

@section('style')
<style>
    .container {
        margin-top: 10%;
        width: 65%;
        text-align: center;
        background: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .data{
        margin: 5%;
        margin-right: auto;
        display: flex;
    }
    .alert-primary{
        margin-left: 15%;
        margin-right: 5%;
        text-align: left;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Tabla de Amortización de Prestamos</h1>
    <h4>Cuota sobre Saldos / Decreciente</h4>
    <div class="card">
        <div class="data">
            <form action="/amortizacion" method="post">
                @csrf
                <div class="input-group mb-3">
                    <label for="monto" class="form-label">Monto del préstamo:</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Q</span>
                        <input type="number" class="form-control" id="monto" name="monto" required>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="plazo" class="form-label">Plazo del préstamo (en meses):</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="plazo" name="plazo" required>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="interes" class="form-label">Tasa de interés anual (%):</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="interes" name="interes" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Calcular Amortización</button>
            </form>
            @if (isset($amortizacion))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div class="card-description">
                        <p>a) Primera Cuota (Más Intereses): Q. {{ number_format($primeraCuota, 2) }}</p>
                        <p>b) Última Cuota (Más Intereses): Q. {{ number_format($ultimaCuota, 2) }}</p>
                        <p>c) Intereses Totales: Q. {{ number_format($interesesTotales, 2) }}</p>
                        <p><em>*Estimado asociado, el cálculo de las cuotas es solamente una proyección. Contáctenos para mayor información.</em></p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <br>
    <div class="card">
        @if (isset($amortizacion))
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Mes</th>
                    <th scope="col">Saldo Inicial</th>
                    <th scope="col">Pago de Capital</th>
                    <th scope="col">Intereses</th>
                    <th scope="col">Cuota</th>
                    <th scope="col">Saldo Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($amortizacion as $pago)
                    <tr>
                        <td>{{ $pago['mes'] }}</td>
                        <td>Q. {{ $pago['saldo_inicial'] }}</td>
                        <td>Q. {{ $pago['pago_capital'] }}</td>
                        <td>Q. {{ $pago['intereses'] }}</td>
                        <td>Q. {{ $pago['cuota'] }}</td>
                        <td>Q. {{ $pago['saldo_final'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

@section('script')
    <!--Mostrar la tarjeta de resumen de pagos cuando se ha calculado la amortización!-->
    <script>
        @if (isset($amortizacion))
        document.querySelector('.card').style.display = 'block';
        @endif
    </script>
@endsection
