window.onload=function (){
    $('.load-box').addClass('active');
    //        $('#loader-wrapper .load_title').remove();
};

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


$(function () {
    $("img.lazy").lazyload({
        effect : "fadeIn",
        event: 'scroll',
        placeholder:'/home/images/icon/zhanwei.png',
        failure_limit : 10,
        skip_invisible : false,
    });
})


$('.top-weixin-code-li').hover(function () {
    $(this).find('div.top-weixin-code').show();
},function () {
    $(this).find('div.top-weixin-code').hide();
})

$('.user-set-f1-list').click(function () {
    if($('.user-set-l-list').css('display') == 'none'){
        $('.user-set-l-list').show();
        $('.user-set-f1-list > a > i').attr('class','fa fa-angle-up');
    }else{
        $('.user-set-l-list').hide();
        $('.user-set-f1-list > a > i').attr('class','fa fa-angle-down');
    }
})

$('.user-set-f2-list').click(function () {
    if($('.user-set-l2-list').css('display') == 'none'){
        $('.user-set-l2-list').show();
        $('.user-set-f2-list > a > i').attr('class','fa fa-angle-up');
    }else{
        $('.user-set-l2-list').hide();
        $('.user-set-f2-list > a > i').attr('class','fa fa-angle-down');
    }
})


// $(function () {
//     var tDiv = $('.nav-ul > ul'),
//         links = tDiv.find('a'),
//         index = 0,//默认第一个菜单项
//         url = window.location.href.replace(/\/$/,' ');
//
//     if(url){//如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
//         for (var i=links.length; i--;) {//遍历 menu 的中连接地址
//             if(links[i].href.indexOf(url) !== -1){
//
//                 index = i;
//                 break;
//             }
//         }
//         links[index].parentNode.className = 'active';
//     }
// })



$('.classify_nav_ul > ul > li').hover(function () {
    var that = $(this)
    that.find('div.cla_item_dis').show();
},function () {
    var that = $(this)
    that.find('div.cla_item_dis').hide();
});

$('#carousel-example-generic').hover(function () {
    $('.carousel-control').show();
},function () {
    $('.carousel-control').hide();
})



$('.ind-news-acd-f1').hover(function () {
    $(this).find('div.ind-news-acd-des').stop().addClass('active');
},function () {
    $(this).find('div.ind-news-acd-des').stop().removeClass('active');
})
$('.ind-news-r2-con').hover(function () {
    $(this).find('div.ind-news-r2-des').stop().addClass('active');
},function () {
    $(this).find('div.ind-news-r2-des').stop().removeClass('active');
})


$(".ind-news-r2-prev").click(function(){
    $("#ind-news-r2").carousel('prev');
});
$(".ind-news-r2-next").click(function(){
    $("#ind-news-r2").carousel('next');
});

$('.ind-news-l1-prev').click(function () {
    $('#ind-news-l1').carousel('prev');
})
$('.ind-news-l1-next').click(function () {
    $('#ind-news-l1').carousel('next');
})





$('.case-nav-con > ul > li > a').click(function () {
    var li_child = $(this).parent().find("div.case-nav-child");
    if(li_child.css('display') == 'none'){
        li_child.slideDown();
    }
    else{
        li_child.slideUp();
    }

});



$(function () {
    if (document.getElementsByClassName('member-nav-box')[0]){
        var tDiv = $('.member-nav-box > ul'),
            links = tDiv.find('a'),
            index = 0,//默认第一个菜单项
            url = window.location.href.replace(/\/$/,' ');

        if(url){//如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
            for (var i=links.length; i--;) {//遍历 menu 的中连接地址
                if(links[i].href.indexOf(url) !== -1){

                    index = i;
                    break;
                }
            }
            links[index].parentNode.className = 'active';
        }
    }else{
        return false;
    }

});



$('.v-member-tit > ul > li').click(function () {
    var that = $(this),
        index = that.index();
    that.addClass('active').siblings().removeClass('active');
    $('.v-member-con > .v-member-log').eq(index).show().siblings().hide();
});


$('.v-member-tit > ul > li').click(function () {
    var that = $(this),
        index = that.index();
    that.addClass('active').siblings().removeClass('active');
    $('.v-member-con > .v-member-log').eq(index).show().siblings().hide();
});


//产品详情页

$('#pro-nub-dec').click(function () {
    var nubval = $('.pro-nub-val'),
        val = nubval.val(),
        total = $('#payshow-total'),
        price = $('#payshow-pro-price').text();
    val = parseInt(val,10);
    val -= 1
    val < 1 ? val = 1 : val;
    var total_price = parseInt(val,10)*parseInt(price,10);
    total.text(total_price);
    nubval.val(val);
})

$('#pro-nub-ins').click(function () {
    var nubval = $('.pro-nub-val'),
        val = nubval.val(),
        total = $('#payshow-total');
    var max_nub = 99;
    // Number($('#pro_inventory > i').text()) ? max_nub = Number($('#pro_inventory > i').text()) : max_nub=val;
    var price = $('#payshow-pro-price').text();
    val = parseInt(val,10);
    val += 1;
    val > max_nub ? val = max_nub : val;
    var total_price = parseInt(val,10)*parseInt(price,10);
    total.text(total_price);
    nubval.val(val);
});

$(".pro-i-lunbo-contr-left").click(function(){
    $("#pro-i-lunbo").carousel('prev');
});
$(".pro-i-lunbo-contr-right").click(function(){
    $("#pro-i-lunbo").carousel('next');
});


$('.pro-select').on('change select',function () {
    areaPost(this);
});

function areaPost(that) {
    var next_par = $(that).data('next'),
        url = $(that).data('url'),
        parent_id = $(that).val(),
        param = {
            'q' : parent_id,
        };
    areaJajx(url,param,next_par,that);
};



//会员地址页
$('.pro-select').on('change select',function () {
    areaPost(this);
});

function areaPost(that) {
    var next_par = $(that).data('next'),
        url = $(that).data('url'),
        parent_id = $(that).val(),
        param = {
            'q' : parent_id,
        };
    areaJajx(url,param,next_par,that);
}


$('.member-order-tag > ul > li ').click(function () {
    var index  = $(this).index();
    $(this).addClass('active').siblings().removeClass('active');
    $('.member_my_order > ul').eq(index).show().siblings().hide();
})


$('.order_pay_way > ul li ').click(function () {
    var $this = $(this),
        values = $this.find('.pay_icon').attr('value');
    $('#pay_form').find('input[name=pay_way]').val(values);
    $this.addClass('active').siblings().removeClass('active');

})

$('#weixin_code_foot').hover(function () {
    $(this).find('img').show();
},function () {
    $(this).find('img').hide();
});

$('.order_show_submit > button').click(function () {
    $('#pay_form').submit();
});


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
        //设置button效果，开始计时
        $(this).attr("disabled", "true");
        $(this).val(curCount + "秒后重新获取");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
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
            data: {'phone' : $('#regPhone').val()},
            success: function (data) {
                if(data == 'OK'){
                    alert('发送成功');
                    console.log(data);
                }else{
                    alert('发送失败');
                    console.log(data);
                }
            },
            error: function (data) {
                console.log('失败',data)
            }
        });
    }
})
