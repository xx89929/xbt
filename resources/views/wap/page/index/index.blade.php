@extends('wap.layouts.base')
@section('content')
    <div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="5000">
        <div class="swiper-wrapper">
            @foreach($banner as $bn)
            <div class="swiper-slide"><img src="{{asset('storage/'.$bn->pic)}}" alt=""></div>
            @endforeach
        </div>
    </div>


    <div class="bg-white">
        <div class="content-padded">
            <div class="index-hot-pro row no-gutter">
                <a class="item-link item-content" href="#">
                    <div class="content-block-title index-title">
                        <h4 class="pull-left">热门产品</h4>
                        <span class="icon icon-right pull-right"></span>
                    </div>
                </a>

                @foreach($hot_product as $hp)
                    <div class="col-33 index-hot-pro-item">
                        <a class="item-link item-content" href="#"><img src="{{asset('storage/'.$hp->pics[0])}}">

                            <p class="index-hot-price">{{number_format($hp->price,2)}}</p>
                            <p class="index-hot-name">{{str_limit($hp->name,20)}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-77 index-doctors">
                <div class="row">
                    @foreach($Doctor as $dc)
                        <div class="col-33">
                            <img src="{{asset('storage/'.$dc->avatar)}}">
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection


@section('jss')
    <script>
        $.init();
    </script>
@endsection
