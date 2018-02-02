@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-order">
        <div class="member-order-tag">
            <ul class="list-inline">
                <li class="active"><a>全部有效订单</a></li>
                <li><a>待付款（
                        @if( isset($order) )
                            0
                        @else
                            @foreach($order as $o)
                                @if($o->pay_status == 0)
                                    {{count($o)}}
                                @endif
                            @endforeach
                        @endif

                        ）</a>
                </li>
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

        <div class="member_my_order">
            <table class="table table-condensed" style="display: block;">
                <thead>
                <tr>
                    <th>订单号</th>
                    <th>物流单号</th>
                    <th>产品</th>
                    <th>选择医生</th>
                    <th>店铺</th>
                    <th>数量</th>
                    <th>总价格</th>
                    <th>下单时间</th>
                    <th>物流状态</th>
                    <th>付款状态</th>
                    <th>订单状态</th>

                </tr>
                </thead>
                <tbody>
                @foreach($order as $or)
                <tr>
                    <td>{{$or->order_id}}</td>
                    <td>{{$or->logist_id}}</td>
                    <td>{{$or->relevancy_order_pro->name}}</td>
                    <td>{{$or->rele_order_doctor->realname}}</td>
                    <td>{{$or->rele_order_store->name}}</td>
                    <td>{{$or->pro_nub}}</td>
                    <td>{{$or->order_money}}</td>
                    <td>{{$or->created_at}}</td>
                    <td>
                        @if($or->deal_status)
                            已出货
                            @else
                            未出货
                        @endif
                    </td>
                    <td>
                        @if($or->pay_status)
                            已付款
                        @else
                            未付款
                        @endif
                    </td>
                    <td>
                        @if($or->order_status)
                            交易成功
                        @else
                            进行中
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>


            <table class="table table-condensed" style="display: none;">
                <thead>
                <tr>
                    <th>订单号</th>
                    <th>物流单号</th>
                    <th>产品</th>
                    <th>选择医生</th>
                    <th>店铺</th>
                    <th>数量</th>
                    <th>总价格</th>
                    <th>下单时间</th>
                    <th>物流状态</th>
                    <th>付款状态</th>
                    <th>订单状态</th>

                </tr>
                </thead>
                <tbody>
                @foreach($order as $or)
                    @if($or->pay_status == 0)
                    <tr>
                        <td>{{$or->order_id}}</td>
                        <td>{{$or->logist_id}}</td>
                        <td>{{$or->relevancy_order_pro->name}}</td>
                        <td>{{$or->rele_order_doctor->realname}}</td>
                        <td>{{$or->rele_order_store->name}}</td>
                        <td>{{$or->pro_nub}}</td>
                        <td>{{$or->order_money}}</td>
                        <td>{{$or->created_at}}</td>
                        <td>
                            @if($or->deal_status)
                                已出货
                            @else
                                未出货
                            @endif
                        </td>
                        <td>
                            @if($or->pay_status)
                                已付款
                            @else
                                未付款
                            @endif
                        </td>
                        <td>
                            @if($or->order_status)
                                交易成功
                            @else
                                进行中
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $('.member-order-tag > ul > li ').click(function () {
            var index  = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            $('.member_my_order > table').eq(index).show().siblings().hide();
        })
    </script>
@endsection