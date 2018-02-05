<div class="ind-partner" style="background: url('{{url("home/images/ind-adt.jpg")}}')">
    <div class="ind-partner-d1">
        <div class="container">
            <div class="ind-partner-box text-center ">
                <div class="ind-center-title">
                    <h4>加盟我们</h4>
                    <p>打造中国非手术壮药修疤领军品牌</p>
                </div>

                <form method="post" action="{{route('partner.create')}}">
                    {{csrf_field()}}
                    <div class="ind-partner-input center-block">
                        <div class="ind-partner-input-group clearfix">
                            <label class="pull-left">姓名</label>
                            <input name="name" class="pull-left" type="text">
                        </div>
                        <div class="ind-partner-input-group clearfix">
                            <label class="pull-left">电话</label>
                            <input name="phone" class="pull-left" type="text">
                        </div>
                        <div class="ind-partner-input-group clearfix">
                            <label class="pull-left">备注</label>
                            <input name="des" class="pull-left" type="text">
                        </div>

                        @if(session('status'))
                            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>{{session('status')}}</strong>
                            </div>
                        @endif
                        <div class="ind-partner-input-group clearfix">
                            <button type="submit">申请加盟</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>