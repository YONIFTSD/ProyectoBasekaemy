@extends('layouts.default')

@section('content')
<section class="section-default py-5">
    <div class="container-lg">
        <div class="w-100">
            <div class="text-center pb-2">
                <h1 class="section-title font-900 font-title text-uppercase">{{ $category->name }} / {{ $subcategory->name }}</h1>
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