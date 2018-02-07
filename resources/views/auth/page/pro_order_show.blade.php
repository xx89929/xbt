@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            <div class="order_show_box ">
                <div class="order_addr clearfix order_show_row">
                    <div class="order_tit">
                        <h4>收货地址</h4>
                    </div>
                    <div class="order_addr_item col-lg-4">
                        <h4>{{$order['member_addr_info']->consignee}}</h4>
                        <p>{{$order['member_addr_info']->phone}}</p>
                        <span>{{$order['province']->area_name}}</span>
                        <span>{{$order['city']->area_name}}</span>
                        <span>{{$order['district']->area_name}}</span>
                        <p>{{$order['address']}}</p>
                        <div class="edit-addr-a">
                            <a href="{{route('member.address')}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="order_show_row clearfix">
                    <div class="order_tit pull-left">
                        <h4>支付方式</h4>
                    </div>
                    <div class="order_pay_way  pull-left">
                        <ul class="list-inline">
                            <li>
                                <a>
                                    <div class="pay_icon" id="aliPay" value="1">
                                        <img src="{{asset('home/images/icon/alipaypcnew.png')}}">
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div class="pay_icon"  id="wechatPay" value="2">
                                        <img src="{{asset('home/images/icon/pc_wxqrpay.png')}}">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="order_show_row">
                    <div class="order_tit">
                        <h4>配送方式</h4>
                    </div>
                </div>

                <div class="order_show_row">
                    <div class="order_tit">
                        <h4>商品</h4>
                    </div>
                    <div class="order_show_pro">
                        <ul class="list-inline clearfix">
                            <li class="col-xs-1">
                                <img class="order_pro_pic" src="{{asset('storage/'.$order['pro']->pics[0])}}">
                            </li>
                            <li class="col-xs-4">
                                <a target="_blank" href="{{route('pro-info',['id' => $order['pro']->id])}}">{{$order['pro']->name}}</a>
                                <p>{{$order['pro']->specification}}</p>
                                <p>{{$order['pro']->description}}</p>
                            </li>
                            <li class="col-xs-3">
                                <p>店铺：{{$order['store']->name}}</p>
                                {{--<img class="order_store_img" src="{{asset('storage/'.$order['store']->store_pic)}}">--}}
                                <p>医生：{{$order['doctor']->realname}}</p>
                            </li>
                            <li class="col-xs-3">
                                <p>￥{{$order['pro']->price}} x {{$order['pro_num']}}</p>
                            </li>
                            <li class="col-xs-1">
                                <p><i>￥{{number_format($order['order_money'],2)}}</i></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <form id="pay_form" method="post" action="{{route('alipay.post')}}">
                    {{csrf_field()}}
                    <input name="order_id" type="hidden" value="{{$order['id']}}">
                    <input name="pay_type" type="hidden" value="">

                    <div class="order_show_submit clearfix">
                        <button class="pull-right" type="submit">立即付款</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection