@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            <div class="news-item-warp clearfix">
            @include('home.page.news_item.partials.news-item-left')
            @include('home.page.news_item.partials.news-item-right')
            </div>
        </div>
    </div>
@endsection