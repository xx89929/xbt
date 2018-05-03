@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            @include('home.page.pro-info.partials.nav-crumb')
        </div>
        <div class="pro_info">
            <div class="container">
                @include('home.page.pro-info.partials.pro_info')
            </div>
        </div>
        <div class="container">
            @include('home.page.pro-info.partials.pro_info_b')
        </div>
    </div>

@endsection

