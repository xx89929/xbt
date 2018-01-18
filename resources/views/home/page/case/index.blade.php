@extends('home.layout.base')
@section('content')
    @include('home.page.case.partials.banner')
    <div class="bg-gray">
        <div class="container">
            <div class="case-box-f1 clearfix">
                @include('home.page.case.partials.case-nav')
                @include('home.page.case.partials.case-content')
            </div>
        </div>
    </div>
@endsection