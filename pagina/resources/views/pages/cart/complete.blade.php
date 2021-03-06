@extends('layouts.default')

@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100 text-center py-3">
            <div class="mb-4">
                <svg width="96px" height="96px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m512 256c0 141.386719-114.613281 256-256 256s-256-114.613281-256-256 114.613281-256 256-256 256 114.613281 256 256zm0 0" fill="#60daa8"/><path d="m237.539062 428.992188c21.125-20.019532 30.492188-47.675782 30.492188-47.675782l-34.046875-28.90625s-41.835937-80.371094-41.578125-80.167968c-93.40625-108.621094-22.890625-255.890626-22.09375-257.550782-99.234375 35.25-170.3125 129.984375-170.3125 241.308594 0 131.761719 99.566406 240.277344 227.554688 254.4375-16.675782-25.257812-12.875-59.777344 9.984374-81.445312zm0 0" fill="#00ce8e"/><path d="m240.351562 393.605469c-7.976562 0-15.996093-2.550781-22.753906-7.765625l-120.679687-93.089844c-16.304688-12.574219-19.328125-35.988281-6.75-52.292969 12.574219-16.300781 35.988281-19.324219 52.292969-6.75l93.367187 72.027344 128.820313-142.570313c13.804687-15.277343 37.378906-16.472656 52.660156-2.664062 15.277344 13.800781 16.472656 37.378906 2.664062 52.65625l-151.941406 168.160156c-7.328125 8.109375-17.46875 12.289063-27.679688 12.289063zm0 0" fill="#fffcdc"/></svg>
            </div>
            <h3 class="font-title font-900">Su Pedido ha sido procesado</h3>
            <p class="font-title font-700">¡Su pedido ha sido realizado con éxito!</p>
            <hr/>
            <div class="w-100">Puede ver sus pedidos en la página <a href="{{ url('my-account') }}">Mi Cuenta</a>, pulsando sobre <a href="{{ url('my-account/orders') }}">Mis Pedidos</a></div>
            <div class="w-100 mb-4">Si tiene cualquier duda, póngase en contacto con <a href="{{ url('contactenos') }}">Nosotros</a></div>
            <a href="{{ url('my-account/orders') }}" class="btn btn-main text-uppercase font-700">Ir a Mis Pedidos</a>
        </div>
    </div>
</section>
@endsection