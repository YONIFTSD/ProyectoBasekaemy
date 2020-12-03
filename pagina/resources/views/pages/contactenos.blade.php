@extends('layouts.default')
@section('title', 'Contáctenos')
@section('content')
<!-- Start contact section -->
<section class="contact-page pt-5 pb-5">
		<div class="container-lg">
			<div class="text-center pb-5">
                <h1 class="section-title font-900 font-title text-uppercase">Contáctenos</h1>
            </div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-5 mt-3 mb-3">
					<div class="contact-head">
						<p class="contact-head__text">Contáctenos aquí y estaremos encantados de responder sus consultas generales.</p>
						
						<div class="contact-info pt-3">
						<!--start contact info single-->
						<div class="contact-info-single d-flex align-items-center">
							<div class="icon" title="Teléfono">
								<i class="fas fa-phone"></i>
							</div>
							<div class="content">
                				<p><strong>Teléfonos</strong></p>
								<p>+51 993945530</p>
							</div>
						</div>
						<div class="contact-info-single d-flex align-items-center">
							<div class="icon" title="Teléfono">
								<i class="fab fa-whatsapp"></i>
							</div>
							<div class="content">
                				<p><strong>WhatsApp</strong></p>
								<a target="_blank" href="https://wa.link/0mt39u"><p>+51 993945530</p></a>
							</div>
						</div>
						<!--end contact info single-->
						<!--start contact info single-->
						<div class="contact-info-single d-flex align-items-center">
							<div class="icon" title="Correo electrónico">
								<i class="fas fa-envelope"></i>
							</div>
							<div class="content">
                				<p><strong>Correo electrónico</strong></p>
								<p>contactenos@goodyearfootweat.pe</p>
							</div>
						</div>
						<!--end contact info single-->
						<!--start contact info single-->
						<div class="contact-info-single d-flex align-items-center">
							<div class="icon" title="Dirección">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<div class="content">
								<p><strong>Dirección</strong></p>
								<p>Av. Coronel Mendoza N° 00 Tacna, Perú</p>
							</div>
						</div>
					</div>

					</div>
				</div>
				<!-- End contact icon -->
				<div class="col-sm-12 col-md-12 col-lg-7 mt-3 mb-3">

					<div class="contact-form">
						<!-- form -->
						<form role="form" name="FormContacto" id="FormContacto" onSubmit="return false">
							<div class="form-row">
								<div class="form-group col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required data-error="Por favor, escriba su nombre">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<input type="email" name="email" id="email" class="email form-control" placeholder="Correo electrónico" required data-error="Por favor introduzca su correo electrónico">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-6 col-md-6 col-lg-6">
									<input type="text" name="phone" id="phone" class="email form-control" placeholder="Teléfono" required data-error="Por favor introduzca su teléfono">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto" required data-error="Por favor ingrese su asunto del mensaje">
									<div class="help-block with-errors"></div>
								</div>
								<div class="form-group col-sm-12 col-md-12 col-lg-12">
									<textarea rows="6" name="message" id="message" class="form-control" placeholder="Mensaje" required data-error="Escribe tu mensaje"></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								{{ csrf_field() }}
								<input type="hidden" name="MM_enviar" id="MM_enviar" value="MM_contacto">
								<button type="submit" id="btn-contact" class="contact-btn">
									<div class="d-flex align-items-center justify-content-center">
										<span id="spinnerc" class="spinner-border spinner-border-sm mr-2 d-none" role="status" aria-hidden="true"></span>
										<span class="btnmessage-text">ENVIAR</span>
									</div>
								</button>
							</div>
						</form>
						<!-- form -->
					</div>
				</div>
				<!-- End contact Form -->
			</div>
		</div>
</section>
<!-- End contact section -->
<!-- location -->
<!-- maps -->
<section class="section-default bg-content">
<div class="container-lg">
	<div class="text-center pb-5 pt-5">
		<h1 class="section-title font-900 font-title text-uppercase">Ubícanos</h1>
	</div>
</div>
<div class="embed-responsive embed-responsive-21by9" id="map">
</div>
</section>
<script>
var Latitud = -18.0044137;
var Longitud = -70.244121;
var Acercamiento = 18;
var TituloEmpresa = "Goodyear Footwear Perú";
var AddressCompany = "Av. Coronel Mendoza N° 00 Tacna, Perú";
var PhoneCompany = "+51 98673589";
 
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
<!-- location -->
@endsection