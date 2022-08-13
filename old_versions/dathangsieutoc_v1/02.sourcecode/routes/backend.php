<?php
/**
 * Created by PhpStorm.
 * User: seekill
 *
 * Cấu hình Routes dành riêng cho backend
 */

/* Trang chủ */

Route::get('/', 'Backend\BackendController@dashboard');
Route::get('dashboard', 'Backend\BackendController@dashboard');
Route::get('test','Backend\BackendController@test');
/*Product*/
Route::get('product/add', 'Backend\ProductController@showAddForm')->middleware(['permission:add-product']);
Route::get('product/list', 'Backend\ProductController@index')->middleware(['permission:add-product']);
Route::get('product/edit/{id}', 'Backend\ProductController@showEditForm')->middleware(['permission:add-product']);
Route::post('product/add', 'Backend\ProductController@add')->middleware(['permission:add-product']);
Route::post('product/edit/{id}', 'Backend\ProductController@edit')->middleware(['permission:add-product']);
Route::post('product/delete/{id}','Backend\ProductController@deleteProduct')->middleware(['permission:add-product']);
Route::post('product/list','Backend\ProductController@delete')->middleware(['permission:add-product']);
/*custommer*/
//Route::get('customer/list','Backend\CustomerController@index')->middleware(['permission:list-customer']);
//Route::get('customer/add','Backend\CustomerController@getAdd')->middleware(['permission:add-customer']);
//Route::post('customer/add','Backend\CustomerController@add')->middleware(['permission:add-customer']);
//Route::get('customer/edit/{id}','Backend\CustomerController@getEdit')->middleware(['permission:add-customer']);
//Route::post('customer/edit/{id}','Backend\CustomerController@edit')->middleware(['permission:add-customer']);
//Route::post('customer/delete/{id}','Backend\CustomerController@delete')->middleware(['permission:delete-customer']);
//Route::post('customer/list','Backend\CustomerController@delete')->middleware(['permission:delete-customer']);

/**
 * Role
 */
Route::get('role', 'Backend\RoleController@index')->middleware(['permission:list-role']);
Route::get('role/add', 'Backend\RoleController@showAddForm')->middleware(['permission:add-role']);
Route::post('role/add', 'Backend\RoleController@add')->middleware(['permission:add-role']);
Route::get('role/edit/{id}', 'Backend\RoleController@showEditForm')->middleware(['permission:edit-role']);
Route::post('role/edit/{id}', 'Backend\RoleController@edit')->middleware(['permission:edit-role']);
Route::post('role', 'Backend\RoleController@delete')->middleware(['permission:delete-role']);

/**
 * user
 */
Route::group(['prefix' => 'user'], function() {
    Route::get('', 'Backend\UserController@index')->middleware(['permission:list-user']);
    Route::get('/list', 'Backend\UserController@index')->middleware(['permission:list-user']);
    Route::get('/add', 'Backend\UserController@showAddForm')->middleware(['permission:add-user']);
    Route::post('/add', 'Backend\UserController@add')->middleware(['permission:add-user']);
    Route::get('/edit/{id}', 'Backend\UserController@showEditForm')->middleware(['permission:edit-user']);
    Route::post('/edit/{id}', 'Backend\UserController@edit')->middleware(['permission:edit-user']);
    Route::post('/list','Backend\UserController@delete')->middleware(['permission:delete-user']);
    Route::get('/changePassword', 'Backend\UserController@showChangePassword')->middleware(['permission:edit-user']);
    Route::post('/changePassword', 'Backend\UserController@changePassword')->middleware(['permission:edit-user']);
    Route::get('/updateprofile', 'Backend\UserController@showUpdateProfile')->middleware(['permission:edit-user']);
    Route::post('/updateprofile', 'Backend\UserController@updateprofile')->middleware(['permission:edit-user']);
    Route::get('/getUserList', 'Backend\UserController@getUserList');
});


/**
 * Auth // Password Reset Routes...
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Permission
 */
Route::get('permission', 'Backend\PermissionController@index')->middleware(['permission:list-permission']);




