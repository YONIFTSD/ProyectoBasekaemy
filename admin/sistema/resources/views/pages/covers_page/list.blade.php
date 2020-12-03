@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{ route('cover-page-add') }}" class="btn btn-dark btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Portadas</h6>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($covers_page as $index => $be)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>{{ $be->title }} </td>
                                <td>
                                    <img  src="{{ url('/').$be->image }}" class="img">
                                </td>
                  
                                <td class="text-center">
                                    @if($be->state == 1)
                                    <span class="badge badge-success m-0">Activo</span>
                                    @else
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('cover-page-show', ['id' => $be->id_cover_page]) }}" alt="Ver"><i class="fas fa-eye text-warning"></i></a>
                                    <a href="{{ route('cover-page-edit', ['id' => $be->id_cover_page]) }}" alt="Editar"><i class="fas fa-edit text-success"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables/data-tables.js') }}"></script>
@endsection