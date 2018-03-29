@extends('wap.layouts.base')

@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="content-block">
                <div class="list-block">
                    <form id="resetPwdForm" method="POST" action="{{route('doc.bind.bank')}}">
                        {{ csrf_field() }}
                        <ul>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">选择银行</div>
                                        <div class="item-input">
                                            <select name="bank_type" @if($docInfo->bank_type) disabled @endif>
                                                @foreach($bankOp as $k => $l)
                                                <option value="{{$k}}" @if($docInfo->bank_type == $k) selected @endif>{{$l}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">开户行</div>
                                        <div class="item-input">
                                            <input name="bank_branch" type="text" placeholder="请输入开户行" @if($docInfo->bank_branch)value="{{$docInfo->bank_branch}}"disabled @endif>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">银行卡号</div>
                                        <div class="item-input">
                                            <input type="text" name="bank_code" placeholder="请输入银行卡号" @if($docInfo->bank_code)value="{{$docInfo->bank_code}}" disabled @endif>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="row">
                    <div class="col-100" id="resetPwdButton"><a href="#" class="button button-big button-fill button-danger">修改</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('left-panel')
    @include('wapdoc.common.sider')
@endsection

@section('jss')

@endsection
