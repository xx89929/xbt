$(function () {
    $('#usr-reg').bootstrapValidator({
        message: '输入无效',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: '用户名验证失败',
                validators: {
                    notEmpty: {
                        message: '用户名不能为空'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: '长度要在 %s and %s 之间'
                    }
                },
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '密码不能为空',
                    },
                    different: {
                        field: 'username',
                        message: '不能和用户名相同'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: '长度要在 %s and %s 之间'
                    }
                }
            },
            password_confirmation:{
                validators: {
                    notEmpty: {
                        message: '确认密码不能为空'
                    },
                    identical: {
                        field: 'password',
                        message: '必须于密码相同'
                    },
                }
            }
        }
    });
});




$(function () {
    $('#doc-reg').bootstrapValidator({
        message: '输入无效',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            account: {
                message: '用户名验证失败',
                validators: {
                    notEmpty: {
                        message: '用户名不能为空'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: '长度要在 %s and %s 之间'
                    }
                },
            },
            realname:{
                validators: {
                    notEmpty: {
                        message: '真实姓名不能为空'
                    },
                },
            },
            doc_password: {
                validators: {
                    notEmpty: {
                        message: '密码不能为空',
                    },
                    different: {
                        field: 'account',
                        message: '不能和用户名相同'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: '长度要在 %s and %s 之间'
                    }
                }
            },
            doc_password_confirmation:{
                validators: {
                    notEmpty: {
                        message: '确认密码不能为空'
                    },
                    identical: {
                        field: 'doc_password',
                        message: '必须于密码相同'
                    },
                }
            }
        }
    });
});


function areaJajx(Url,param,next_par) {
    $.ajax({
        async: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'get',
        url : Url,
        data : param,
        success:function (data) {
            // console.log('成功',data);
            console.log(data);
            if(Array.isArray(data)){
                $(next_par).empty();
                var i = 0;
                for(i;i < data.length;i++){
                    $(next_par).append(
                        "<option value='"+data[i]['id']+"'>"+data[i]['text']+"</option>"
                    );
                };
            }
            if(next_par){
                areaPost($(next_par));
            }
        },
        error:function (data) {
            console.log('失败',data);
            res = data;
        }
    });
}