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
});