@extends('wap.layouts.base')
@section('content')
    <div class="page page-case" id="page-case">
        @include('wap.layouts.head')
        <div class="content">
            <div class="list-block media-list product-warp">
                <ul>
                    @foreach($product as $pr)
                    <li>
                        <a href="{{route('pro-info',['id' => $pr->id])}}" class="item-link item-content">
                            <div class="item-media"><img src="{{asset('storage/'.$pr->pics[0])}}" style='width: 4rem;'></div>
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">{{str_limit($pr->name,16)}}</div>
                                    <div class="item-after product-item-price">￥{{$pr->price}}</div>
                                </div>
                                <div class="item-subtitle">{{$pr->specification}}</div>
                                <div class="item-text">{{$pr->description}}</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="laravel-pages">
                    {{ $product->links() }}
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
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-after">{{$pn->title}}</div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('jss')

@endsection
