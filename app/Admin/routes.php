<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('main-factories', MainFactoryController::class);
    $router->resource('supplies', SupplyController::class);
    $router->resource('details', DetailController::class);
    $router->resource('goods-categories', CategoriesController::class);

});
