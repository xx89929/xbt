<div class="case-nav pull-left">
    <div class="case-nav-tit">
        <h4>案例分类</h4>
    </div>
    <div class="case-nav-con">
        <ul class="list-unstyled">
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left">疤痕专科</span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                    <div class="case-nav-child">
                        <ul class="list-unstyled">
                            <li class="active">
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">创面修复</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">儿童疤痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">凹陷疤痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">腋下瘢痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">创面修复</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left">美容专科</span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                    <div class="case-nav-child">
                        <ul class="list-unstyled">
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">创面修复</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">儿童疤痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left">疤痕预防</span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                    <div class="case-nav-child">
                        <ul class="list-unstyled">
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">凹陷疤痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">腋下瘢痕</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a>
                                    <div class="case-nav-row case-nav-child-f1 clearfix">
                                        <span class="pull-left">创面修复</span>
                                        <i class="fa fa-chevron-right pull-right"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
            <li>
                <a>
                    <div class="case-nav-row clearfix">
                        <span class="pull-left">特殊疤痕</span>
                        <i class="fa fa-chevron-right pull-right"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    $('.case-nav-con > ul > li').click(function () {
        var li_child = $(this).find("div.case-nav-child");
        if(li_child.css('display') == 'none'){
            li_child.slideDown();
        }
        else{
            li_child.slideUp();
        }

    })
</script>