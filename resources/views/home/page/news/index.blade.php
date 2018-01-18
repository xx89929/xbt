@extends('home.layout.base')
@section('content')
    @include('home.page.news.partials.banner')
    <div class="container">
        @include('home.page.news.partials.news-nav')
    </div>

    <div class="bg-gray">
        <div class="container">
            @include('home.page.news.partials.news-content')
        </div>
    </div>
@endsection