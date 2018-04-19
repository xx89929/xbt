@extends('wap.layouts.base')
@section('content')
    <div class="page page-index page-current" id="page-home">
        @include('wap.layouts.head')
        <div class="content">
            <div class="page-login">
                <div class="list-block inset text-center">
                    <form id="member-login" method="post" action="{{route('memberAddr.save')}}">
                        {{csrf_field()}}
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><i class="icon icon-card"></i></div>
                                    <div class="item-inner">
                                        <div class="item-input">
                                            <input type="text" name="consignee" placeholder="收货人姓名" value="{{@$myAddr->consignee}}">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><i class="icon icon-phone"></i></div>
                                    <div class="item-inner">
                                        <div class="item-input">
                                            <input name="phone" type="text" placeholder="手机号" value="{{@$myAddr->phone}}">
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="item-content">
                                    <div class="item-media"><i class="icon icon-home"></i></div>
                                    <div class="item-inner">
                                        <div class="item-input">
                                            <input name="location"  value="{{ @$myAddr->location }}" type="text" id='city-picker' placeholder="选择城市"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-media"><i class="icon icon-browser"></i></div>
                                    <div class="item-inner">
                                        <div class="item-input">
                                            <input name="address" type="text" placeholder="详细地址" value="{{ @$myAddr->address }}">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="content-block">
                    <p><a class="button button-big button-fill external" id="member-login-button"  data-transition='fade'>保存</a></p>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('left-panel')
    @include('wapauth.common.sider')
@endsection

@section('jss')

<script>
    $("#city-picker").cityPicker({
        toolbarTemplate: '<header class="bar bar-nav">\
    <button class="button button-link pull-right close-picker">OK</button>\
    <h1 class="title">choose address</h1>\
    </header>'
    });
</script>
@endsection
