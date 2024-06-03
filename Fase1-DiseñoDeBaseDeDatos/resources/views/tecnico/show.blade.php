@extends('layouts.app')

@section('template_title')
    {{ $tecnico->name ?? __('Show') . " " . __('Tecnico') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tecnico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tecnicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $tecnico->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Apellido:</strong>
                            {{ $tecnico->apellido }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $tecnico->telefono }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Correo Electronico:</strong>
                            {{ $tecnico->correo_electronico }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Especialidad:</strong>
                            {{ $tecnico->especialidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
