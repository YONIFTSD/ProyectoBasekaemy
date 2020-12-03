@extends('layouts.default')

@section('content')
<section class="section-default bg-content-2 py-4">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="w-100">
                    <form action="{{ url('productos/search') }}" method="GET">
                        <div class="d-sm-flex justify-content-center align-items-center text-center">
                            <div class="d-flex">
                                <input class="form-control form-control-lg form-search rounded-0" type="search" value="" size="50" autocomplete="off" placeholder="¿Qué producto necesitas?" name="q">
                                <button type="submit" class="btn btn-lg btn-search rounded-0"><i class="fas fa-search"></i></button>
                            </div>
                            <div class="mt-2 mt-sm-0 ml-0 ml-sm-2">
                                <button type="submit" class="btn btn-buscar-dark font-500 text-uppercase">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-default pt-4 pb-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-1">
                @if(count($products) > 0)
                <p class="font-title color-dark m-0 font-700">{{ count($products) }} Productos encontrados</p>
                @else
                <div class="box-nodisponible text-center pt-5 pb-5 bg-content">
                    <img class="img-fluid" width="75px" src="{{ asset('assets/img/resources/search-empty.png') }}"/>
                    <div class="nhpdisponibles pt-4"><b>¡Oh no!</b></div>
                    <p class="nodis-text">No encontramos resultados para tu búsqueda</p>
                    <div class="mt-4 emailnod">
                        <p class="small m-0">Comprueba la ortografía</p>
                        <p class="small m-0">Simplifica la búsqueda con términos menos específicos</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="pt-4">
                <!-- products -->
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch my-3">
                        @include('components.product')
                    </div>
                    @endforeach
                </div>
                <!-- products -->
            </div>
        </div>
    </div>
</section>
@endsection