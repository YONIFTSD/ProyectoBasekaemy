<!-- footer -->
<footer class="footer bg-footer">
  <div class="footer-content">
    <div class="footer-middle py-4">
        <div class="container">
            <div class="footer__widgets">
                <!-- row -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-3 py-3">
                        <div class="footer__widget footer-contacts">
                            <h5 class="footer-widget__title font-title">Contáctenos</h5>
                            <div class="text-subline"></div>
                            <ul class="footer-contacts__contacts footer-list pt-2">
                                <li class="d-flex align-items-center"><i class="footer-contacts__icon fab fa-whatsapp"></i><span>+51 993945530</span></li>
                                <li class="d-flex align-items-center"><i class="footer-contacts__icon fas fa-envelope"></i><span>comercial@goodyearfootwear.pe</span></li>
                                <li class="d-flex align-items-center"><i class="footer-contacts__icon fas fa-globe-americas"></i><span>goodyearfootwear.pe</span></li>
                                <li class="d-flex align-items-start">
                                    <i class="footer-contacts__icon fas fa-map-marker-alt mt-1"></i>
                                    <div>
                                        <span class="d-block">Av. Coronel Mendoza N° 00 Tacna, Perú</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 py-3 col-border-left">
                        <div class="footer__widget footer-links">
                            <h5 class="footer-widget__title font-title">Productos</h5>
                            <div class="text-subline"></div>
                            <ul class="footer-links__list footer-list pt-2">

                                @foreach ($categories as $category)
                                <li class="footer-links__item"><a href="{{ url('productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}" class="footer-links__link">{{$category->name}}</a></li>    
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 py-3 col-border-left">
                        <div class="footer__widget footer-links">
                            <h5 class="footer-widget__title font-title">Nosotros</h5>
                            <div class="text-subline"></div>
                            <ul class="footer-links__list footer-list pt-2">
                                <li class="footer-links__item"><a href="{{ url('nosotros') }}" class="footer-links__link">Acerca de Nosotros</a></li>
                                {{-- <li class="footer-links__item"><a href="{{ url('condiciones-de-venta') }}" class="footer-links__link">Condiciones de Venta</a></li> --}}
                                <li class="footer-links__item"><a href="{{ url('cambios-y-devoluciones') }}" class="footer-links__link">Cambios y Devoluciones</a></li>
                                <li class="footer-links__item"><a href="{{ url('guia-de-tallas') }}" class="footer-links__link">Guia de Tallas</a></li>
                                {{-- <li class="footer-links__item"><a href="{{ url('preguntas-frecuentes') }}" class="footer-links__link">Preguntas Frecuentes</a></li> --}}
                                <li class="footer-links__item"><a href="{{ url('contactenos') }}" class="footer-links__link">Contáctenos</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 py-3 col-border-left d-flex justify-content-center">
                        <div class="footer__widget d-flex align-items-center">
                            <div class="w-100 text-center">
                                <div class="footer-brand mb-4">
                                    <a href="{{ url('/') }}">
                                        <img class="img-fluid" src="{{ asset('assets/img/logo-footer.png') }}" alt="Master-G">
                                    </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-center py-3">
                                    <div class="text-disau font-title text-uppercase w-50">Distribuidor Autorizado</div>
                                    {{-- <div class="w-50"><img class="img-fluid" src="{{ asset('assets/img/logo-highstore.png') }}" alt="Tiendas Kaemy"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>
    </div>
    <div class="footer__bottom bg-footer__bottom">
        <div class="container">
            <div class="py-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer__copyright text-lg-left text-center">
                            <div class="text-copyright">Copyright © 2020 - GODYEAR footwear  - Perú  - Todos los derechos reservados</div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="footer__copyright text-lg-right text-center">
                            <div class="text-dev">Diseño: <a href="http://rjdisenadores.com" target="_blank">RJ diseñadores</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</footer>
<!-- footer -->