@extends('home.layout.base')
@section('content')
    @include('home.page.partner.partials.banner')
    <div class="bg-gray">
        <div class="container">
            <div class="partner-box clearfix">
                @include('home.page.partner.partials.question')
                @include('home.page.partner.partials.par_input')
            </div>

        </div>
    </div>
@endsection