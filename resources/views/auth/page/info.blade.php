@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-info-box">
        <div class="member-c-tit">
            <h4>个人信息</h4>
        </div>
        <form method="post" action="{{route('memberInfo.save')}}" enctype ="multipart/form-data">
            {{csrf_field()}}
        <div class="member-i-info clearfix">
            <div class="member-i-info-l pull-left">
                <ul class="list-unstyled">
                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">账号</div>
                            <div class="member-i-info-des pull-left">{{Auth::user()->username}}</div>
                        </div>
                    </li>

                    <li class="clearfix">
                        <div class="member-i-info-item">
                            <div class="member-i-info-tit pull-left">昵称</div>
                            <div class="member-i-info-des pull-left">
                                <input name="nickname" type="text" value="{{Auth::user()->member_info_one->nickname}}">
                            </div>
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
                            <div class="member-i-info-tit pull-left">创建时间</div>
                            <div class="member-i-info-des pull-left">{{Auth::user()->created_at}}</div>
                        </div>
                    </li>
                    <li class="text-center">
                        <button class="auth_save" type="submit">保存</button>
                    </li>
                </ul>
            </div>

            <div class="member-i-info-r pull-left">
                <div class="member-i-info-r-img">
                    <img src="{{asset('storage/'.Auth::user()->member_info_one->head_pic)}}">
                </div>
                <div class="member-i-info-r-upheadpic">
                    <input type="file" name="head_pic">
                </div>
            </div>

        </div>
        </form>
    </div>
@endsection