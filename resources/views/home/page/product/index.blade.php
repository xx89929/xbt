@extends('home.layout.base')
@section('content')
    @include('home.page.product.partials.banner')
    <div class="container">
        @include('home.page.product.partials.product-nav')
    </div>

    <div class="bg-gray">
        <div class="container">
            <div class="product-f1 clearfix">
                @include('home.page.product.partials.product-box')
                @include('home.page.product.partials.hot-product-box')
            </div>
        </div>
    </div>
@endsection