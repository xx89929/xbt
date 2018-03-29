@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content" style="background-color: white">
            <div class="list-block media-list">
                <ul>
                    @foreach($payList as $pl)
                    <li>
                        <a class="item-link item-content">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">{{$pl->remark}}</div>
                                    <div class="item-after">{{$pl->created_at}}</div>
                                </div>
                                <div class="item-subtitle">{{number_format($pl->goods,2)}}</div>
                                <div class="item-text"><span style="color: {{$pl->docpay_payset->color}}">{{$pl->docpay_payset->title}}</span></div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="laravel-pages">
                    {{ $payList->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-panel')
    @include('wapdoc.common.sider')
@endsection
@section('jss')


@endsection
