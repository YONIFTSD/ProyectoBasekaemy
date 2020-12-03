@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Modificar Cliente</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('client-update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

     
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Tipo Documento *</label>
                        <div class="input-group">
                            <select name="document_type" class="form-control" required>
                                <option {{ $client->document_type == 1 ? 'selected':'' }} value="1">DNI</option>
                                <option {{ $client->document_type == 6 ? 'selected':'' }} value="6">RUC</option>
                            </select>
                            <div class="invalid-feedback">Por favor seleccione un tipo de documento</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Nro Documento *</label>
                        <div class="input-group">
                            <input type="text" name="document_number" class="form-control" value="{{ $client->document_number}}" required>
                            <div class="invalid-feedback">Por favor proporcione un nro de documento</div>
                        </div>
                    </div>


                    
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nombre y Apellido *</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" value="{{ $client->name}}" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
     
                    </div>
                   
                </div>
                
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" name="phone" value="{{ $client->phone}}" class="form-control" >
                            <div class="invalid-feedback">Por favor proporcione una imagen</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Sexo *</label>
                        <select name="sex" class="form-control" required>
                            <option value="">[Seleccione un Sexo]</option>
                            <option {{ $client->sex == "H" ? 'selected':'' }} value="H">Hombre</option>
                            <option {{ $client->sex == "M" ? 'selected':'' }} value="M">Mujer</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Fecha Nacimiento *</label>
                        <div class="input-group">
                            <input type="date" name="birth_date" class="form-control" value="{{ $client->birth_date}}" required>
                            <div class="invalid-feedback">Por favor proporcione una fecha de nacimiento</div>
                        </div>
                    </div>

                    
                    
                </div>

                <!-- state -->
                <div class="form-group row">

                    <div class="col-md-5">
                        <label>Ubigeo</label>
                        <select name="ubigee" class="form-control">
                            <option value="">[ Seleccione un Ubigeo ]</option>
                            <option {{ $client->ubigee == "230110" ? 'selected':'' }} value="230110">Tacna, Tacna , Coronel Gregorio Albarracín Lanchipa</option>
                            <option {{ $client->ubigee == "230108" ? 'selected':'' }} value="230108">Tacna, Tacna , Pocollay</option>
                            <option {{ $client->ubigee == "230104" ? 'selected':'' }} value="230104">Tacna, Tacna , Ciudad Nueva</option>
                            <option {{ $client->ubigee == "230102" ? 'selected':'' }} value="230102">Tacna, Tacna , Alto de la Alianza</option>
                            <option {{ $client->ubigee == "230101" ? 'selected':'' }} value="230101">Tacna, Tacna , Tacna</option>
                            {{-- <option value="230111">Tacna, Tacna , La Yarada los Palos</option> --}}
                            {{-- <option value="230107">Tacna, Tacna , Palca</option> --}}
                            {{-- <option value="230106">Tacna, Tacna , Pachia</option> --}}
                            {{-- <option value="230105">Tacna, Tacna , Inclan</option> --}}
                            {{-- <option value="230109">Tacna, Tacna , Sama</option> --}}
                        </select>
                    </div>

                    <div class="col-md-7">
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" name="address" value="{{ $client->address}}" class="form-control">
                            <div class="invalid-feedback">Por favor proporcione una dirección</div>
                        </div>
                    </div>


                    
                </div>


                <div class="form-group row">

                    <div class="col-md-8">
                        <label>Email *</label>
                        <div class="input-group">
                            <input type="email" name="email" readonly class="form-control" value="{{ $client->email}}" required>
                            <div class="invalid-feedback">Por favor proporcione un email</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Estado</label>
                        <select name="state" class="form-control" required>
                            <option {{ $client->state == "1" ? 'selected':'' }} value="1">Activo</option>
                            <option {{ $client->state == "0" ? 'selected':'' }} value="0">Inactivo</option>
                        </select>
                    </div>
                    
                </div>
                <!-- state -->
                <!-- state -->
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_client" value="{{ $client->id_client }}">
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection