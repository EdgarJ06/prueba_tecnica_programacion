@extends('layouts.app')

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Servicio') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Equipo Id</th>
										<th>Tecnico Id</th>
										<th>Estado Id</th>
										<th>Fecha Recepcion</th>
										<th>Problema Reportado</th>
										<th>Diagnostico</th>
										<th>Solucion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $servicio->equipo_id }}</td>
											<td>{{ $servicio->tecnico_id }}</td>
											<td>{{ $servicio->estado_id }}</td>
											<td>{{ $servicio->fecha_recepcion }}</td>
											<td>{{ $servicio->problema_reportado }}</td>
											<td>{{ $servicio->diagnostico }}</td>
											<td>{{ $servicio->solucion }}</td>

                                            <td>
                                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $servicios->links() !!}
            </div>
        </div>
    </div>
@endsection
