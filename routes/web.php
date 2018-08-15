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
    Route::get("regist/{name}/mobile/{mobile}/cardId/{cardId?}",  "RegistController@stall");

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


});