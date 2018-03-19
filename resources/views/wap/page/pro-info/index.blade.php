@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
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
                        <h5>{{$proin->name}}</h5>
                        <p class="pro-info-price">￥<i>{{$proin->price}}</i></p>
                        <p class="pro-info-specification">规格：{{$proin->specification}}</p>
                        <p><a href="#" class="button button-fill button-danger">立即购买</a></p>
                    </div>
                </div>
            </div>

            <div class="card pro-info-options">
                <div class="card-header pro-info-card-title">参数选择</div>
                <div class="card-content content-padded">
                    <p>选择城市:</p>
                    <div class="row no-gutter">
                        <input class="col-33" type="text" id="pro-info-province" placeholder="省" value="" >
                        <input class="col-33" type="text" id="pro-info-city" placeholder="市" readonly>
                        <input class="col-33" type="text" id="pro-info-district" placeholder="区" readonly>

                    </div>

                </div>
            </div>

            <div class="card pro-info-content">
                <div class="card-header pro-info-card-title">产品详情</div>
                <div class="card-content">
                    <div class="card-content-inner">{!! $proin->pro_info !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-panel')

@endsection

@section('jss')
<script>
    $("#pro-info-province").picker({
        toolbarTemplate: '<header class="bar bar-nav">\
  <button class="button button-link pull-right close-picker">确定</button>\
  <h1 class="title">请选择城市</h1>\
  </header>',
        cols: [
            {
                textAlign: 'center',
                text:[ @foreach($province as $provi) '{{$provi->area_name}}',  @endforeach],
                values: [ @foreach($province as $provi) '{{$provi->area_name}}',  @endforeach],
                {{--displayValues: [ @foreach($province as $provi) '{{$provi->area_name}}',  @endforeach],--}}
                //如果你希望显示文案和实际值不同，可以在这里加一个displayValues: [.....]
            }
        ],

        onChange:function (picker) {
            var province = new Array;
            @foreach($province as $provi)
            province['{{$provi->id}}'] = '{{$provi->area_name}}';
            @endforeach

            console.log($)
            
        },
    });
</script>

<script>
    function areaPost(that) {
        var next_par = $(that).data('next'),
            url = $(that).data('url'),
            parent_id = $(that).val(),
            param = {
                'q' : parent_id,
            };
        areaJajx(url,param,next_par,that);
    }
</script>
@endsection
