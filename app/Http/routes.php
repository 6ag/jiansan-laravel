<?php

Route::get('/', function () {
    return redirect()->route('admin.index');
});

// 后台路由组
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    // 注册、登录、退出
    Route::any('register', 'UserController@register')->name('admin.register');
    Route::any('login', 'UserController@login')->name('admin.login');
    Route::get('logout', 'UserController@logout')->name('admin.logout');

    // 已经登录
    Route::group(['middleware' => ['admin.login']], function () {
        Route::get('index', 'IndexController@index')->name('admin.index');
        Route::resource('wallpaper', 'WallpaperController');
        Route::resource('category', 'CategoryController');
    });
});

// 接管路由
$api = app('Dingo\Api\Routing\Router');

// 配置api版本和路由
$api->version('v1', ['namespace' => 'App\Http\Api\V1\Controllers'], function ($api) {
    
});