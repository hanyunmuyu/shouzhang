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

use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*商户*/
Route::prefix("stall")->group(function () {

    /*商户注册人员*/
    Route::get("regist/{name}/mobile/{mobile}/cardId/{cardId?}", "RegistController@stall");
    /*商户补全商铺信息*/
    Route::get('append/id/{id}/title/{title}/addr/{addr}/introduction/{introduction}', "StallController@append");

});
/*普通搬运人员*/
Route::prefix("carrier")->group(function () {
    Route::get("regist/{name}/mobile/{mobile}/cardId/{cardId?}", "RegistController@carrier");
});
/*管理*/
Route::prefix("manager")->group(function () {
    Route::get("regist/{name}/mobile/{mobile}/cardId/{cardId?}", "RegistController@manger");
    Route::get('addRole/{name}/intro/{introduction?}', "RoleController@addRole");

    Route::get("delRole/{id}", "RoleController@delRole");
    Route::get('search/member/{mobile?}/name/{name?}', "MemberController@search");

//    Route::get("create/order/{stallId}", "OrderController@createOrder");

    Route::get('create/order/from/{from}/price/{price}/to/{stallId?}',"OrderController@createOrder");


});