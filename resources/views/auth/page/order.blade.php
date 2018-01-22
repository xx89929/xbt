@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-order">
        <div class="member-order-tag">
            <ul class="list-inline">
                <li class="active"><a>全部有效订单</a></li>
                <li><a>待付款（0）</a></li>
                <li><a>已关闭（0）</a></li>
            </ul>
        </div>

        <div class="member-order-dis">
            <div class="member-order-search">
                <div class="member-order-search-input">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="search" placeholder="订单号、商品名称">
                    </form>
                    <i class="fa fa-search" onclick=""></i>
                </div>
            </div>
        </div>
    </div>
@endsection