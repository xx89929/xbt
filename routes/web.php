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
    Route::get('partner','PartnerController@index')->name('partner');
    Route::get('contact','ContactController@index')->name('contact');
    Route::get('product','ProductController@index')->name('product');
    Route::get('pro/info','ProInfoController@index')->name('pro-info');
    Route::get('store','StoreController@index')->name('store');
    Route::post('WangImgUp','WangEditController@imgUp');
    Route::get('news/item','NewsController@item')->name('news.item');

    Route::get('getCity','AreaController@city')->name('api.getCity');
    Route::get('getDistrict','AreaController@district')->name('api.getDistrict');
    Route::get('getAreaStore','AreaController@areaStore')->name('api.getAreaStore');
    Route::get('getAreaDoc','AreaController@getAreaDoc')->name('api.getAreaDoc');
});

Route::group(['namespace' => 'Auth'],function (){
    Route::get('register', 'RegisterController@index')->name('reg.show');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('login', 'LoginController@index')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');

    Route::group(['middleware' => 'auth','prefix' => 'member'],function (){
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('info','InfoController@index')->name('member.info');
        Route::get('safe','SafeController@index')->name('member.safe');
        Route::get('order','OrderController@index')->name('member.order');
        Route::get('finace','FinaceController@index')->name('member.finace');
        Route::get('address','AddrController@index')->name('member.address');
        Route::post('order/create','OrderController@PostOrder')->name('order.create');
        Route::post('info/save','InfoController@save')->name('memberInfo.save');
        Route::post('addr/save','AddrController@save')->name('memberAddr.save');
        Route::get('password/reset', 'SafeController@showRePass')->name('password.request');
        Route::post('password/reset', 'SafeController@reset');
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
        Route::get('home', 'HomeController@index')->name('doc.home');
    });
});


//Auth::routes();

//Route::get('test', 'HomeController@index')->name('home');
