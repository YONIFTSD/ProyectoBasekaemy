@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Agregar Cliente</h6>
            </div>
            <div class="ms-panel-body">
              <form action="{{ route('client-store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <!-- ous -->
             
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Tipo Documento *</label>
                        <div class="input-group">
                            <select name="document_type" class="form-control" required>
                                <option value="1">DNI</option>
                                <option value="6">RUC</option>
                            </select>
                            <div class="invalid-feedback">Por favor seleccione un tipo de documento</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Nro Documento *</label>
                        <div class="input-group">
                            <input type="text" name="document_number" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nro de documento</div>
                        </div>
                    </div>


                    
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label>Nombre y Apellido *</label>
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un nombre</div>
                        </div>
     
                    </div>
                   
                </div>
                
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <input type="text" name="phone" class="form-control" >
                            <div class="invalid-feedback">Por favor proporcione una imagen</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Sexo *</label>
                        <select name="sex" class="form-control" required>
                            <option value="">[Seleccione un Sexo]</option>
                            <option value="H">Hombre</option>
                            <option value="M">Mujer</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Fecha Nacimiento *</label>
                        <div class="input-group">
                            <input type="date" name="birth_date" class="form-control" required>
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
                            {{-- <option value="230111">Tacna, Tacna , La Yarada los Palos</option> --}}
                            <option value="230110">Tacna, Tacna , Coronel Gregorio Albarracín Lanchipa</option>
                            {{-- <option value="230109">Tacna, Tacna , Sama</option> --}}
                            <option value="230108">Tacna, Tacna , Pocollay</option>
                            {{-- <option value="230107">Tacna, Tacna , Palca</option> --}}
                            {{-- <option value="230106">Tacna, Tacna , Pachia</option> --}}
                            {{-- <option value="230105">Tacna, Tacna , Inclan</option> --}}
                            <option value="230104">Tacna, Tacna , Ciudad Nueva</option>
                            {{-- <option value="230103">Tacna, Tacna , Calana</option> --}}
                            <option value="230102">Tacna, Tacna , Alto de la Alianza</option>
                            <option value="230101">Tacna, Tacna , Tacna</option>
                        </select>
                    </div>

                    <div class="col-md-7">
                        <label>Dirección</label>
                        <div class="input-group">
                            <input type="text" name="address" class="form-control">
                            <div class="invalid-feedback">Por favor proporcione una dirección</div>
                        </div>
                    </div>


                    
                </div>


                <div class="form-group row">

                    <div class="col-md-5">
                        <label>Email *</label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione un email</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Contraseña *</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" required>
                            <div class="invalid-feedback">Por favor proporcione una contraseña</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Estado</label>
                        <select name="state" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    
                </div>
                <!-- state -->

                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection