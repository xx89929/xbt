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