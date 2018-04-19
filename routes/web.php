<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['namespace' => 'Home'],function (){
    Route::get('/','IndexController@index')->name('/');
    Route::get('news','NewsController@index')->name('news');
    Route::get('case','CaseController@index')->name('case');
    Route::get('case/info','CaseController@caseInfo')->name('case.info');
    Route::get('partner','PartnerController@index')->name('partner');
    Route::get('contact','ContactController@index')->name('contact');
    Route::get('product','ProductController@index')->name('product');
    Route::get('pro/info','ProInfoController@index')->name('pro-info');
    Route::get('store','StoreController@index')->name('store');
    Route::get('store/list','StoreController@storeList')->name('store.list');
    Route::get('store/info','StoreController@storeInfo')->name('store.info');
    Route::post('WangImgUp','WangEditController@imgUp');
    Route::get('news/item','NewsController@item')->name('news.item');
    Route::post('partner/create','PartnerController@CreateForm')->name('partner.create');
    Route::get('test','TestController@test')->name('test');

    Route::get('getCity','AreaController@city')->name('api.getCity');
    Route::get('getDistrict','AreaController@district')->name('api.getDistrict');
    Route::get('getAreaStore','AreaController@areaStore')->name('api.getAreaStore');
    Route::get('getAreaDoc','AreaController@getAreaDoc')->name('api.getAreaDoc');

    Route::post('pays/alipay/post', 'PayController@getPayWay')->name('pay.post');
    Route::post('pays/alipay/notify', 'PayController@alipayNotify')->name('alipay.notify');
    Route::get('pays/alipay/return', 'PayController@alipayReturn')->name('alipay.return');

    Route::post('baidu/getmap','StoreController@getBdMap')->name('baidu.getmap');

    Route::get('getWapDocOption','AreaController@getWapDoc')->name('getWapDocOption');
    Route::get('getWapStoreOption','AreaController@getWapStore')->name('getWapStoreOption');

});

Route::group(['namespace' => 'Auth'],function (){
    Route::get('register', 'RegisterController@index')->name('reg.show');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('phoneregister', 'RegisterController@phoneReg')->name('phone.register');
    Route::post('phoneregister', 'RegisterController@phoneRegUsr');
    Route::get('login', 'LoginController@index')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('phone/login', 'LoginController@phoneLogin')->name('phone.login');
    Route::get('reg/sendsms','RegisterController@sendRegUserSms')->name('reg.SendSms');
    Route::match(['get','post'],'forgetpwd','LoginController@forgetPassword')->name('forget.Pwd');
    Route::get('send/forgetpwd','LoginController@sendForgetPwd')->name('send.forgetPwd');

    Route::group(['middleware' => 'auth','prefix' => 'member'],function (){
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('info','InfoController@index')->name('member.info');
        Route::get('safe','SafeController@index')->name('member.safe');
        Route::get('order','OrderController@index')->name('member.order');
        Route::get('order/search','OrderController@searchOrderId')->name('order.searOrderId');
        Route::get('finace','FinaceController@index')->name('member.finace');
        Route::get('address','AddrController@index')->name('member.address');
        Route::post('order/show/form','OrderController@OrdershowForm')->name('order.showf');
        Route::post('order/post/create','OrderController@PostOrder')->name('order.create');
        Route::match(['get','post'],'order/pay/show','OrderController@orderPayShow')->name('order.payShow');
        Route::post('info/save','InfoController@save')->name('memberInfo.save');
        Route::post('info/avatar','InfoController@uploadAvatar')->name('memberAvatar.save');
        Route::post('addr/save','AddrController@save')->name('memberAddr.save');
        Route::get('password/reset', 'SafeController@showRePass')->name('password.request');

        Route::post('password/reset', 'SafeController@reset');
        Route::get('order/status', 'OrderController@orderStatus')->name('order.status');
        Route::post('order/refund', 'OrderController@orderRefund')->name('order.refund');


        Route::get('safe/showbindEmail', 'SafeController@showBindEmail')->name('safe.showbindEmail');
        Route::post('safe/bindemail', 'SafeController@bindEmail')->name('safe.bEmail');
        Route::get('safe/vBEmail', 'SafeController@verifyBindEmail')->name('safe.vBEmail');
    });
//    Route::post('logout', 'LoginController@logout')->name('logout')->middleware('auth');
});

Route::group(['namespace' => 'Doctor'],function (){
    Route::get('docreg','DocRegController@index')->name('docreg.show');
    Route::get('doclog','DocLogController@index')->name('doclog.show');
    Route::post('docreg','DocRegController@register')->name('docreg');
    Route::post('doclog','DocLogController@login')->name('doclog');

    Route::group(['middleware' => 'auth:doctor','prefix' => 'doctor'],function (){
        Route::post('doc-login', 'DocLogController@logout')->name('doc.logout');
        Route::get('info','InfoController@index')->name('doc.info');
        Route::post('info/save','InfoController@save')->name('doc.save');
        Route::get('safe','SafeController@index')->name('doc.safe');
        Route::get('cash','CashController@index')->name('doc.cash');
        Route::get('password/reset', 'SafeController@showRePass')->name('doc_password.request');
        Route::post('password/reset', 'SafeController@reset');
        Route::get('bind/bank', 'SafeController@bindBank')->name('doc.bind.bank');
        Route::post('bind/bank', 'SafeController@bindBank');
        Route::post('doc/apply/cash', 'CashController@setCash')->name('doc.applyCash');
        Route::get('doc/cash/list', 'CashController@getCashList')->name('doc.cash.list');
    });
});


//Auth::routes();

//Route::get('test', 'HomeController@index')->name('home');
