@extends('wap.layouts.base')
@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <form method="post" action="{{route('order.create')}}">
                {{ csrf_field() }}
                <input name="pro_id" type="hidden" value="{{$res['product']->id}}">
                <input name="store_id" type="hidden" value="{{$res['store']->id}}">
                <input name="doctor_id" type="hidden" value="{{$res['doctor']->id}}">

                <div class="card">
                    <div class="card-header pro-info-card-title">产品信息</div>
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <img src="{{asset('storage/'.$res['product']->pics[0])}}" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title card-t-title">{{$res['product']->name}}</div>
                                        </div>
                                        <div class="item-subtitle ps-pro-price">
                                            <i><em>￥</em>{{number_format($res['product']->price,2)}}</i>
                                        </div>

                                        <div class="item-subtitle">
                                            <div class="clearfix row no-gutter ps-num-controller">
                                                <button type="button" class="pull-left" id="ps-num-controller-dec">-</button>
                                                <div class="pull-left col-20 item-input">
                                                    <input name="pro_num" id="ps-num-val" type="text"  value="1">
                                                </div>
                                                <button type="button" class="pull-left" id="ps-num-controller-add">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header pro-info-card-title">支付方式</div>
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li>
                                    <label class="label-checkbox item-content">
                                        <input type="radio" name="pay_way" value="aliPay">
                                        <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                                        <div class="item-inner">
                                            <div class="item-media">
                                                <img src="{{url('home/images/icon/alipaypcnew.png')}}" />
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <label class="label-checkbox item-content">
                                        <input type="radio" name="pay_way" value="wePay">
                                        <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                                        <div class="item-inner">
                                            <div class="item-media">
                                                <img src="{{url('home/images/icon/pc_wxqrpay.png')}}" />
                                            </div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


                <div class="card">
                    <div class="card-header pro-info-card-title">店铺信息</div>
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <img src="{{asset('storage/'.$res['store']->store_pic)}}" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">{{$res['store']->name}}</div>
                                        </div>
                                        <div class="item-subtitle ps-subtitle">{{$res['store']->address}}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header pro-info-card-title">医生信息</div>
                    <div class="card-content">
                        <div class="list-block media-list">
                            <ul>
                                <li class="item-content">
                                    <div class="item-media">
                                        <img src="{{asset('storage/'.$res['doctor']->avatar)}}" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">{{$res['doctor']->realname}}</div>
                                        </div>
                                        <div class="item-subtitle ps-subtitle">{{$res['doctor']->doc_group_sns->title}}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-header pro-info-card-title">收货信息</div>
                    <div class="card-content">
                        <div class="list-block">
                            <ul>
                                <!-- Text inputs -->
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">姓名</div>
                                            <div class="item-input">
                                                <input name="take_name" type="text" placeholder="请填写收货人姓名">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">电话</div>
                                            <div class="item-input">
                                                <input type="text" name="take_phone" placeholder="请填写收货人电话">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="align-top">
                                    <div class="item-content">
                                        <div class="item-title label">详细地址</div>
                                        <div class="item-inner">
                                            <div class="item-input">
                                                <textarea name="take_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="content-block">
                            <div class="row ps-submit-box">
                                <div class="col-50"><div class="item-content totals-cout">
                                        <span>共计：￥</span><span  id="totals"></span>
                                    </div></div>
                                <div class="col-50">
                                    <button type="submit" class="button">立即购买</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')
<script>
    $(document).ready(function () {
        var price = "{{$res['product']->price}}";
        totalNum(price,1);

        $('#ps-num-controller-add').click(function () {
            var value = parseInt($('#ps-num-val').val());
            if(value > 99) return false;
            value++;
            $('#ps-num-val').val(value);
            totalNum(price,value);
        });
        $('#ps-num-controller-dec').click(function () {
            var value = parseInt($('#ps-num-val').val());
            if(value < 2) return false;
            value--;
            $('#ps-num-val').val(value);
            totalNum(price,value);
        });

        $("#ps-num-val").change(function () {
            var value = parseInt($(this).val());
            console.log(value);
            if(isNaN(value)) {
                value = 1;
                $(this).val(value);
            };
            totalNum(price,value);
        });

//        $('#ps-submit-button').click(function () {
//            $('#ps-form').submit();
//        });


        function totalNum(total,num) {
            var totals = total*parseInt(num);
            $('#totals').text(formatCurrency(totals));
        };


        function formatCurrency(num) {
            num = num.toString().replace(/\$|\,/g,'');
            if(isNaN(num))
                num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num*100+0.50000000001);
            cents = num%100;
            num = Math.floor(num/100).toString();
            if(cents<10)
                cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                num = num.substring(0,num.length-(4*i+3))+','+
                    num.substring(num.length-(4*i+3));
            return (((sign)?'':'-') + num + '.' + cents);
        }
    });



</script>

@endsection
