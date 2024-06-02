@extends('layouts.app')

@section('title') Factorial @endsection

@section('style')
<style>
    .container {
        margin-top: 10%;
        margin-left: 25%;
        width: 50%;
        text-align: center;
        background: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        margin-bottom: 20px;
    }

    form {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="number"] {
        width: 40%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #218838;
    }

    .result {
        margin-top: 20px;
        font-size: 1.2em;
    }

    .errors {
        color: red;
        margin-top: 20px;
    }

    .errors ul {
        list-style-type: none;
        padding: 0;
    }
</style>
@endsection


@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                FACTORIAL
            </div>
            <div class="card-body">
                <form action="/factorial" method="POST">
                    @csrf
                    <label for="number">INGRESA UN NUMERO:</label>
                    <input type="number" id="number" name="number" required>
                    <br>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                    <button type="submit" class="btn btn-primary">Limpiar</button>
                </form>

                @if(@isset($factorial))
                <h2>El factorial para {{ $number }} es {{ $factorial }}</h2>
                <p>Procedimiento: {{ $procedure }}</p>
                @endisset

                @if($errors -> any())
                <div>
                    <ul>
                        @foreach ( $errors -> all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
