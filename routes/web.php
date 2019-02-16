<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/products', 'ProductController');
});
