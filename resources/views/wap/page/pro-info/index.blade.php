@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <form id="pro-info-order-form" method="post" action="{{route('order.payShow')}}">
                {{ csrf_field() }}
                <div class="pro-info-head">
                    <div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="5000">
                        <div class="swiper-wrapper">
                            @for($i = 0 ; $i < count($proin->pics) ; $i++)
                                <div class="swiper-slide"><img src="{{asset('storage/'.$proin->pics[$i])}}" alt="">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="row no-gutter pro-info-title">
                        <div class="content-padded">
                            <h3>{{$proin->name}}</h3>
                            <p class="pro-info-price">￥<i>{{$proin->price}}</i></p>
                            <p class="pro-info-specification">规格：{{$proin->specification}}</p>
                            <p class="pro-info-buyButton"><a href="#" id="pro-info-submit-button" class="button button-fill button-danger">立即购买</a></p>
                        </div>
                    </div>
                </div>

                <div class="card pro-info-options">
                    <div class="card-header pro-info-card-title">参数选择</div>
                    <div class="card-content content-padded pro-info-param">
                        <div class="item-content">
                            <div class="item-inner">
                                <div class="item-input pro-info-picker-input">
                                    <div class="row no-gutter">
                                        <input class="col-33"  name="order_address" type="text" placeholder="请选择地址" id="pro-info-city-picker" value="" readonly="">
                                        <input class="col-33" name="store_id" type="text" placeholder="请选择店铺" id="pro-info-store-picker" value="" readonly="">
                                        <input class="col-33" name="doctor_id" type="text" placeholder="请选择医生" id="pro-info-doctor-picker" value="" readonly="">
                                    </div>

                                    <input name="pro_id" type="hidden" value="{{$proin->id}}">
                                    <input name="drive_type" type="hidden" value="wap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card pro-info-content">
                    <div class="card-header pro-info-card-title">产品详情</div>
                    <div class="card-content">
                        <div class="card-content-inner">{!! $proin->pro_info !!}</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('left-panel')

@endsection

@section('jss')

<script>
    $("#pro-info-city-picker").cityPicker({
        toolbarTemplate: '<header class="bar bar-nav">\
<button class="button button-link pull-right close-picker">确定</button>\
<h1 class="title">选择城市</h1>\
</header>'
    });
</script>





<script>
    constData = '';
    $('#pro-info-store-picker').picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">请选择店铺</h1>\
  </header>',
        cols: [{
            textAlign: 'center',
            values: [''],
            }],
        onOpen:function (picker) {
            var Url = '{{route('getWapStoreOption')}}';
            var data = $('#pro-info-city-picker').val().split(' ');
            var param = {
                'area' : data,
            }


            areaJajxWap(Url,param);

            if(constData){
                picker.cols[0].replaceValues(constData);
                picker.updateValue();
            }else{
                picker.cols[0].replaceValues(['']);
                picker.updateValue();
            };
        },
        onClose:function (picker) {
            console.log(picker.value);
        }
    });





    $('#pro-info-doctor-picker').picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">请选择医生</h1>\
  </header>',
        cols: [{
            textAlign: 'center',
            values: ['']
        }],
        onOpen:function (picker) {
            var Url = '{{route('getWapDocOption')}}';
            var data = $('#pro-info-store-picker').val();
            var param = {
                'store' : data,
            }
            areaJajxWap(Url,param);

            if(constData){
                picker.cols[0].replaceValues(constData);
                picker.updateValue();
            }else{
                picker.cols[0].replaceValues(['']);
                picker.updateValue();
            };


        }
    });



    function areaJajxWap(Url,param) {
        $.ajax({
            async: false,
            type:'get',
            url : Url,
            data : param,
            success:function (data) {
                console.log('成功',data);
                constData = data;
                return;
            },
            error:function (data) {
                console.log('失败',data);
                constData = '';
                return false;
            }
        });
    }
</script>

<script>
    $('#pro-info-submit-button').click(function () {
        $('#pro-info-order-form').submit();
    })
</script>
@endsection
