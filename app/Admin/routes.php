<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    Route::group(['prefix'=>'wechat'],function(Router $router){
        $router->get('/users', 'WechatUserController@index');
        $router->get('/menus', 'WechatMenuController@index');
    });
    $router->resource('goods/categories', 'CategoryController');
    $router->resource('goods', 'GoodsController');
    $router->resource('cards', 'CardController');
    $router->post('orders/status','OrderController@status');
    $router->resource('orders', 'OrderController');
});
