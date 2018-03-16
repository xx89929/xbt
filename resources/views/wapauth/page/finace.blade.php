@extends('wap.layouts.base')
@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            @foreach($payList as $py)
            <div class="card">
                <div class="card-header" ><span style="color:{{$py->pay_log_options->color}}">{{$py->pay_log_options->title}}</span><span class="finace-price">￥{{number_format($py->goods,2)}}</span></div>
                <div class="card-content">
                    <div class="list-block media-list">
                        <ul>
                            <li class="item-content">
                                <div class="item-inner">
                                    <div class="item-subtitle">{{$py->remark}}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <span>{{$py->created_at}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')


@endsection
