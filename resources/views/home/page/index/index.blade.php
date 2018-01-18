@extends('home.layout.base')
@section('content')
    @include('home.page.index.partials.banner')
    @include('home.page.index.partials.hot-product')
    <div class="bg-gray">
        <div class="container">
            @include('home.page.index.partials.consult')
            @include('home.page.index.partials.case')
        </div>
    </div>
    <div class="container">
        @include('home.page.index.partials.news')
    </div>
    @include('home.page.index.partials.banner2')
    <div class="container">
        @include('home.page.index.partials.circum')
    </div>
    @include('home.page.index.partials.partner')

@endsection