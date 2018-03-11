@extends('wap.layouts.base')
@section('content')
    <div class="content">
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

                <div class="index-doctors-box">
                    <div class="list-block" style="margin: .2rem 0">
                        <ul>
                            @foreach($Doctor as $dc)
                                <li class="item-content item-link">
                                    <div class="item-media index-doctors-avatar"><img style="width: 100%" src="{{asset('storage/'.$dc->avatar)}}"></div>
                                    <div class="item-inner">
                                        <div class="item-title">{{$dc->doc_to_doc_group->title}}</div>
                                        <div class="item-after">{{$dc->realname}}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="index-case row">
                    <a class="item-link item-content " href="#">
                        <div class="content-block-title index-title " style="margin-left: 4%" >
                            <h4 class="pull-left">真实案例</h4>
                            <span class="icon icon-right pull-right"></span>
                        </div>
                    </a>

                    @foreach($case as $cs)
                        <div class="col-50 index-hot-pro-item">
                            <a class="item-link item-content" href="#"><img src="{{asset('storage/'.$cs->image)}}">
                                <p>{{str_limit($cs->name,30)}}</p>
                                <p>{{str_limit($cs->describe,30)}}</p>
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
@endsection

@section('panel')
    <div class="panel panel-left panel-reveal theme-dark" id='member-panel'>
        <div class="content-block-title">会员管理</div>
        <div class="list-block">
            <ul>
                <li class="item-content">
                    <div class="item-inner">

                        <div class="item-after">注册</div>
                    </div>
                </li>
                <li class="item-content">
                    <div class="item-inner">
                        <div class="item-after">登陆</div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="content-block-title">医师管理</div>
        <div class="list-block">
            <ul>
                <li class="item-content">
                    <div class="item-inner">
                        <div class="item-after">审核</div>
                    </div>
                </li>
                <li class="item-content">
                    <div class="item-inner">
                        <div class="item-after">登陆</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('jss')
    <script>
        $.init();
    </script>
    <script>
        $('#member-panel-button').click(function () {
            if($('#member-panel').css('display') === 'none'){
                $(this).addClass('open-panel').removeClass('close-panel');
            }
            else {
                $(this).addClass('close-panel').removeClass('open-panel');
            }
        })
    </script>
@endsection
