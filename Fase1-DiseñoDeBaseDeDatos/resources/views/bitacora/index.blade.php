@extends('layouts.app')

@section('template_title')
    Bitacora
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bitacora') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bitacoras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Servicio Id</th>
										<th>Fecha</th>
										<th>Descripcion</th>
										<th>Comentario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bitacoras as $bitacora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $bitacora->servicio_id }}</td>
											<td>{{ $bitacora->fecha }}</td>
											<td>{{ $bitacora->descripcion }}</td>
											<td>{{ $bitacora->comentario }}</td>

                                            <td>
                                                <form action="{{ route('bitacoras.destroy',$bitacora->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bitacoras.show',$bitacora->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bitacoras.edit',$bitacora->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $bitacoras->links() !!}
            </div>
        </div>
    </div>
@endsection
