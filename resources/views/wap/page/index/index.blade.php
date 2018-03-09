@extends('wap.layouts.base')
@section('content')
    <div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="5000">
        <div class="swiper-wrapper">
            @foreach($banner as $bn)
            <div class="swiper-slide"><img src="{{asset('storage/'.$bn->pic)}}" alt=""></div>
            @endforeach
        </div>
    </div>



        <div class="index-hot-pro row">
            <h5 class="content-block-title">热门产品</h5>
            @foreach($hot_product as $hp)
                <div class="col-33 index-hot-pro">
                    <a class="item-link item-content" href="#">
                        <img src="{{asset('storage/'.$hp->pics[0])}}">
                        <p>{{number_format($hp->price,2)}}</p>
                        <p>{{$hp->name}}</p>
                        <p>{{str_limit($hp->description,10)}}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="list-block">
            <ul class="row">
                <li class="col-33"><a href="#" class="item-link list-button">List Button 1</a></li>
                <li class="col-33"><a href="#" class="item-link list-button">List Button 2</a></li>
                <li class="col-33"><a href="#" class="item-link list-button">List Button 3</a></li>
            </ul>
        </div>
    

@endsection


@section('jss')
    <script>
        $.init();
    </script>
@endsection
