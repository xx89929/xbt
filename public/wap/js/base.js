$(document).on("pageInit", "#page-index", function(e, id, $page) {
    $(document).on('refresh', '.page-index',function(e) {
        setTimeout(function() {
            $($("#index-tpl").html()).insertBefore($(".list a").eq(0));
            $.pullToRefreshDone('.page-index');
        }, 2000);
    });

    var loading = false;
    $(document).on('infinite', '.page-case',function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $(".page-home .list").append($($("#index-tpl").html()));
            loading = false;
        }, 2000);
    });

});

$(document).on("pageInit", "#page-goods", function(e, id, $page) {
    var loading = false;
    $(document).on('infinite', '.page-goods',function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $(".page-goods ul").append($(".page-goods ul").html());
            loading = false;
        }, 2000);
    });
});

var $dark = $("#dark-switch").on("change", function() {
    $(document.body)[$dark.is(":checked") ? "addClass" : "removeClass"]("theme-dark");
});

$('#member-panel-button').click(function () {
    if($('#left-panel-button').css('display') === 'none'){
        $(this).addClass('open-panel').removeClass('close-panel');
    }
    else {
        $(this).addClass('close-panel').removeClass('open-panel');
    }
});

$('#member-login-button').click(function () {
    $('#member-login').submit();
});

$('#doctor-login-button').click(function () {

    $('#doctor-login').submit();
});

$('.item-link').click(function () {
    window.location.href = $(this).attr('url');
})


$('#resetPwdButton').click(function () {
    $('#resetPwdForm').submit();
})

$('.auth-sider').click(function () {
    window.location.href = $(this).attr('url');
})


$('#bindEmailButton').click(function () {
    $('#bindEmailForm').submit();
})

$(function () {
    var after ='';
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount = 60;//当前剩余秒数
    var exp =new Date();
    var time;
    time = exp.getTime();

    $('#sendSmsVerify').click(function () {
        RegPhoneSms();
    })
//timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $("#sendSmsVerify").removeAttr("disabled");//启用按钮
            $("#sendSmsVerify").text("重新发送验证码");
            curCount = 60;
        } else {
            curCount--;
            $("#sendSmsVerify").text(curCount + "秒后重新获取");
        }
    }

    function RegPhoneSms() {
        $.ajax({
            url: $('#sendSmsVerify').data('url'),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "get",
            // dataType: "json",
            data: {'phone' : $('#userPhoneSend').val()},
            success: function (data) {
                if(data == 'OK'){
                    $.toast("发送成功");
                    //设置button效果，开始计时
                    $("#sendSmsVerify").attr("disabled", "true");
                    $("#sendSmsVerify").val(curCount + "秒后重新获取");
                    InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                }else{
                    $.toast("发送失败");
                    console.log(data);
                }
            },
            error: function (data) {
                console.log('失败',data)
            }
        });
    }

})
$.init();
