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

        // 后台首页
        Route::get('index', 'IndexController@index')->name('admin.index');

        // 壁纸
        Route::resource('wallpaper', 'WallpaperController');
        Route::post('upload', 'WallPaperController@upload')->name('admin.upload');
        
        // 分类
        Route::resource('category', 'CategoryController');

        // 配置
        Route::resource('option', 'OptionController');
    });
});

// 接管路由
$api = app('Dingo\Api\Routing\Router');

// 配置api版本和路由
$api->version('v1', ['namespace' => 'App\Http\Api\V1\Controllers'], function ($api) {

    // app是否一键设置壁纸
    $api->get('status', 'OptionController@getSaveWallpaperStatus')->name('getSaveWallpaperStatus');
    
    // 获取分类列表
    $api->get('categories', 'CategoryController@getCategories')->name('getCategories');

    // 获取壁纸列表
    $api->get('wallpapers/{category_id}', 'WallpaperController@getWallpapers')->name('getWallpapers');
});