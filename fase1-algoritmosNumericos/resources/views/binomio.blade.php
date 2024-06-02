@extends('layouts.app')

@section('title')
Potencia - Binomio
@endsection

@section('style')
<style>
    .container{
        text-align: center;
    }
    .card{
        margin-bottom: 5%;
        margin-left: 35%;
        margin-right: 15%;
        margin-top: 5%;
        width: 30%;
        text-align: center;
    }
</style>

@section('content')
<div class="container">
    <h1>Expansión del Binomio</h1>
    <div class="card">
        <div class="data">
            <form method="post" action="/potencia-binomio">
                @csrf
                <label for="potencia" class="form-label">Ingrese la potencia:</label>
                <div class="input-group">
                    <input type="text" id="binomio" name="binomio" class="form-control">
                </div>
                <div style="margin-top: 10px">
                    <button type="submit" class="btn btn-primary">Calcular</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                </div>
                <br>
                @if(isset($result))
                    <p>Resultado: {{ $result }}</p>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
