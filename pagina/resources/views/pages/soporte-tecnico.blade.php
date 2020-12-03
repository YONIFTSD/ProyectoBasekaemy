@extends('layouts.default')
@section('title', 'Soporte Técnico')
@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-2">
                <h1 class="section-title font-900 font-title text-uppercase">Soporte Técnico</h1>
            </div>
            <div class="pt-4">
                <div class="text-center mb-5">
                    <h2 class="font-title">Master G</h2>
                    <div class="font-title font-700">Tecniortiz</div>
                </div>
                <div class="row">
                    <div class="col-md-4 my-3">
                        <div class="text-center ic-item">
                            <div class="ic-item-ico mb-3"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="ic-item-text">Calle Piura N° 388, Tacna - Perú</div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="text-center ic-item">
                            <div class="ic-item-ico mb-3"><i class="fas fa-phone"></i></div>
                            <div class="ic-item-text">
                                <div>Fono: (051-52) 426 054</div>
                                <div>Celular: (051) 9529 21455</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <div class="text-center ic-item">
                            <div class="ic-item-ico mb-3"><i class="fas fa-envelope"></i></div>
                            <div class="ic-item-text">Tecniortiz@yahoo.es</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- maps -->
<section class="section-default bg-content">
<div class="embed-responsive embed-responsive-21by9" id="map">
</div>
</section>
<script>
var Latitud = -18.0027473;
var Longitud = -70.2405028;
var Acercamiento = 18;
var TituloEmpresa = "Tecniortiz";
var AddressCompany = "Calle Piura N° 388, Tacna - Perú";
var PhoneCompany = "(051-52) 426 054";
 
      function initMap() {
        var Empresa = {lat: Latitud, lng: Longitud};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: Acercamiento,
          center: Empresa
        });

        var contentString = '<div class="bxmarcadorGM"><p style="font-weight:bold;margin-bottom:3px;"><b>'+TituloEmpresa+'</b></p><p style="margin-top:3px;margin-bottom:3px;">'+AddressCompany+'</p><p style="margin-top:3px;font-weight:bold;margin-bottom:0px;">'+PhoneCompany+'</p></div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
          position: Empresa,
          map: map,
          title: TituloEmpresa,
          animation:google.maps.Animation.DROP,
          icon: 'assets/img/resources/pin-marcador.png'

        });
        infowindow.open(map, marker);
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiOZAB0FhSsBbUduha1_iQLk67IyHnLA0&callback=initMap">
    </script>
<!-- maps -->
@endsection