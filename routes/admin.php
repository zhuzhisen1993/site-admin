<?php

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

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::group(['middleware' => ['auth.admin','permission']], function () {
        Route::get('/', 'AdminController@index'); //后台首页

        //用户管理
        route::get('users','UserController@index');
        route::get('users/getData','UserController@getData');
        route::post('users/add','UserController@add');
        route::post('users/{user}/status','UserController@status');

        //角色管理
        route::get('roles','RoleController@index');
        route::get('roles/getData','RoleController@getData');
        route::post('roles/operation','RoleController@operation');
        route::post('roles/{role}/destroy','RoleController@destroy');

        //权限管理
        route::get('permission','PermissionController@index');
        route::get('permission/getData','PermissionController@getData');
        route::post('permisssion/add','PermissionController@add');
        route::get('permission/{permission}/edit','PermissionController@edit');
        route::post('permission/{permission}/destroy','PermissionController@destroy');

        //文章类型管理
        route::get('articleTypes','ArticleTypeController@index');
        route::get('articleTypes/getData','ArticleTypeController@getData');
        route::post('articleTypes/add','ArticleTypeController@add');
        route::post('articleTypes/{articleTpye}/edit','ArticleTypeController@edit');
        route::post('articleTypes/{articleTpye}/destroy','ArticleTypeController@destroy');


        Route::get('profile','AdminController@adminInfo');//管理员资料
        Route::post('reset/password','UserController@resetPassword');

        Route::post('logout', 'LoginController@logout');
    });


    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::get('article/index','ArticleController@index');//文章列表界面
    Route::get('article/create','ArticleController@create');//创建文章

});