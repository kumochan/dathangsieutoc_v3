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

/* Login */
Route::get('option/getexchangerate', 'Api\OptionController@getExchangeRate');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('user/list', 'Api\UserController@getAllUser');
    Route::post('order/add-order', 'Api\OrderController@addOrder');
});

/* Tin tức */
Route::get('news/grid', 'Api\NewsController@grid');
Route::post('news/delete', 'Api\NewsController@delete');
Route::get('news/category/tree', 'Api\NewsController@treeCategory');

/* product */
Route::get('product/grid', 'Api\ProductController@grid');
Route::post('product/delete', 'Api\ProductController@delete');
//Route::get('role/grid', 'Api\RoleController@grid');

/* Phan quyen */
Route::get('permission/grid', 'Api\PermissionController@grid');
Route::get('role/grid', 'Api\RoleController@grid');
Route::post('role/delete', 'Api\RoleController@delete');//->middleware(['permission:delete-role']);
Route::get('user/grid', 'Api\UserController@grid');
Route::post('user/delete', 'Api\UserController@delete');

/* Menu */
Route::get('menu/grid', 'Api\MenuController@grid');
Route::post('menu/delete', 'Api\MenuController@delete');

/*customer*/
Route::get('customer/grid', 'Api\CustomerController@grid');
Route::post('customer/delete', 'Api\CustomerController@delete');
/* Things */
Route::post('thing/updateMenuItem', 'Api\ThingController@updateMenuItem');
Route::post('thing/saveNestedMenu', 'Api\ThingController@saveNestedMenu');
Route::post('thing/deleteMenuItem', 'Api\ThingController@deleteMenuItem');

/*order*/
Route::get('order/order-list/grid', 'Api\OrderController@grid');
Route::get('order/order-list/grid/{type}', 'Api\OrderController@grid');


Route::get('history-transaction/grid', 'Api\HistoryTransactionController@grid');
Route::post('user/register', 'Api\UserController@register');

