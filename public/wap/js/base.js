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

$('.item-link').click(function () {
    window.location.href = $(this).attr('url');
})


$('#resetPwdButton').click(function () {
    $('#resetPwdForm').submit();
})

$('.auth-sider').click(function () {
    window.location.href = $(this).attr('url');
})




$.init();
