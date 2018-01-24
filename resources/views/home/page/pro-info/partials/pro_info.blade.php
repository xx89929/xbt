<div class="pro_info-i clearfix">
    <div class="pro-i-lunbo pull-left">
        <span class="pro-i-lunbo-contr pro-i-lunbo-contr-left" data-slide="prev"><i class="fa fa-chevron-left"></i></span>
        <span class="pro-i-lunbo-contr pro-i-lunbo-contr-right" data-slide="next"><i class="fa fa-chevron-right"></i></span>
        <div id="pro-i-lunbo" class="carousel slide" data-ride="carousel">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators pro-i-tag">
                <li data-target="#pro-i-lunbo" data-slide-to="0" class="active">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </li>
                <li data-target="#pro-i-lunbo" data-slide-to="1">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </li>
                <li data-target="#pro-i-lunbo" data-slide-to="2">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="pro-i-lunbo-img item active">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </div>
                <div class="pro-i-lunbo-img item">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </div>
                <div class="pro-i-lunbo-img item">
                    <img src="{{url('home/images/1507572088.jpg')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="pro-i-con pull-left">
        <div class="pro-i-con-tit">
            <h3>无痕修护菁华液</h3>
        </div>
        <div class="pro-i-con-pri">
            <span>￥159.00元</span>
        </div>
        <div class="pro-i-con-check">
            <h5>选择店铺</h5>
            <ul class="list-inline clearfix">
                <li class="col-xs-2">
                    <select class="pro-select">
                        <option>省</option>
                        <option>海南</option>
                        <option>广州</option>
                    </select>
                </li>
                <li class=" col-xs-2">
                    <select class="pro-select">
                        <option>市</option>
                        <option>海口</option>
                        <option>三亚</option>
                    </select>
                </li>
                <li class=" col-xs-2">
                    <select class="pro-select">
                        <option>区</option>
                        <option>龙华</option>
                        <option>秀英</option>
                    </select>
                </li>
                <li class="col-xs-6">
                    <select class="pro-select">
                        <option>选择要挑选的店铺</option>
                        <option>XXXX店铺</option>
                        <option>XXXXXXXX店铺</option>
                    </select>
                </li>
            </ul>
        </div>
        <div class="pro-i-con-nub">
            <h5>数量</h5>
            <div class="pro-i-con-nub-item clearfix text-center">
                <span id="pro-nub-dec" class="pro-nub-contr pull-left">-</span>
                <input type="text" class="pro-nub-val pull-left" value="1">
                <span id="pro-nub-ins" class="pro-nub-contr pull-left">+</span>
            </div>
            <p>库存9999件</p>
        </div>

        <div class="pro-i-con-sub clearfix text-center">
            <button class="pro-i-con-sub-buy pull-left"><i class="fa fa-shopping-bag"></i>&nbsp;立即购买</button>
            <button class="pro-i-con-sub-join-shop pull-left"><i class="fa fa-shopping-cart"></i>&nbsp;加入购物车</button>
        </div>
    </div>
</div>


<script>

    $('#pro-nub-dec').click(function () {
        var nubval = $('.pro-nub-val'),
            val = nubval.val();
        val = parseInt(val,10);
        val -= 1
        nubval.val(val);
    })

    $('#pro-nub-ins').click(function () {
        var nubval = $('.pro-nub-val'),
            val = nubval.val();
        val = parseInt(val,10);
        val += 1
        nubval.val(val);
    })

</script>

<script>
    $(".pro-i-lunbo-contr-left").click(function(){
        $("#pro-i-lunbo").carousel('prev');
    });
    $(".pro-i-lunbo-contr-right").click(function(){
        $("#pro-i-lunbo").carousel('next');
    });
</script>