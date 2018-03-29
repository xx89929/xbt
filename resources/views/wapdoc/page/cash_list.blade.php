@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            @foreach($cashList as $cl)
            <div class="card">
                <div class="card-header">@if($cl->is_cash == 1) <span style="color: green">提现成功</span> @else <span style="color: red">待审核</span> @endif </div>
                <div class="card-content">
                    <div class="card-content-inner">
                        <div class="item-title">
                            金额：<i style="font-size: 1rem;color: red;">{{number_format($cl->goods,2)}}</i>
                        </div>
                        <div class="item-subtitle">
                            信息：{{$cl->cash_bank->bank_name}}  {{$cl->bank_branch}} : {{$cl->bank_code}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">{{$cl->created_at}}</div>
            </div>
            @endforeach

                <div class="laravel-pages">
                    {{ $cashList->links() }}
                </div>
        </div>
    </div>
@endsection
@section('left-panel')
    @include('wapdoc.common.sider')
@endsection

@section('jss')

@endsection