/**
 * order
 */
Route::group(['prefix' => 'order'], function() {
    Route::get('order-list', 'Backend\OrderController@index')->middleware(['permission:list-order'])->name('orderTotal');
    Route::get('order-list/{currentUrl}', 'Backend\OrderController@index')->middleware(['permission:list-order'])->name('orderList');
    Route::get('order-list/user/{user_id}', 'Backend\OrderController@userOrderIndex')->middleware(['permission:list-order'])->name('orderList');
    Route::get('cart', 'Backend\OrderController@cart')->middleware(['permission:list-order']);
    Route::post('cart/add', 'Backend\OrderController@addOrder')->middleware(['permission:add-order']);
    Route::post('/getOrderList', 'Backend\OrderController@getListOrderByUserId');

    // chi tiết đơn hàng
    Route::get('order-detail/{id}', 'Backend\OrderDetailController@index')->middleware(['permission:list-order-detail']);
    Route::get('order-detail/edit/{id}', 'Backend\OrderDetailController@showEditForm')->middleware(['permission:edit-order']);
    Route::post('order-detail/update-status', 'Backend\OrderDetailController@updateStatus')->middleware(['permission:edit-order']);
    Route::post('order-detail/update-detail', 'Backend\OrderDetailController@updateDetail')->middleware(['permission:edit-order']);

    //đơn hàng khiếu nại.
    Route::get('report-order/{id}', 'Backend\OrderDetailController@reportOrder');
    Route::post('set-report-order', 'Backend\OrderDetailController@setReportOrder');
    Route::get('complain', 'Backend\OrderController@getComplainOrder');
    Route::get('softDelete/{id}', 'Backend\OrderController@softDelete');
});

/**
 * lich su giao dich
 */
Route::group(['prefix' => 'history-transaction'], function() {
    Route::get('', 'Backend\HistoryTransactionController@index')->middleware(['permission:list-history-transaction', 'notHasPermission:edit-history-transaction']);
    Route::get('adminIndex', 'Backend\HistoryTransactionController@adminIndex')->middleware(['permission:edit-history-transaction']);
    Route::get('/add', 'Backend\HistoryTransactionController@add')->middleware(['permission:edit-history-transaction']);
    Route::post('/update', 'Backend\HistoryTransactionController@store')->middleware(['permission:edit-history-transaction']);
    Route::post('/getBalance', 'Backend\HistoryTransactionController@getWalletByUserId');
});

/**
 * Tin tức
 */
Route::group(['prefix' => 'news'], function() {
    Route::get('/', 'Backend\NewsController@index')->middleware(['permission:list-news']);
    Route::get('add', 'Backend\NewsController@showAddForm')->middleware(['permission:add-news']);
    Route::post('add', 'Backend\NewsController@add')->middleware(['permission:add-news']);
    Route::get('edit/{id}', 'Backend\NewsController@showEditForm')->middleware(['permission:edit-news']);
    Route::post('edit/{id}', 'Backend\NewsController@edit')->middleware(['permission:edit-news']);
    Route::post('delete/{id}', 'Backend\NewsController@deleteNew')->middleware(['permission:delete-news']);
});

/**
 *  chuyen muc
 */

Route::group(['prefix' => 'news/category'], function() {
    Route::get('/', 'Backend\NewsController@category')->middleware(['permission:list-category']);
    Route::post('/', 'Backend\NewsController@addCategory')->middleware(['permission:add-category']);;
    Route::get('edit/{id}', 'Backend\NewsController@showEditCategoryForm')->middleware(['permission:edit-category']);
    Route::post('edit/{id}', 'Backend\NewsController@editCategory')->middleware(['permission:edit-category']);;
    Route::post('delete/{id}', 'Backend\NewsController@deleteCategory')->middleware(['permission:delete-category']);
});



/*option*/
Route::group(['prefix' => 'option'], function() {
    Route::get('/', 'Backend\OptionsController@index')->middleware(['permission:edit-option']);
    Route::post('update/{key}', 'Backend\OptionsController@update')->middleware(['permission:edit-option']);
});
