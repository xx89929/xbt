@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content" style="background-color: white">
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
                        <a class="item-link item-content" href="{{route('product')}}">
                            <div class="content-block-title index-title">
                                <h4 class="pull-left">热门产品</h4>
                                <span class="icon icon-right pull-right"></span>
                            </div>
                        </a>

                        @foreach($hot_product as $hp)
                            <div class="col-33 index-hot-pro-item">
                                <a class="item-link item-content" href="{{route('pro-info',['id' => $hp->id])}}"><img src="{{asset('storage/'.$hp->pics[0])}}">

                                    <p class="index-hot-price">{{number_format($hp->price,2)}}</p>
                                    <p class="index-hot-name">{{str_limit($hp->name,10)}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="index-doctors-box">
                        <div class="list-block" style="margin: .2rem 0">
                            <ul>
                                @foreach($Doctor as $dc)
                                    <li >
                                        <a class="item-content link" href="http://p.qiao.baidu.com/cps/chat?siteId=11689720&userId=24928549" rel="external">
                                            <div class="item-media index-doctors-avatar"><img style="width: 100%" src="{{asset('storage/'.$dc->avatar)}}"></div>
                                            <div class="item-inner">
                                                <div class="item-title" style="color: #333;">{{$dc->realname}}</div>
                                                <div class="item-after">{{$dc->doc_to_doc_group->title}}</div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="index-case row">
                        <a class="item-link item-content " href="{{route('case')}}">
                            <div class="content-block-title index-title " style="margin-left: 4%" >
                                <h4 class="pull-left">真实案例</h4>
                                <span class="icon icon-right pull-right"></span>
                            </div>
                        </a>

                        @foreach($case as $cs)
                            <div class="col-50 index-hot-pro-item">
                                <a class="item-link item-content" href="{{route('case.info',['case_id' => $cs->id])}}"><img src="{{asset('storage/'.$cs->image)}}">
                                    <p>{{str_limit($cs->name,20)}}</p>
                                    <p>{{str_limit($cs->describe,20)}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <div class="index-news row no-gutter index-news-warp">
                        <div class="buttons-tab">
                            <a href="#index-news" class="tab-link active button">热点新闻</a>
                            <a href="#index-dynamic" class="tab-link button">业界动态</a>
                        </div>

                        <div class="tabs">
                            <div id="index-news" class="tab active">
                                <div class="card index-news-warp">
                                    <div class="card-content">
                                        <div class="list-block media-list">
                                            <ul>
                                                @foreach($news as $nw)
                                                <li>
                                                    <a style="padding-left: 0" href="{{route('news.item',['id' => $nw->id])}}" class="item-link item-content">
                                                        <div class="item-media"><img src="{{asset('storage/'.$nw->pic)}}" width="100"></div>
                                                        <div class="item-inner">
                                                            <div class="item-title-row">
                                                                <div class="item-title index-news-title">{{str_limit($nw->title,40)}}</div>
                                                            </div>
                                                            <div class="item-subtitle index-news-times">发布时间：{{$nw->updated_at}}</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="index-dynamic" class="tab">
                                <div class="card index-news-warp">
                                    <div class="card-content">
                                        <div class="list-block media-list">
                                            <ul>
                                                @foreach($dynamic as $dy)
                                                    <li>
                                                        <a style="padding-left: 0" href="{{route('news.item',['id' => $dy->id])}}" class="item-link item-content">
                                                            <div class="item-media index-news-img">
                                                                <img src="{{asset('storage/'.$dy->pic)}}" width="100">
                                                            </div>
                                                            <div class="item-inner">
                                                                <div class="item-title-row">
                                                                    <div class="item-title index-news-title">{{str_limit($dy->title,40)}}</div>
                                                                </div>
                                                                <div class="item-subtitle index-news-times">发布时间：{{$dy->updated_at}}</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="index-ser">
                        <a class="item-link item-content" href="">
                            <div class="content-block-title index-title">
                                <h4 class="pull-left">服务环境</h4>
                                <span class="icon icon-right pull-right"></span>
                            </div>
                        </a>

                        <div class="swiper-container swiper-container-horizontal swiper-container-ios" data-slides-per-view="3" data-space-between="10">
                            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                @foreach($serviceEnv as $se)
                                <div class="swiper-slide" style="width: 105px; margin-right: 30px;">
                                    <img src="{{asset('storage/'.$se->pic)}}">
                                    <p class="index-ser-subtitle">{{str_limit($se->title,20)}}</p>
                                </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-panel')
    <div class="panel panel-left panel-reveal theme-dark" id='left-panel-button'>
        <div class="content-block-title">商品分类</div>
        <div class="list-block">
            <ul>
                @foreach($proNav as $pn)
                <li >
                    <a class="item-content item-link" href="{{route('product',['cate_id' => $pn->id])}}">
                        <div class="item-inner">
                            <div class="item-after">{{$pn->title}}</div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('jss')

@endsection
