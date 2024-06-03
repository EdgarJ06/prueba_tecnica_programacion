<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cliente_id" class="form-label">{{ __('Cliente Id') }}</label>
            <input type="text" name="cliente_id" class="form-control @error('cliente_id') is-invalid @enderror" value="{{ old('cliente_id', $equipo?->cliente_id) }}" id="cliente_id" placeholder="Cliente Id">
            {!! $errors->first('cliente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="marca_id" class="form-label">{{ __('Marca Id') }}</label>
            <input type="text" name="marca_id" class="form-control @error('marca_id') is-invalid @enderror" value="{{ old('marca_id', $equipo?->marca_id) }}" id="marca_id" placeholder="Marca Id">
            {!! $errors->first('marca_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_equipo" class="form-label">{{ __('Tipo Equipo') }}</label>
            <input type="text" name="tipo_equipo" class="form-control @error('tipo_equipo') is-invalid @enderror" value="{{ old('tipo_equipo', $equipo?->tipo_equipo) }}" id="tipo_equipo" placeholder="Tipo Equipo">
            {!! $errors->first('tipo_equipo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="modelo" class="form-label">{{ __('Modelo') }}</label>
            <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo', $equipo?->modelo) }}" id="modelo" placeholder="Modelo">
            {!! $errors->first('modelo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_serie" class="form-label">{{ __('Numero Serie') }}</label>
            <input type="text" name="numero_serie" class="form-control @error('numero_serie') is-invalid @enderror" value="{{ old('numero_serie', $equipo?->numero_serie) }}" id="numero_serie" placeholder="Numero Serie">
            {!! $errors->first('numero_serie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>