@extends('layouts.default')
@section('title', 'Guia de Tallas')
@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-2">
                <h1 class="section-title font-900 font-title text-uppercase">VERIFICA TU TALLA</h1>
            </div>
            <div class="pt-4 row">

                <div class="row">
                    <div class="col-md-4">
                        <div class="text-justify">
                            <img class="img-fluid mb-3" src="{{ asset('assets/img/tallas/Tallas-1.jpg') }}" alt="">
                            <p>1. Ubica tu pie en el suelo a alguna superficie solida sobre una hoja de papel.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="text-justify">
                            <img class="img-fluid mb-3" src="{{ asset('assets/img/tallas/Tallas-2.jpg') }}" alt="">
                            <p>2. Marca el contorno total de tu pie con un lapicero o lápiz.</p>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="text-justify">
                            <img class="img-fluid mb-3" src="{{ asset('assets/img/tallas/Tallas-3.jpg') }}" alt="">
                            <p>3. Mide la distancia de tu pie marcada en la hoja, desde el borde de la hoja hasta la punta del pie en centímetros (cm).</p>
                        </div>
                    </div>
                </div>


                <p class="text-justify">Realiza estos pasos para ambos pies y toma como referencia el más grande para elegír tu talla.</p>
                <p class="text-justify">En caso tengas algún problema con el color o talla de tu pedido, revisa nuestra política de cambios y devoluciones <a href="{{ url('cambios-y-devoluciones') }}">aquí</a>.</p>



                <div class="col-12 text-center mt-2">
                    <h3>CALZADO PARA HOMBRES</h3>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">MEDIDA DEL PIE</th>
                                            <th class="text-center">TALLA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center text-lowercase">23.3 cm</td>
                                            <td class="text-center text-lowercase">38</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">24.1 cm</td>
                                            <td class="text-center text-lowercase">39</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">24.6 cm</td>
                                            <td class="text-center text-lowercase">40</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">25.4 cm</td>
                                            <td class="text-center text-lowercase">41</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">25.9 cm</td>
                                            <td class="text-center text-lowercase">42</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">26.7 cm</td>
                                            <td class="text-center text-lowercase">43</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">27.2 cm</td>
                                            <td class="text-center text-lowercase">44</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center text-lowercase">27.9 cm</td>
                                            <td class="text-center text-lowercase">45</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <img class="img-fluid mt-3" src="{{ asset('assets/img/tallas/Tallas.png') }}" alt=""> --}}
                </div>
            
                


            </div>
        </div>
    </div>
</section>
@endsection