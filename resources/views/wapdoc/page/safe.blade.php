@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="list-block doc-safe-warp">
                <ul>
                    <li >
                        <a class="item-content item-link" href="{{route('doc_password.request')}}">
                            <div class="item-inner">
                                <div class="item-title">修改密码</div>
                                <div class="item-after">修改</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="item-content item-link" href="{{route('doc.bind.bank')}}">
                            <div class="item-inner">
                                <div class="item-title">银行卡绑定</div>
                                <div class="item-after">绑定</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('left-panel')
    @include('wapdoc.common.sider')
@endsection

@section('jss')

@endsection
