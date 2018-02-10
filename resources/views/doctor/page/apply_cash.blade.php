<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">医生提现</h4>
            </div>
            <form id="apply_cash" method="post" action="{{route('doc.applyCash')}}">
                {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputAmount">申请提现金额</label>
                    <div class="input-group">
                        <div class="input-group-addon">￥</div>
                        <input name="goods" type="text" class="form-control" id="exampleInputAmount" placeholder="申请提现金额">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">申请提现</button>
            </div>
            </form>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $(function () {
            $('#apply_cash').bootstrapValidator({
                message: '输入无效',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    goods: {
                        message: '金额',
                        validators: {
                            notEmpty: {
                                message: '金额不能为空'
                            },
                            regexp: {//匹配规则
                                regexp: /(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/,
                                message:'格式不对！如：10.05'
                            },

                        },
                    },
                }
            });
        });
    </script>
@endsection