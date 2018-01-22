@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-info-box">
        <div class="member-c-tit">
            <h4>个人信息</h4>
        </div>
        <div class="member-i-info clearfix">
            <div class="member-i-info-l pull-left">
                <ul class="list-unstyled">
                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">账号</div>
                            <div class="member-i-info-des pull-left">a123456</div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">昵称</div>
                            <div class="member-i-info-des pull-left">测试测试</div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">会员类型</div>
                            <div class="member-i-info-des pull-left">普通会员</div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">登陆次数</div>
                            <div class="member-i-info-des pull-left">1次</div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">创建时间</div>
                            <div class="member-i-info-des pull-left">2017-1-22 13：41：00</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="member-i-info-r pull-left">
                <div class="member-i-info-r-img">
                    <img src="{{url('home/images/headpic.jpg')}}">
                </div>
                <div class="member-i-info-r-upheadpic">
                    <input type="file" >
                </div>
            </div>

        </div>
    </div>
@endsection