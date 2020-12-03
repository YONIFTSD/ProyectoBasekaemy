@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-right mb-2">
            <a href="{{ route('user-add') }}" class="btn btn-dark btn-sm text-uppercase"><i class="fas fa-plus"></i> Agregar</a>
        </div>
        <div class="ms-panel">
            <div class="ms-panel-header">
                <h6>Usuarios</h6>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table w-100 thead-primary">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Correo electrónico</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index+1 }}</td>
                                <td>{{ $user->name }} {{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if($user->user_type == 1)
                                    Administrador
                                    @elseif($user->user_type == 2)
                                    Mesa de Partes
                                    @elseif($user->user_type == 3)
                                    Empleado
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($user->state == 1)
                                    <span class="badge badge-success m-0">Activo</span>
                                    @else
                                    <span class="badge badge-danger m-0">Inactivo</span>
                                    @endif
                                </td>
                                <td class="text-center">

                                    <a href="{{ route('user-show', ['id' => $user->id]) }}" alt="Ver"><i class="fas fa-eye text-warning"></i></a>
                                    <a href="{{ route('user-edit', ['id' => $user->id]) }}" alt="Editar"><i class="fas fa-edit text-success"></i></a>
                                    
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