<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'WeChat'],function (){
    Route::get('index','IndexController@index');
    Route::get('case/view','CaseController@index');
    Route::get('caseinfo/view','CaseController@caseInfo');
    Route::get('product/view','ProductController@index');
    Route::get('proinfo/view','ProductController@getProInfo');
    Route::get('stores/view','StoreController@index');
});
