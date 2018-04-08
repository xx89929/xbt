@extends('home.layout.base')
@section('content')
    <div class="bg-gray">
        <div class="container">
            <form id="pay_form" method="post" action="{{route('order.create')}}">
                {{csrf_field()}}
                <input name="pay_way" type="hidden" value="aliPay">
                <input name="pro_id" type="hidden" value="{{$res['product']->id}}">
                <input name="store_id" type="hidden" value="{{$res['store']->id}}">
                <input name="doctor_id" type="hidden" value="{{$res['doctor']->id}}">
                <div class="order_show_box ">
                    <div class="order_addr clearfix order_show_row">
                        <div class="order_tit pull-left">
                            <h4>收货信息</h4>
                        </div>
                        <div class="order_addr_item pull-left">
                            <ul class="list-inline">
                                <li>
                                    <input type="text" name="take_name" placeholder="收货人姓名">
                                </li>
                                <li>
                                    <input type="text" name="take_phone" placeholder="收货人电话">
                                </li>
                                <li>
                                    <input type="text" name="take_address" placeholder="收货地址">
                                </li>
                            </ul>
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
                                        <div class="pay_icon" id="aliPay" value="aliPay">
                                            <img src="{{asset('home/images/icon/alipaypcnew.png')}}">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <div class="pay_icon"  id="wechatPay" value="wePay">
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
                                    <img class="order_pro_pic" src="{{asset('storage/'.$res['product']->pics[0])}}">
                                </li>
                                <li class="col-xs-4">
                                    <a target="_blank" href="{{route('pro-info',['id' => $res['product']->id])}}">{{$res['product']->name}}</a>
                                    <p>{{$res['product']->specification}}</p>
                                    <p>{{$res['product']->description}}</p>
                                </li>
                                <li class="col-xs-2">
                                    <p>店铺：{{$res['store']->name}}</p>
                                    {{--<img class="order_store_img" src="{{asset('storage/'.$order['store']->store_pic)}}">--}}
                                    <p>医生：{{$res['doctor']->realname}}</p>
                                </li>
                                <li class="col-xs-2">
                                    <p>￥<em id="payshow-pro-price">{{$res['product']->price}}</em></p>
                                </li>
                                <li class="col-xs-2">
                                    <div class="pro-i-con-nub">
                                        <div class="pro-i-con-nub-item clearfix text-center">
                                            <button id="pro-nub-dec" class="pro-nub-contr pull-left">-</button>
                                            <input name="pro_num" type="text" class="pro-nub-val pull-left" value="1">
                                            <button id="pro-nub-ins" class="pro-nub-contr pull-left">+</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-xs-1">
                                    <p><i>￥<em id="payshow-total">{{number_format($res['product']->price,2)}}</em></i></p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="order_show_submit clearfix">
                        <button class="pull-right" type="button">立即付款</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection