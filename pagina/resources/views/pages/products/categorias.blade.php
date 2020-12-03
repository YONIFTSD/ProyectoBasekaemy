@extends('layouts.default')
@section('title', 'Nuestros Productos')
@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="text-center pb-4">
            <h1 class="section-title font-900 font-title text-uppercase">Nuestros Productos</h1>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-3">
                <div class="c-category-item text-center">
                    <a href="{{ url('productos/'.$category->id_category.'/'.str_slug($category->name).'/c') }}">
                        <div class="c-category-item__img">
                            <div class="ccii_content text-center">
                                @if($category->image != 'default.jpg')
                                <img class="img-fluid" src="{{ asset('thumb/250x250/uploads/categoria/'.$category->image) }}" alt="{{ $category->name }}" title="{{ $category->name }}" />
                                @else
                                <img class="img-fluid" src="{{ asset('thumb/250x250/assets/img/thumbnail.png') }}" alt="{{ $category->name }}" title="{{ $category->name }}" />
                                @endif
                            </div>
                        </div>
                        <div class="c-category-item__content">
                            <span class="c-category-item__title font-title font-900">{{ $category->name }}</span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection