<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');

    $router->resource('member/manage','MemberController');
    $router->resource('member/type','MemberTypeController');

    $router->resource('case/list','CaseController');
    $router->resource('case/category','CaseCategoryController');

    $router->resource('area','AreaController');

    $router->resource('store','StoreController');

    $router->resource('product','ProductController');
    $router->resource('pro_category','ProductCategoryController');

    $router->resource('order','OrderController');

    $router->resource('news/list','NewsController');
    $router->resource('news/tag','NewsTageController');

    $router->resource('pay/log','PayLogController');
    $router->resource('pay_log/options','PayLogOptionsController');

    $router->resource('doctors','DoctorController');
    $router->resource('doctor/group','DocGroupController');
    $router->resource('doctor/pay','DocPayController');
    $router->resource('doctor/apply/cash','DocCashController');


    $router->resource('bank','BankController');

    $router->resource('service/env','ServiceEnvController');



    $router->resource('banner/set','BannerSetController');
    $router->resource('partner/list','PartnerController');



});
