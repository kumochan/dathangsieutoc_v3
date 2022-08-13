<?php
Route::get('/', 'HomeController@index')->name('home');

Route::get('/trang-chu', 'HomeController@index')->name('home');

//news
Route::get('/tin-tuc', 'NewsController@index');
Route::get('/tin-tuc/{slug}', 'NewsController@detail');

// guide
Route::get('/huong-dan', 'GuideController@index');
Route::get('/huong-dan/{slug}', 'GuideController@detail');

// about us
Route::get('/ve-chung-toi', 'AboutController@index');
Route::get('/dang-ki', 'Auth\RegisterController@showRegisterFrom');
Route::post('/dang-ki', 'Auth\RegisterController@create');
Route::get('user/gettoken', 'UsersController@getCurrentToken');
Route::get('option/getexchangerate', 'Api\OptionController@getExchangeRate');
