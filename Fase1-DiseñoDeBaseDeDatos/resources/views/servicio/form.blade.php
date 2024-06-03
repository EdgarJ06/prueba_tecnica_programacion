<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="equipo_id" class="form-label">{{ __('Equipo Id') }}</label>
            <input type="text" name="equipo_id" class="form-control @error('equipo_id') is-invalid @enderror" value="{{ old('equipo_id', $servicio?->equipo_id) }}" id="equipo_id" placeholder="Equipo Id">
            {!! $errors->first('equipo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tecnico_id" class="form-label">{{ __('Tecnico Id') }}</label>
            <input type="text" name="tecnico_id" class="form-control @error('tecnico_id') is-invalid @enderror" value="{{ old('tecnico_id', $servicio?->tecnico_id) }}" id="tecnico_id" placeholder="Tecnico Id">
            {!! $errors->first('tecnico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_id" class="form-label">{{ __('Estado Id') }}</label>
            <input type="text" name="estado_id" class="form-control @error('estado_id') is-invalid @enderror" value="{{ old('estado_id', $servicio?->estado_id) }}" id="estado_id" placeholder="Estado Id">
            {!! $errors->first('estado_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_recepcion" class="form-label">{{ __('Fecha Recepcion') }}</label>
            <input type="text" name="fecha_recepcion" class="form-control @error('fecha_recepcion') is-invalid @enderror" value="{{ old('fecha_recepcion', $servicio?->fecha_recepcion) }}" id="fecha_recepcion" placeholder="Fecha Recepcion">
            {!! $errors->first('fecha_recepcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="problema_reportado" class="form-label">{{ __('Problema Reportado') }}</label>
            <input type="text" name="problema_reportado" class="form-control @error('problema_reportado') is-invalid @enderror" value="{{ old('problema_reportado', $servicio?->problema_reportado) }}" id="problema_reportado" placeholder="Problema Reportado">
            {!! $errors->first('problema_reportado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="diagnostico" class="form-label">{{ __('Diagnostico') }}</label>
            <input type="text" name="diagnostico" class="form-control @error('diagnostico') is-invalid @enderror" value="{{ old('diagnostico', $servicio?->diagnostico) }}" id="diagnostico" placeholder="Diagnostico">
            {!! $errors->first('diagnostico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="solucion" class="form-label">{{ __('Solucion') }}</label>
            <input type="text" name="solucion" class="form-control @error('solucion') is-invalid @enderror" value="{{ old('solucion', $servicio?->solucion) }}" id="solucion" placeholder="Solucion">
            {!! $errors->first('solucion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>