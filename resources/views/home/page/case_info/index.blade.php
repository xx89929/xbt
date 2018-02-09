@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            <div class="news-item-warp clearfix">
            @include('home.page.case_info.partials.news-item-left')
            @include('home.page.case_info.partials.news-item-right')
            </div>
        </div>
    </div>
@endsection