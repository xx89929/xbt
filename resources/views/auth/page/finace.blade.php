@extends('auth.layout.authbase')
@section('auth-page')
    <div class="member-finace">
        <div class="member-finace-h text-center">
            <img class="img-circle center-block" src="{{url('home/images/headpic.jpg')}}">
            <h4>a123456</h4>
            <p>普通会员</p>
        </div>
        <div class="member-finace-c">
            <ul class="list-inline clearfix">
                <li class="col-xs-4 text-center">
                    <h4>￥0.00元</h4>
                    <p>账号余额</p>
                </li>
                <li class="col-xs-4 text-center">
                    <h4>0</h4>
                    <p>待支付</p>
                </li>
                <li class="col-xs-4 text-center">
                    <h4>0</h4>
                    <p>待收货</p>
                </li>
            </ul>
        </div>

        <div class="member-finace-detail">
            <div class="member-finace-detail-tit">
                <h4>资金明细</h4>
            </div>
            <div class="member-finace-detail-table">
                <table class="table table-hover">
                    <thead>
                        <th>金额</th>
                        <th>操作</th>
                        <th>余额</th>
                        <th>时间</th>
                        <th>备注</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>300</td>
                            <td>消费</td>
                            <td>2003</td>
                            <td>2018-1-22</td>
                            <td>购买XXXX产品</td>
                        </tr>
                        <tr>
                            <td>400</td>
                            <td>收入</td>
                            <td>2145</td>
                            <td>2018-1-23</td>
                            <td>红包收入</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection