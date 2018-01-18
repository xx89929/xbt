@extends('home.layout.base')
@section('content')
    @include('home.page.case.partials.banner')
    <div class="bg-gray">
        <div class="container">
            @include('home.page.contact.partials.contact-box')
        </div>
    </div>
@endsection