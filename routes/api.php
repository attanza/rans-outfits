<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('products', 'Api\ProductController@index');
    Route::post('products', 'Api\ProductController@store');
    Route::put('products/{id}', 'Api\ProductController@update');

    Route::get('combo-data', 'Api\ComboDataController@index');

});
