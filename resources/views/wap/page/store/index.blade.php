@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="list-block media-list store-st-list">
                <ul>
                    @foreach($store as $st)
                    <li>
                        <a href="{{route('store.info',['id' => $st->id])}}" class="item-link item-content store-st-item">
                            <div class="item-media"><img src="{{asset('storage/'.$st->store_pic)}}" style='width: 4rem;'></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">{{$st->name}}</div>
                                </div>
                                <div class="item-subtitle store-st-item-subtitle">
                                    {{$st->province->area_name}}
                                    {{$st->city->area_name}}
                                    {{$st->district->area_name}}
                                    {{$st->address}}
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('left-panel')
@endsection

@section('jss')

@endsection
